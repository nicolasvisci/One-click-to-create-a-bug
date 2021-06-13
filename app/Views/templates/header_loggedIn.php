<!DOCTYPE html>

<html>
    <head>
        <title> Tamp </title>
        <style>
body {
    background: linear-gradient(to bottom right, #3498eb, #2e8dcc, #1a9cbc, #1697a0);
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

header {
    margin: 0px;
    padding: 25px;
    background-color: #222;
    box-shadow: rgba(0,0,0,0.3);
}

.profile-form {
    background-color: #222;
    padding: 40px 20px;
    margin: 40px;
    margin-left: 100px; 
    width: 400px;
    border-radius: 10px;
    position: relative;
    float: left;
}

p {
    background-color: #fff;
    display: block;
    margin: 20px 45px;
    border: 3px solid var(--clr-bg);
    border-radius: 2px;
    padding: .5em;
    font-size: 16px;
    text-align: center;
}

h1.profile {
    border: 5px solid;
    color: #fff;
    text-align: center;
    padding-bottom: 100px;
}

h1.home { 
    color: #000; 
    font-family: 'Helvetica Neue', sans-serif; 
    font-size: 60px; 
    font-weight: bold; 
    line-height: 1;
    text-align: center;
    text-shadow: 0 0 5px #fff, 0 0 5px #fff;
}    

h2.home { 
    color: #000;
    font-family: 'Helvetica Neue', sans-serif; 
    font-size: 40px; 
    font-weight: bold;
    line-height: 1;
    text-align: center; 
    text-shadow: 0 0 5px #fff, 0 0 5px #fff;
}

span {
    transition: background-size .5s, background-position .3s ease-in .5s;
    background-image: linear-gradient(#ff0000, #ff2200, #ff4400, #ff6600, #ff8800, #ffaa00, #ffcc00, #ffff00);
    background-repeat: no-repeat;
    background-position: 0% 100%;
    background-size: 100% 0px;
    border-radius: 10px 10px 10px 10px;
}

span:hover {
    transition: background-position .5s, background-size .3s ease-in .5s;
    background-size: 100% 100%;
    background-position: 0% 0%;
}

.modify-form {
    background-color: #222;
    padding: 20px 20px;
    margin: 40px; 
    margin-left: 400px;
    width: 400px;
    border-radius: 10px;
    position: relative;
    float: left;
}

input {
    display: block;
    margin: 4px 98px;
    border: 3px solid var(--clr-bg);
    border-radius: 2px;
    padding: .5em;
    font-size: 16px;
}

.agg_input {
    margin-top: 20px;
    margin-left: 70px;
}

footer {
    margin-top: auto;
    padding: 25px;
    background-color: #222;
}

button {
    background-color: #222;
    border:1px;
    cursor:pointer;
    size: 30px;
}

.del_btn {
    background-color: red;
    position: relative;
    padding: 9px 9px;
    width: 25%;
    margin-left: 25px;
    margin-top: 30px;
    text-align: center;
    border: none;
    border-radius: 3px;
    font-weight: bold;
    cursor: pointer;
    color: #fff;
    font-size: 11px;
}

.agg_btn {
    background-color: orange;
    position: relative;
    padding: 9px 0px;
    width: 35%;
    margin-left: 75px;
    margin-top: 30px;
    text-align: center;
    border-radius: 3px;
    font-weight: bold;
    cursor: pointer;
    color: #fff
}

.material-icons {
    color: white;
}    

.material-icons:hover{
    color:#ffa900;
}

.icons {
    font-size: 45px;
}

#home {
    margin-left: 35px;
}

#info {
    margin-left: 50px;
}

#notifiche {
    margin-left: 850px;
}

#profile {
    margin-left: 100px;
}

#logout {
    margin-left: 100px;
}

#prenota {
    margin-left: 420px;
}

#history {
    margin-left: 500px;
}

#calendario {
    margin-left: 700px;
}

        </style>
    </head>

    <body>
        <header>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <form>
            <button type="submit" name="home" class="material-icons" id="home" formaction="home"><a class="icons">home</a></button>
            <button type="submit" name="info" class="material-icons" id="info" formaction="info"><a class="icons">info</a></button>
            <button type="submit" name="notifiche" class="material-icons" id="notifiche" formaction="notifiche"><a class="icons">notifications_none</a></button>
            <button type="submit" name="person" class="material-icons" id="profile" formaction="profile"><a class="icons">person</a></button>
            <button type="submit" name="logout" class="material-icons" id="logout" formaction="logout"><a class="icons">logout</a></button>
        </form>

        </header>
        <?= \Config\Services::validation()->listErrors() ?> 