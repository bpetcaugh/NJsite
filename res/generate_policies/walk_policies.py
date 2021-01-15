# oh manz
from functools import reduce
import json
import os

# thank you activestate ily
# http://code.activestate.com/recipes/577879-create-a-nested-dictionary-from-oswalk/
dir = {}
rootdir = "..{}policies".format(os.sep)
start = rootdir.rfind(os.sep) + 1
for path, dirs, files in os.walk(rootdir):
    folders = path[start:].split(os.sep)
    subdir = dict.fromkeys(files)
    parent = reduce(dict.get, folders[:-1], dir)
    parent[folders[-1]] = subdir

print(json.dumps(dir["policies"]))
