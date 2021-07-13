<div class="notifications-form">
    <h1 style="text-align: center; color: white; font-weight: bold;"> Notifiche </h1>
    <hr>

    <?php 
        session();
        $db = \Config\Database::connect();
        $sql = $db->query("SELECT id, tipologia_test, numero_prenotati, data, orario FROM notifiche, laboratori WHERE email_lab = email AND email ='" . $_SESSION['email'] . "' AND tipo = 'LAB' ORDER BY tempo DESC;")->getResultArray();
        $tuples = count($sql);

        for ($i = 0; $i < $tuples; $i++) {
            echo "<p style='width: 80%; float: left; margin-left: 100px;'>";

            if ($sql[$i]['id'] == 1) {

                echo "E' stata effettuata una prenotazione per " . $sql[$i]['tipologia_test'] . " ";

                if($sql[$i]['numero_prenotati'] > 1) {
                    echo "per " . $sql[$i]['numero_prenotati'] . " persone ";
                }

                echo " il giorno " . $sql[$i]['data'] . " alle ore " . substr($sql[$i]['orario'], 0, 5);
                
            } else if ($sql[$i]['id'] == 2) {

                echo "La prenotazione per " . $sql[$i]['tipologia_test'] . " ";

                if($sql[$i]['numero_prenotati'] > 1) {
                    echo "per " . $sql[$i]['numero_prenotati'] . " persone ";
                }

                echo " il giorno " . $sql[$i]['data'] . " alle ore " . substr($sql[$i]['orario'], 0, 5) . " è stata annullata";

            } else if ($sql[$i]['id'] == 3) {

                echo "Hai annullato la prenotazione per " . $sql[$i]['tipologia_test'] . " ";

                if($sql[$i]['numero_prenotati'] > 1) {
                    echo "per " . $sql[$i]['numero_prenotati'] . " persone ";
                }

                echo " il giorno " . $sql[$i]['data'] . " alle ore " . substr($sql[$i]['orario'], 0, 5);
            } 

            echo "</p>";
            echo "<button type='submit' name='elimina_notifica' class='material-icons' id='" . $i . "' onclick='elimina_notifica(this.id)'> 
            <a class='icons' style='font-size: 29px; color:rgb(255, 40, 20); line-height: 79px;'> 
            cancel 
            </a> 
            </button>";
            echo "<div style='clear:both'> </div>";
        }

    ?>
    
</div>

<script>
    function elimina_notifica(id) {

        $.ajax({
            url: "/elimina_notifica",
            type: "POST",
            data: {id},
            dataType: "json",
            success: function(){
                window.location.href = "/visualizza_notifiche";
            }
        })
    }
</script>