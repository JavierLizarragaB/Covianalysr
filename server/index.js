const express = require ("express");
const app = express();

const mysql = require('mysql');

var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'bancomer'
});

db.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});

const sqlInsert = "INSERT INTO cliente (Num_Cliente, Nombre_Propietario, Fecha_vigencia, Pais) VALUES (7, 'Javo Javito', '2222-03-04', 'MEXICO')"



app.get("/Saludo", (req, res) => {
    db.query(sqlInsert, function (err, result) {
        if (err) throw err;
        console.log("Result: " + result);
    });
    
});

app.listen(3001,() => {
    console.log("running in port 3001");
});
