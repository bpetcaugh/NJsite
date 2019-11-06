import os
import shutil


#Replace the file in the current policy folder
os.replace("../temp/", policy folder)

#Copy,  rename and add it to the version Folder
shutil.copyfile(policy folder, "../temp/")
os.rename("../temp/", filename version number)
shutil.move("../temp/" + filename version number, path to policy version folder)

#("path/to/current/file.foo", "path/to/new/destination/for/file.foo")