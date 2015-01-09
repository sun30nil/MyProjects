'''
Created on Jul 18, 2014

@author: Sunil
'''
import operator
import numpy as np
import matplotlib.pyplot as pyp
class ProcessAnalysis(object):
    '''
    classdocs
    '''


    def __init__(self):
        '''
        Constructor
        '''
        
    def getMeanError(self, given_dict):
        sq_errorAvg = 0
        
        for k in given_dict:
            sq_errorAvg += given_dict[k][3]  # at the index = 3 in the list i have squared % error
            
        sq_errorAvg = sq_errorAvg/len(given_dict)
        return sq_errorAvg
        
        
        
    def findMeanSqError(self, _3ma, _5ma, _30ma, _2exp, _3exp):
        x_lab = []
        y = []
        summary = {"3_dayMovingAvg" : self.getMeanError(_3ma),
                   "5_dayMovingAvg" : self.getMeanError(_5ma),
                   "30_dayMovingAvg" : self.getMeanError(_30ma),
                   "0.2_ExpSmoothing" : self.getMeanError(_2exp),
                   "0.3_ExpSmoothing" : self.getMeanError(_3exp)
                   }
        x = np.arange(1,len(summary)+1)   
        summary = sorted(summary.iteritems(), key=operator.itemgetter(1))
        for key in summary:
            x_lab.append(key[0])
            y.append(key[1])
            print key[0]," -> ", key[1]
        width = 1
        pyp.bar(x, y, width/1.5, color='b') 
        pyp.title("Comparison of Mean Squared % Error of various Forecast Methods")   
        pyp.legend("Forecast Methods")
        pyp.ylabel("Mean Squared % Error")
        pyp.xticks(x + width/2.0, x_lab)
        pyp.show()
            
    def plotGraph(self, data_dict, method):
        
        x = []
        y1 = []
        y2 = []
        for each in data_dict:
            x.append(each)
            y1.append(data_dict[each][0])
            y2.append(data_dict[each][1])
        
        pyp.plot(x, y1,  label='Actual', color='r')
        pyp.plot(x, y2,  label='Predicted', color='g')
        pyp.legend(loc=1,title=method)
        pyp.show()
        
        #close_price.plot(label="adj close")
        #pyp.legend()
        #pyp.show()
    
    #print inputdata.items()"""
        