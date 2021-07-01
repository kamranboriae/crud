var mysql = require('mysql');

var connection = mysql.createPool({
    host : 'localhost',
    user : 'root',
    password : '',
    database : 'crud'
});

var query_delete = " DELETE FROM details WHERE name = ? ";

connection.getConnection(function (err, connection) {
    connection.query(query_delete,['kamran'], function (err, res) {
        if(err) throw err;
        else {
            console.log('A record is removed !')
        }
    });
    connection.release();
});
