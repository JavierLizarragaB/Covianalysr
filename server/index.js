const express = require ("express");
const mysql = require('mysql');
const cors = require('cors')

const app = express();
app.use(express.json());
app.use(cors());

var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'covianalyst'
});

app.post("/register", (req, res) =>{

    const username = req.body.username
    const password = req.body.password
    var count

    db.query(
        "SELECT COUNT(*) AS total from usuarios",
        (err, result, fields) => {
            console.log(err);
            count = result[0].total;
            db.query(
                "INSERT INTO usuarios (ID_Usuario, Correo, Password_Hashed, Rights) VALUES (?, ?, ?, 1)",
                [count, username, password],
                (err, result) => {
                    console.log(err);
                }
            );
        }
    );
    console.log(count);

    
});

app.post("/login", (req, res) => {
    const usernameLog = req.body.usernameLog;
    const passwordLog = req.body.passwordLog;

    db.query(
        "SELECT * FROM usuarios WHERE Correo = ? AND Password_Hashed = ?",
        [usernameLog, passwordLog],
        (err, result, fields) => {
            if (err) {
                res.send({err: err});
            }
            if (result.length) {
                res.send(result[0].Correo);
            } else {
                res.send({ message: "Correo o contrasena incorrectos"});
            }
        }
    );
});

app.listen(3001,() => {
    console.log("running in port 3001");
});
