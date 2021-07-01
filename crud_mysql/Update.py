import mysql.connector

myConnection = mysql.connector.connect(

    host="localhost",
    user = "root",
    password = "",
    database = "crud"
)

myCursor = myConnection.cursor()

query = "UPDATE details SET name = 'aslan' WHERE id = 4"



myCursor.execute(query)

myConnection.commit()

print(myCursor.rowcount, "record(s) affected")