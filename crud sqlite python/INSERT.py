import sqlite3

connection = sqlite3.connect('example.db')

print("Opened database Successfully")



connection.execute("INSERT INTO template_tbl(Name, Age) VALUES ('Aslan', '22')")
connection.commit()
print("Records inserted successfully")
connection.close()