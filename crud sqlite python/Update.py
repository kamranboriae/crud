import sqlite3

connection = sqlite3.connect('example.db')
print("Opened database Successfully")

connection.execute("UPDATE  template_tbl SET Name = 'Javad' WHERE ID = 1")
connection.commit()

cursor = connection.execute("SELECT  * FROM  template_tbl")
print(cursor.fetchall())

connection.close()