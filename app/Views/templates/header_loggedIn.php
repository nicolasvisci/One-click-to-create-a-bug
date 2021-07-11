<!DOCTYPE html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

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
    margin-left: 130px; 
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

h1 {
    border: 5px solid;
    color: #fff;
    text-align: center;
    padding-bottom: 100px;
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
    padding: 10px 9px;
    width: 30%;
    margin-left: 30px;
    margin-top: 30px;
    text-align: center;
    border: none;
    border-radius: 3px;
    font-weight: bold;
    cursor: pointer;
    color: #fff;
    font-size: 15px;
}

.agg_btn {
    background-color: orange;
    position: relative;
    padding: 9px 0px;
    width: 35%;
    margin-left: 65px;
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

#notifiche {
    margin-left: 900px;
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

#guida {
    margin-left: 150px;
    position:relative;
    bottom:  52px;
}

#download {
    margin-left: 50px;
    position:relative;
    bottom:  52px;
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
            <button type="submit" name="notifiche" class="material-icons" id="notifiche" formaction="notifiche"><a class="icons">notifications_none</a></button>
            <button type="submit" name="person" class="material-icons" id="profile" formaction="profile"><a class="icons">person</a></button>
            <button type="submit" name="logout" class="material-icons" id="logout" formaction="logout"><a class="icons">logout</a></button>
            <button type="submit" name="guida" class="material-icons" id="guida" formaction="guida_loggedIn"><a class="icons">info</a></button>
            <button type="submit" name="download" class="material-icons" id="download" formaction="download"><a class="icons">download</a></button>
        </form>


        </header>
        <?= \Config\Services::validation()->listErrors() ?>