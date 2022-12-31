import pymysql
mydb = pymysql.connect(host = "bridge2.mysql.guardedhost.com",user = "bridge2_cdy3test",password = "2d-Dy4wqhm8Q",database = "bridge2_cdy3test")
print(mydb)
print("connection successful")
myCursor = mydb.cursor()
myCursor.execute("""CREATE TABLE family(
    name varchar(20) NOT NULL,
    age int DEFAULT "0",
    number int  AUTO_INCREMENT,
    PRIMARY KEY (NUMBER)
    )   
""")
