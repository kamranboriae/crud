const pg = require('pg');

var config = {
    user: 'postgres',
    password: 'cloner',
    database: 'postgres'
}

const pool = new pg.Pool(config);

pool.connect()
    .then(client => {
        return client.query('SELECT * FROM cars WHERE id = $1', [1])
            .then(res => {
                client.release();
                console.log(res.rows[0]);
            })
            .catch(e => {
                client.release();
                console.log(e.stack);
            })
  }).finally(() => pool.end());