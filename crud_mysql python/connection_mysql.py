import mysql.connector

myConnection = mysql.connector.connect(

    host="localhost",
    user = "root",
    password = "",
    database = "crud"
)
print(myConnection)