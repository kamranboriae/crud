import mysql.connector

myConnection = mysql.connector.connect(

    host="localhost",
    user = "root",
    password = "",
    database = "crud"
)

myCursor = myConnection.cursor()

myCursor.execute("SELECT * FROM details")

myResult =  myCursor.fetchall()

for x in myResult:
    print(x)