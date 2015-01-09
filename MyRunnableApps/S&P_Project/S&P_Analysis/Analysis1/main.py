'''
Created on Jul 17, 2014

@author: Sunil
'''
import pandas as pan

import ReadDataFile
import ProcessAnalysis
import datetime

rdf = ReadDataFile.ReadDataFile()
pa = ProcessAnalysis.ProcessAnalysis()

# main function 
# =============================
if __name__ == '__main__':
    
    inputdata = pan.read_csv("C:/Users/Sunil/Desktop/Abbott_data.csv",index_col='Date', parse_dates=True)
    #print inputdata.head(5)
    rdf.getDataDict(inputdata)
    
    start_date = raw_input("Start Date in YYYY-MM-DD H:M:S :")
    end_date = raw_input("End Date in YYYY-MM-DD H:M:S :")
    
    start_date = datetime.datetime.strptime(start_date, "%Y-%m-%d %H:%M:%S")
    end_date = datetime.datetime.strptime(end_date, "%Y-%m-%d %H:%M:%S")
    if start_date < end_date:  # start_date needs to be the latest date
        temp_date = end_date
        end_date = start_date
        start_date = temp_date
    rdf.findDataFor(start_date, end_date)
    
    _3dayData = rdf.movingAvgN(3)
    _5dayData = rdf.movingAvgN(5)
    _30dayData = rdf.movingAvgN(30)
    _2expData = rdf.exponentialSmoothing(0.2)
    _3expData = rdf.exponentialSmoothing(0.3)
    
    pa.findMeanSqError(_3dayData, _5dayData, _30dayData, _2expData, _3expData)
    
    pa.plotGraph(_3expData, "exp3_day")
    pa.plotGraph(_5dayData, "MAvg_5days")
    pa.plotGraph(_30dayData, "MAvg_30days")
    pa.plotGraph(_2expData, "exp2_day")
    pa.plotGraph(_3dayData, "MAvg_3days")
    
    #print start_date
    
    #close_price.plot(label="adj close")
    #pyp.legend()
    #pyp.show()
    
    #print inputdata.items()"""

