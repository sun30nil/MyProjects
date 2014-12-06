'''
Created on Jun 18, 2014

@author: Sunil
'''

app_title = "Student Selector App"
main_python_file = "GUI.py"

import sys
from cx_Freeze import setup,Executable

base = None
if (sys.platform == "win32"):
    base = "Win32GUI"
    
includes = ["atexit","re"]

setup(
      name = app_title,
      version = "1.0",
      description = "Pick a student at random",
      author = "Sunil Singh",
      author_email = "sun30nil@gmail.com",
      options = {"build_exe":{"includes":includes}},
      executables = [Executable(main_python_file, base=base)]
      )


