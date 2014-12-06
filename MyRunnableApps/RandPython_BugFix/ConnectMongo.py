'''
Created on Jun 13, 2014

@author: Sunil
'''
from pymongo import Connection

class ConnectMongo:
    dbobj = 0 
    
    def __init__(self, dbname):
        # the __init__ method is the class constructor, where you define
        # instance members.  We'll make conn an instance member rather
        # than a class level member
        self._conn = Connection("localhost", 27017)
        self._db   = self._conn[dbname]
        ConnectMongo.dbobj = self._db
    
    def getConnectionDB(self):
        return self._conn
    # methods usually start with lower-case, and are either camel case (less desirable
    # by Python standards) or underscored (more desirable)
    # All instance methods require the 1st argument to be self (pointer to the
    # instance being affected)
    def createCollection(self, name):
        self._collection = self._db[name]
        return self._collection 
    
    def closeConnection(self):
        self._conn.close()