import os
import shutil

#Define Variables
for filename in os.listdir("../oldversions/"):
    if filename.endswith(".pdf") and filename.split("v")[0] == fileName.split("v")[0]:
        versionNumber+=1
#Replace the file in the current policy folder
os.replace("../temp/"+fileName, policyFolder+fileName)

#Copy,  rename and add it to the version Folder
shutil.copyfile(policyFolder+fileName, "../temp/"+fileName)
os.rename("../temp/"+fileName, "../temp/"+fileName+versionNumber)
shutil.move("../temp/"+fileName+versionNumber, versionFolder)

#syntax:: ("path/to/current/file.foo", "path/to/new/destination/for/file.foo")