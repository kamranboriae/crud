const sqlite3 = require('sqlite3').verbose();

let db = new sqlite3.Database('./db/chinook.db');

let query = `SELECT DISTINCT Name name FROM playlists ORDER BY name`;

db.all(query, [], (err, rows)=>{
    if (err) {
        throw err;
    }
    rows.forEach((row)=>{

        console.log(row.name);

    });
});

db.close();