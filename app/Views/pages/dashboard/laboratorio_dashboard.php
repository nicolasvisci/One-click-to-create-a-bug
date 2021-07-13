    <main>
        <br>
        <br>
        <br>
        <br>
        <h1 class="home"> <span><?php echo $_SESSION['nome_lab']?></span></h1>
        <h2 class="home"> <span> Laboratorio di Analisi</span></h2>
        <?php 
            session();
            $db = \Config\Database::connect();

            $sql = $db->query("SELECT COUNT(*) as numero FROM notifiche WHERE email_lab = '" . $_SESSION['email'] . "' AND tipo = 'LAB';")->getResultArray();
            $numero = $sql[0]['numero'];

            if ($numero) {
                echo "<h3 style='text-align: center; font-weight: bold'> Hai " . $sql[0]['numero'] . " notifica/che";
            }
        ?>
    </main>
    