<?php
    include_once 'header.php';
?>

<html>
    <head>
        <title> Tamp </title>
        <style>
            @import url('style.css');
        </style>
    </head>
    
    <body>
        <main>
            <div class="compile-form">
                <input type="text" name="nome_lab" placeholder="Nome Laboratorio">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="num_tel" placeholder="Numero di telefono">
                <input type="password" name="pass" placeholder="Password">
                <input type="password" name="passconf" placeholder="Conferma Password">
                <button type="submit" name="submit" class="regLog_btn"><a href="login.php" class="regLog_text">Registrati</a></button>
            </div>
        </main>
    </body>
</html>