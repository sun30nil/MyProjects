'''
Created on Jun 16, 2014

@author: Sunil
'''
from tkinter import *
from ConnectMongo import *
from pymongo import errors

class MyRadioSelector:
    
    def __init__(self):
        self.v = IntVar()
        self.v.set(1)
        
    #def sendOption(self):
    
        
    
          

    def showDialogBox(self,all_details,option,size):
        root = Tk()
        root.title('Showing a random student')
        
        def removeFromDB(picked_rollnum):
            database = ConnectMongo("AllStudents") #name of the database
            database.getConnectionDB()
            collcn = database.createCollection("inStudents")  #name of the table
            collcn.remove({"roll_no":picked_rollnum})
            database.closeConnection()

        def addToDoneCollection(picked_std):
            database = ConnectMongo("AllStudents") #name of the database
            database.getConnectionDB()
            collcn = database.createCollection("outStudents")  #name of the table
            stmt = {'roll_no':picked_std['rollno'],'name':picked_std['name'],'subject':picked_std['topic']}
            try:
                collcn.insert(stmt)
            except errors.AutoReconnect as e:    
                print ('Warning', e)
            database.closeConnection()
            removeFromDB(picked_std['rollno'])
            root.destroy()
        
        if (option == 1):
            label3 = Label(root, fg="blue", bg="yellow", text=all_details['name'], relief=FLAT,font=("Helvetica", size),width=100 )
            label3.pack()
        
        elif (option == 2):
            label3 = Label(root, fg="blue", bg="yellow", text=all_details['rollno'], relief=FLAT,font=("Helvetica", size),width=100 )
            label3.pack()
        elif (option == 3):
            label3 = Label(root,fg="blue", bg="yellow", text=all_details['rollno']+"\n"+all_details['name'], relief=FLAT,font=("Helvetica", size),width=100 )
            label3.place(x=0,y=0)
            label3.pack()
        elif (option == 4):
            label3 = Label(root,fg="blue", bg="yellow", text=all_details['name']+"\n"+all_details['topic'], relief=FLAT,font=("Helvetica", size),width=100 )
            label3.place(x=0,y=0)
            label3.pack()
        elif (option == 5):
            label3 = Label(root, fg="blue", bg="yellow",text=all_details['rollno']+"\n"+all_details['name']+"\n"+all_details['topic'], relief=FLAT ,font=("Helvetica", size),width=100)
            label3.place(x=0,y=0)
            label3.pack()
        elif (option == 10):
            label3 = Label(root, fg="blue", bg="yellow",text="All Students are done!", relief=FLAT ,font=("Helvetica", size),width=100)
            label3.place(x=0,y=0)
            label3.pack()
        
        button = Button(root, text="Done" ,command= lambda: addToDoneCollection(all_details),bg="chocolate")
        button.pack()
        root.mainloop()
        
        

