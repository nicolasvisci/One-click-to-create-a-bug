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
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="cognome" placeholder="Cognome">
                <input type="date" name="data_nascita">
                <input type="text" name="cod_fisc" placeholder="Codice Fiscale">
                <input type="text" name="azienda_san" placeholder="Azienda Sanitaria">
                <input type="text" name="p_iva" placeholder="Partita Iva">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="pass" placeholder="Password">
                <input type="password" name="passconf" placeholder="Conferma Password">
                <button type="submit" name="submit" class="regLog_btn"><a href="login.php" class="regLog_text">Registrati</a></button>
            </div>
        </main>
    </body>
</html>