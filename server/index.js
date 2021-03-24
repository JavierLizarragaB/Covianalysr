const express = require ("express");
const app = express();

const mysql = require('mysql');
const db = mysql.createPool({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'bancomer',
});

const sqlInsert = "INSERT INTO cliente (Num_Cliente, Nombre_Propietario, Fecha_vigencia, Pais) VALUES (6, 'Javo Javito', '2222-03-04', 'MEXICO')"

app.get("/Saludo", (req, res) => {
    db.query(sqlInsert, (err, result)=> (
        res.send("Hola chavos !!")
    ))
    
});

app.listen(3001,() => {
    console.log("running in port 3001");
});
