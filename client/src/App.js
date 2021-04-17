import React, {useState} from "react";
import Axios from 'axios';
import './App.css';

function App() {

  const [usernameReg, setUsernameReg] = useState("");
  const [passwordReg, setPasswordReg] = useState("");

  const [usernameLog, setUsername] = useState("");
  const [passwordLog, setPassword] = useState("");

  const [loginStatus, setLoginStatus] = useState("");

  const register = () => {
    Axios.post('http://localhost:3001/register', {
      username: usernameReg, 
      password: passwordReg,
    }).then((response) => {
      console.log(response);
    });
  };

  const login = () => {
    Axios.post('http://localhost:3001/login', {
      usernameLog: usernameLog, 
      passwordLog: passwordLog,
    }).then((response) => {
      console.log(response.data);

      if(response.data.message){
        setLoginStatus(response.data.message)
      } else {
        setLoginStatus(response.data)
      }
      
    });
  };

  return (
    <div className="App">
      <div className="registration">
        <h1>Registration</h1>
        <label>Username</label>
        <input type="text" onChange={(e) => {
          setUsernameReg(e.target.value);
        }}/>
        <label>Password</label>
        <input type="text" onChange={(e) => {
          setPasswordReg(e.target.value);
        }}/>
        <button onClick = {register}>Register</button>
      </div>
      <div className="login">
      <h1>Login</h1>
        <label>Username</label>
        <input type="text" placeholder="Username..." onChange={(e) => {
          setUsername(e.target.value);
        }}/>
        <label>Password</label>
        <input type="text" placeholder="Password..." onChange={(e) => {
          setPassword(e.target.value);
        }}/>
        <button onClick = {login}>Login</button>
      </div>
      <h4>{loginStatus}</h4>
    </div>
  );
}

export default App;
