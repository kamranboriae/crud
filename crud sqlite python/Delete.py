import sqlite3

connection = sqlite3.connect('example.db')
print("Opened database Successfully")

connection.execute("DELETE FROM template_tbl WHERE ID = 5")
connection.commit()


cursor = connection.execute("SELECT  * FROM  template_tbl")
print(cursor.fetchall())

connection.close()