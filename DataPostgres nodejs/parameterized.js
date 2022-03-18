const pg = require('pg');

const cs = 'postgres://postgres:cloner@localhost:5432/postgres';

const client = new pg.Client(cs);

client.connect();

const sql = 'SELECT * FROM cars WHERE price > $1';
const values = [50000];

client.query(sql, values).then(res => {

    const data = res.rows;

    data.forEach(row => console.log(row));

}).finally(() => {
    client.end()
});