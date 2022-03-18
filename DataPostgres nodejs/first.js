const pg = require('pg');
const R = require('ramda');

const cs = 'postgres://postgres:cloner@localhost:5432/postgres';

const client = new pg.Client(cs);
client.connect();

client.query('SELECT 1 + 4').then(res => {

    const result = R.head(R.values(R.head(res.rows)));

    console.log(result);
}).finally(() => client.end());