import mysql.connector

myConnection = mysql.connector.connect(

    host="localhost",
    user = "root",
    password = "",
    database = "crud"
)

myCursor = myConnection.cursor()

query = "DELETE FROM details WHERE age = 22 "

myCursor.execute(query)

myConnection.commit()

print(myCursor.rowcount, "record(s) deleted")