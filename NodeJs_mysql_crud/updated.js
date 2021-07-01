var mysql = require('mysql');

var connection = mysql.createPool({
    host : 'localhost',
    user : 'root',
    password : '',
    database : 'crud'
});

var query_update = "UPDATE details SET age = ? WHERE name = ? ";

connection.getConnection(function (err, connection) {
    connection.query(query_update,['kamran', 22], function (err, res) {
        if(err) throw err;
        else {
            console.log('Updated the age of kamran !')
        }
    });
    connection.release();
});
