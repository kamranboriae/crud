const pg = require('pg');

const cs = 'postgres://postgres:cloner@localhost:5432/postgres';

const client = new pg.Client(cs);

client.connect();

client.query('SELECT * FROM cars').then(res => {

    const fields = res.fields.map(field => field.name);

    console.log(fields);

}).catch(err => {
    console.log(err.stack);
}).finally(() => {
    client.end()
});