'''
Created on Jul 17, 2014

@author: Sunil
'''
import collections # to sort the dictionary
class ReadDataFile(object):
    '''
    classdocs
    '''

    def __init__(self):
        self.data_dict = {}
        self.sample_data_chrono = {} # to store the subset(start_date and end_date) of data_dict
        self.sample_data_revchrono = {}
        self.helper_data = {} # to store subset from data_dict which precedes the sample_data_chrono
        
    def getDataDict(self, dataObj):
        #close_price = dataObj['Adj Close']
        for i in dataObj.iterrows():
            #print i[0],"-------", i[1]['Adj Close']
            self.data_dict[i[0]] = i[1]['Adj Close']   #i[0] is the date field and i[1] is next few columns
            
        self.data_dict = collections.OrderedDict(sorted(self.data_dict.items(), reverse=True)) #sorting of the dict with datetime as key is done here
        #print self.data_dict.keys()
    
    def findDataFor(self, st_date, en_date):
        
        counter = 1
        for k in self.data_dict:
            if k <= st_date and k >= en_date:
                self.sample_data_chrono[k] = self.data_dict[k]
                
            elif k < en_date and counter <= 30:
                self.helper_data[k] = self.data_dict[k]
                counter = counter+1
            
                #print k, self.data_dict[k]
        self.sample_data_chrono = collections.OrderedDict(sorted(self.sample_data_chrono.items()))
        self.sample_data_revchrono = collections.OrderedDict(sorted(self.sample_data_chrono.items(), reverse=True))
        self.helper_data = collections.OrderedDict(sorted(self.helper_data.items(), reverse=True))
        #print self.sample_data_chrono
        #print self.helper_data
    
    def getMovingAvg(self, window, closeList): # here the max window size can be upto 30
        counter = 1
        _ndayAvg = 0
        for i in range(len(closeList)-1,-1,-1):
            if counter <= window:
                _ndayAvg = _ndayAvg+closeList[i]
                counter = counter+1
            else:
                break
            
        _ndayAvg = _ndayAvg/window
        return _ndayAvg
           
    def movingAvgN(self, win):
        #intialForecast = self.getMovingAvg(3)
        moving_window = win
        acloseList = []
        mvNresult = {}
        counter = 1 
        for k in self.sample_data_revchrono:
            acloseList.append(self.sample_data_revchrono[k])
        
        for j in self.helper_data:
            if counter <= moving_window:
                acloseList.append(self.helper_data[j])
                counter = counter + 1
            else:
                break
               
           
        for k in self.sample_data_chrono:
            tempList = []
            forecast = self.getMovingAvg(moving_window,acloseList)
            acloseList.pop()                           #removing the last list item to slife window up
            error = self.sample_data_chrono[k] - forecast
            p_err = (error/forecast)*100
            sq_err = p_err*p_err
            
            tempList.append(self.sample_data_chrono[k])
            tempList.append(forecast)
            tempList.append(p_err)
            tempList.append(sq_err)
            mvNresult[k] = tempList
        
        mvNresult = collections.OrderedDict(sorted(mvNresult.items(), reverse=True))   
        return mvNresult
        
    def exponentialSmoothing(self, al):
        alpha = al
        expNresult = {}
        prev_forecast = 0  
        prev_actual = 0 
        counter = 1 
        
        for j in self.helper_data:
            if counter <= 1:
                prev_forecast = self.helper_data[j]
                counter = counter + 1
            else:
                break       
        
        flag = 1
        
        for k in self.sample_data_chrono:  
            tempList = []
            actual_value = 0
            curr_forecast = 0
            if flag == 1:
                curr_forecast = prev_forecast
                actual_value = self.sample_data_chrono[k]
                prev_forecast = curr_forecast
                prev_actual = actual_value
                flag = 0
            else:
                actual_value = self.sample_data_chrono[k]
                curr_forecast = alpha*prev_actual + (1-alpha)*prev_forecast
                prev_forecast = curr_forecast
                prev_actual = actual_value
                
            error = actual_value - curr_forecast
            p_err = (error/curr_forecast)*100
            sq_err = p_err*p_err
            
            tempList.append(actual_value)
            tempList.append(curr_forecast)
            tempList.append(p_err)
            tempList.append(sq_err)
            expNresult[k] = tempList
            
        expNresult = collections.OrderedDict(sorted(expNresult.items(), reverse=True))
        #print expNresult
        return expNresult
            
             
        