import generateQrPdf as gen
import pymysql
myConnection = pymysql.connect( host="bridge2.mysql.guardedhost.com", user="bridge2_cdy3test", passwd="2d-Dy4wqhm8Q", db="bridge2_cdy3test" )
cur = myConnection.cursor()
locationList = []
with open("location.txt", "r") as f:
    locationList = f.read().split("\n")
print(locationList)
for i in range(len(locationList)):
    locationList[i] = locationList[i].upper()
    print(i)
    hashedCode = gen.generateCode(locationList[i],0,locationList[i])
    gen.generatePDF(locationList[i])
    cur.execute('INSERT INTO location VALUES("{0}","{1}")'.format(gen.encrypted,locationList[i]))
    myConnection.commit()

myConnection.close()
