#!/usr/local/bin/Python3
print ("Content-Type: text/html")
print ()

import math
import os
path="/Users/hal/Sites/turbo.com/img/"
dirs=os.listdir(path)
for file in dirs:
	print (file + " ")

