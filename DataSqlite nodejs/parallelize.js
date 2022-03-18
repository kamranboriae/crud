const sqlite3 = require('sqlite3').verbose();

let db = new sqlite3.Database(':memory:', (err)=>{
    if (err) {
        console.error(err.message);
    }
});

function dbSum(a, b, db){
    db.get('SELECT (? + ?) sum', [a, b], (err, row) => {
        if (err) {
            console.error(err.message);
        }
        console.log(`The sum of ${a} and ${b} is ${row.sum}`);
    });
}

db.parallelize(()=>{
    dbSum(1, 1, db);
    dbSum(2, 2, db);
});

db.close((err)=>{
    if (err) {
        return console.error(err.message);
    }
});