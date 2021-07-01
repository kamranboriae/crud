import mysql.connector

myConnection = mysql.connector.connect(

    host="localhost",
    user = "root",
    password = "",
    database = "crud"
)
mycursor = myConnection.cursor()

mycursor.execute("SHOW TABLES")

for x in mycursor:
  print(x)