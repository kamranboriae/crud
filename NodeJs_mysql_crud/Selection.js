var mysql = require('mysql');

var connection = mysql.createPool({
    host : 'localhost',
    user : 'root',
    password : '',
    database : 'crud'
});

var query_select = "SELECT * FROM details";

connection.getConnection(function (err, connection) {
    connection.query(query_select, function (err, data) {
        if(err) throw err;
        else {
            console.log(data)
        }
    });
    connection.release();
});
