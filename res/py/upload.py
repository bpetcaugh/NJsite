import os
import shutil


#Replace the file in the current policy folder
os.replace("../temp/"+fileName, policyFolder)

#Copy,  rename and add it to the version Folder
shutil.copyfile(policyFolder, "../temp/"+fileName)
os.rename("../temp/"+fileName, "../temp/"+fileName+versionNumber)
shutil.move("../temp/"+fileName+versionNumber, versionFolder)

#syntax:: ("path/to/current/file.foo", "path/to/new/destination/for/file.foo")