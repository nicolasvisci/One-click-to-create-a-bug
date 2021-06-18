<!DOCTYPE html>

<html>
    <head>
        <title> Tamp </title>
        <style>
body {
    background: linear-gradient(-80deg, #3498eb, #2e8dcc, #1a9cbc, #1697a0);
    margin: 0;
    padding: 0;
}

header {
    margin: 0px;
    padding: 10px;
    background-color: #222;
    box-shadow: rgba(0,0,0,0.3);
}

.btn {
    border: 1px #222;
    background-color: #222;
    font-size: 20px;
    font-family: "montferrat";
    padding: 10px;
    position: relative;
    display: inline-block;
}

.btn_text {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

a.btn_text:hover {
    color: rgb(0, 255, 115);
}

main {
    display: flex;
    align-items: center;
    justify-content: center;
}

.compile-form {
    background-color: #222;
    padding: 130px 20px;
    margin: 40px; 
    width: 400px;
    border-radius: 10px;
    position: relative;
}

.scegli {
    display: block;
    background-color: #39b32e;
    border-radius: 5px;
    border: none;
    color: white;
    padding: 15px 32px;
    margin: 10px 0px;
    text-align: center;
    text-decoration: none;
    position: relative;
    width: 100%;
}

.scegli_text {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

.scegli_text:hover {
    color: #222;
}

input {
    display: block;
    margin: 20px 98px;
    border: 3px solid var(--clr-bg);
    border-radius: 2px;
    padding: .5em;
    font-size: 16px;
}

.regLog_btn {
    background-color: rgb(65, 138, 235);
    position: relative;
    padding: 9px 19px;
    width: 25%;
    margin-left: 185px;
    text-align: center;
    border: none;
    border-radius: 3px;
    font-weight: bold;
    cursor: pointer;
    color: #fff
}

.regLog:hover {
    color: #fff;
}

.regLog_text {
    color: #222;
}

.regLog_text:hover {
    color: #fff;
}

#guida {
    margin-left: 1350px;
    position:relative;
    bottom:  35px;
    color: black;
}

        </style>
    </head>

    <body>
        <header>
            <nav class="link">
                
                <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                <button class="btn"><a href="/signup_choice" class="btn_text">REGISTRATI</a></button>
                <button class="btn"><a href="/login" class="btn_text">LOGIN</a></button>
                <button class="btn"><a href="/" class="btn_text">HOME</a></button>
                <button type="btn" name="guida" class="material-icons" id="guida" formaction="guida"><a href="/guida" class="icons">info</a></button>

            </nav>
        </header>
        <?= \Config\Services::validation()->listErrors() ?>