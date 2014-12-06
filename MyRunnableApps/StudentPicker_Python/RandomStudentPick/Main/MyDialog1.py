'''
Created on Jun 16, 2014

@author: Sunil
'''
from tkinter import *

class MyDialog1:
    
    def __init__(self, content):
        root = Tk()       
        root.title('Showing Students')
        text = Text(root, height=26, width=50)
        text.insert(INSERT, content)
        scroll = Scrollbar(root, command=text.yview)
        
        text.configure(yscrollcommand=scroll.set,state=DISABLED)
        
        text.tag_configure('bold_italics', font=('Verdana', 12, 'bold', 'italic'))
        
        text.tag_configure('big', font=('Verdana', 24, 'bold'))
        text.tag_configure('color', foreground='blue', font=('Tempus Sans ITC', 14))
                           
        text.tag_configure('groove', relief=GROOVE,  borderwidth=2)
                           
        text.tag_bind('bite', '<1>', lambda e, t=text: t.insert(END, content))
        
        text.pack(side=LEFT)
        scroll.pack(side=RIGHT, fill=Y)
        
        root.mainloop()
        
    
    def openWindow(self):
        print("hello")
        

