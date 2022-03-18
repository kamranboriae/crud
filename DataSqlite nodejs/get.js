const sqlite3 = require('sqlite3').verbose();

let db = new sqlite3.Database('./db/chinook.db');

let query = `SELECT PlaylistId id, Name name FROM playlists WHERE PlaylistId  = ?`;

let PlaylistId = 1;

db.get(query, [PlaylistId], (err, row)=>{

    if (err) {
        return console.error(err.message);
    }
    return row ? console.log(row.id, row.name) : console.log(`No playlist found with the id ${playlistId}`);

});

db.close();