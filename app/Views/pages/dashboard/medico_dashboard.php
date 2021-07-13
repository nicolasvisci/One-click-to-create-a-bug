    <main>
        <br>
        <br>
        <br>
        <br>
        <h1 class="home"> <span>Dott./Dott.ssa <?php echo $_SESSION['cognome']?> </span></h1>
        <h2 class="home"> <span>Medico di Base</span></h2>
        <?php 
            session();
            $db = \Config\Database::connect();

            $sql = $db->query("SELECT COUNT(*) as numero FROM notifiche WHERE email_utente = '" . $_SESSION['email'] . "' AND tipo = 'UTENTE';")->getResultArray();
            $numero = $sql[0]['numero'];

            if ($numero) {
                echo "<h3 style='text-align: center; font-weight: bold'> Hai " . $sql[0]['numero'] . " notifica/che";
            }
        ?>
    </main> 