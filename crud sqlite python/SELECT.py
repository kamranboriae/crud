import sqlite3

connection = sqlite3.connect('example.db')
print("Opened database Successfully")

#data = connection.execute("SELECT  * FROM template_tbl")

#for row in data:

#    print("ID : ",row[0] ,"Name : ", row[1] , "Age : ", row[2])

cursor = connection.execute("SELECT  * FROM template_tbl")
print(cursor.fetchall())

connection.close()