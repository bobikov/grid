#!/usr/local/bin/Python3
print ("Content-Type: text/html")
print ()


import json
print(json.dumps({'4': 5, '6': 7}, sort_keys=True, indent=4))