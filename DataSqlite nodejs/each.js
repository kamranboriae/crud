const sqlite3 = require('sqlite3').verbose();

let db = new sqlite3.Database('./db/chinook.db');

let query =  `SELECT FirstName firstName, LastName lastName, Email email FROM customers WHERE Country = ? ORDER BY FirstName`;

db.each(query, ['USA'],(err, row)=>{

    if (err) {
        throw err;
    }
    console.log(`${row.firstName} ${row.lastName} - ${row.email}`);
});

db.close();