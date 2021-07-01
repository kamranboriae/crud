import mysql.connector

myConnection = mysql.connector.connect(

    host="localhost",
    user = "root",
    password = "",
    database = "crud"
)

myCursor = myConnection.cursor()

query = "INSERT INTO details (name,age) VALUES (%s,%s)"

value = ("aslan",22)

myCursor.execute(query, value)

myConnection.commit()

print(myCursor.rowcount, "record inserted .")