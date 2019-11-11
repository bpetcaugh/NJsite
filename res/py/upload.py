import os
import shutil
import sys
import mysql.connector

reasoning = "none specified"
if (len(sys.argv) > 1):
	reasoning = sys.argv[1]

def dir(path):
    return list(os.walk(path))[0][2]

#Define Variables

fileName=([i for i in dir("../temp/") if i != "dummy.txt"])[0]
policyFolder="../policies/"

versionNumber=0

versionFolder="../oldversions/"
for filename in os.listdir("../oldversions/"):
    if filename.endswith(".pdf") and filename.split("v")[0] == fileName.split("v")[0]:
        versionNumber+=1

versionNumber = "v"+str(versionNumber)

#Replace the file in the current policy folder
os.replace("../temp/"+fileName, policyFolder+fileName)

#Copy,  rename and add it to the version Folder
shutil.copyfile(policyFolder+fileName, "../temp/"+fileName)
os.rename("../temp/"+fileName, "../temp/"+fileName.split(".")[0]+versionNumber+"."+fileName.split(".")[1])
shutil.move("../temp/"+fileName.split(".")[0]+versionNumber+"."+fileName.split(".")[1], versionFolder)
#syntax:: ("path/to/current/file.foo", "path/to/new/destination/for/file.foo")

#Connect to the Databse
mydb = mysql.connector.connect(
  host="localhost",
  user="yourusername",
  passwd="yourpassword"
)
#Add data to the database

mycursor = mydb.cursor()

sql = "INSERT INTO Policies (policy_name, version, reasoning) VALUES (%s, %s, %s)"
val = (fielname-".pdf", versionNumber, reasoning)
mycursor.execute(sql, val)

mydb.commit()