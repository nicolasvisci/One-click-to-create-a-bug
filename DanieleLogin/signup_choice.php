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
                <button type="submit" name="registra-cittadino" class="scegli"><a href="signup_cittadino.php" class="scegli_text">Registrati come cittadino</a></button>
                <button type="submit" name="registra-datore" class="scegli"><a href="signup_datore.php" class="scegli_text">Registrati come datore di lavoro</a></button>
                <button type="submit" name="registra-medico" class="scegli"><a href="signup_medico.php" class="scegli_text">Registrati come medico di base</a></button>
                <button type="submit" name="registra-laboratorio" class="scegli"><a href="signup_laboratorio.php" class="scegli_text">Registrati come laboratorio d'analisi</a></button>
            </div>
        </main>
    </body>
</html>