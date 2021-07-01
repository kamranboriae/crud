var mysql = require('mysql');

var connection = mysql.createPool({
    host : 'localhost',
    user : 'root',
    password : '',
    database : 'crud'
});

var table = "CREATE TABLE details (id int(15) Not Null AUTO_INCREMENT," +
    "name varchar(30) DEFAULT NULL," +
    "age float(15) DEFAULT NULL," +
    "PRIMARY KEY(id)) ENGINE=InnoDB DEFAULT CHARSET=latin1";

connection.getConnection(function (err, connection) {
    connection.query(table,function (err) {
        if(err) throw err;
        else {
            console.log('Table created Successfully')
        }
    });
    connection.release();
});
