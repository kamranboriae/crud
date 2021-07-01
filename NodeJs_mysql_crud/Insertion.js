var mysql = require('mysql');

var connection = mysql.createPool({
    host : 'localhost',
    user : 'root',
    password : '',
    database : 'crud'
});

var query_insert = "INSERT INTO details(name,age) VALUE(?, ?)";

connection.getConnection(function (err, connection) {
    connection.query(query_insert, ['nader',22],function (err, res) {
        if(err) throw err;
        else {
            console.log('Details added  Successfully')
        }
    });
    connection.release();
});
