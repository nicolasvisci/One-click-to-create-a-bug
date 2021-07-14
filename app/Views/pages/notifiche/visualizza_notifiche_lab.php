<style>

span {
  transition: background-size .5s, background-position .3s ease-in .5s;
}
span:hover {
  transition: background-position .5s, background-size .3s ease-in .5s;
}
span {
  background-image: linear-gradient(orange, orange);
  background-repeat: no-repeat;
  background-position: 0% 100%;
  background-size: 100% 0px;
  border-radius: 10px 10px 10px 10px;
}
span:hover {
  background-size: 100% 100%;
  background-position: 0% 0%;
}

h1 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 10px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 0;
text-align: center;
border: 0px; 
}

.notifications-form {
    background-color: #222;
    padding: 40px 20px;
    margin: 100px;
    margin-left: 190px; 
    width: 1160px;
    border-radius: 10px;
    position: relative;
}

</style>

<div class="notifications-form">
<h1><span class="w3-margin w3-jumbo Title">NOTIFICHE</span></h1>
    <hr>

    <?php 
        session();
        $db = \Config\Database::connect();
        $sql = $db->query("SELECT id, tipologia_test, numero_prenotati, data, orario FROM notifiche, laboratori WHERE email_lab = email AND email ='" . $_SESSION['email'] . "' AND tipo = 'LAB' ORDER BY tempo DESC;")->getResultArray();
        $tuples = count($sql);

        for ($i = 0; $i < $tuples; $i++) {
            echo "<p style='width: 80%; float: left; margin-left: 100px;'>";

            if ($sql[$i]['id'] == 1) {

                echo "E' stata effettuata una prenotazione per <a style='color:orange';>" . $sql[$i]['tipologia_test'] . "</a> ";

                if($sql[$i]['numero_prenotati'] > 1) {
                    echo "per <a style='color:orange';>" . $sql[$i]['numero_prenotati'] . "</a> persone ";
                }

                echo " il giorno <a style='color:orange';>" . $sql[$i]['data'] . "</a> alle ore <a style='color:orange';>" . substr($sql[$i]['orario'], 0, 5);
                
            } else if ($sql[$i]['id'] == 2) {

                echo "La prenotazione per <a style='color:orange';>" . $sql[$i]['tipologia_test'] . "</a> ";

                if($sql[$i]['numero_prenotati'] > 1) {
                    echo "per <a style='color:orange';>" . $sql[$i]['numero_prenotati'] . "</a> persone ";
                }

                echo " il giorno <a style='color:orange';>" . $sql[$i]['data'] . "</a> alle ore <a style='color:orange';>" . substr($sql[$i]['orario'], 0, 5) . "</a> è stata annullata";

            } else if ($sql[$i]['id'] == 3) {

                echo "Hai annullato la prenotazione per <a style='color:orange';>" . $sql[$i]['tipologia_test'] . "</a> ";

                if($sql[$i]['numero_prenotati'] > 1) {
                    echo "per <a style='color:orange';>" . $sql[$i]['numero_prenotati'] . "</a> persone ";
                }

                echo " il giorno <a style='color:orange';>" . $sql[$i]['data'] . "</a> alle ore <a style='color:orange';>" . substr($sql[$i]['orario'], 0, 5);
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