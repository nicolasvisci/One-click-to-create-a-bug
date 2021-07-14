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

.history-form {
    background-color: #222;
    padding: 40px 20px;
    margin: 100px;
    margin-left: 190px; 
    width: 1160px;
    border-radius: 10px;
    position: relative;
}

.row div{
    float:left;
    width: 200px;
    height: 50px;
    border-radius: 5px;
    text-align: center;
    line-height: 50px;
    margin: 10px;
    background-color: #fff;
}

h3.titolo {
    display:inline;
    color:white; 
    font-weight:bold;
}

</style>

<?php
    $db = \Config\Database::connect();

    
?>

<div class="history-form" >
<h1><span class="w3-margin w3-jumbo Title">PRENOTAZIONI</span></h1>
<hr>
    <?php 
        $db = \Config\Database::connect();

        $sql = $db->query("SELECT nome_lab, tipologia_test, data, orario, costo*numero_prenotati AS costo_totale, numero_prenotati, numero_positivi FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND prenotazioni.email_utente = '" . $_SESSION['email'] . "' AND tipologia_test = tipologia ORDER BY data DESC, orario DESC;")->getResultArray();
        $tuples = count($sql);

        ?>
        <h3 class="titolo" style="margin-left: 15px;" ><span> LABORATORIO</span></h3>
        <h3 class="titolo" style="margin-left: 60px;"><span> TIPO DI TEST</span></h3>
        <h3 class="titolo" style="margin-left: 60px;"><span> DATA</span></h3>
        <h3 class="titolo" style="margin-left: 50px;"><span> ORARIO</span></h3>
        <h3 class="titolo" style="margin-left: 60px;"><span> COSTO</span></h3>
        <h3 class="titolo" style="margin-left: 70px;"><span> N° PRENOTATI</span></h3>
        <?php 

        for ($i = 0; $i < $tuples; $i++) {
            ?>
            <div class="row"><div style="margin-left: 0px;"> <?php echo $sql[$i]['nome_lab']?> </div> <div style="margin-left: 10px;"> <?php echo $sql[$i]['tipologia_test'] ?> </div>
            <div style="margin-left: 10px; width: 100px;"> <?php echo $sql[$i]['data'] ?> </div> <div style="margin-left: 15px; width: 120px;"> <?php echo substr($sql[$i]['orario'], 0, 5) ?> </div> 
            <div style="margin-left: 26px; width: 110px;"> <?php echo $sql[$i]['costo_totale'] . "€"?> </div> <?php  { echo "<div style='margin-left: 28px;'>"; echo $sql[$i]['numero_prenotati']; echo "</div>";}?> 
            <?php if(strtotime('now') < strtotime($sql[$i]['data']) - 86400 || (strtotime('now') < strtotime($sql[$i]['data']) && strtotime('now') < strtotime($sql[$i]['orario']))) {
                      echo "<button type='submit' name='annulla_prenotazione'";
                      echo " class='material-icons' id='" . $i . "' onclick='annulla_prenotazione(this.id)'> 
                      <a class='icons' style='font-size: 29px; color:rgb(255, 40, 20); line-height: 70px;'> 
                      cancel 
                      </a> 
                      </button>";
                  } else if($sql[$i]['numero_positivi'] !== NULL) {
                    echo "<button type='submit' name='mostra_risultato'";
                    session();

                    echo " class='material-icons' id='" . $i . "' onclick='mostra_risultato(this.id)'> 
                    <a class='icons' style='font-size: 29px; color:rgb(185, 185, 185); line-height: 70px;'> 
                    info
                    </a> 
                    </button>";
              } ?> </div>
            <div style="clear:both;"></div>
            
        <?php }  ?>
</div> 

<script>
    function annulla_prenotazione(id){
        $.ajax({
            url: "/annulla_prenotazione",
            type: "POST",
            data: {id},
            dataType: "json",
            success: function(){
                window.location.href = "/history";
            }
        })
    }

    function mostra_risultato(id) {
        $.ajax({
            url: "/get_risultato_utente",
            type: "POST",
            data: {id},
            dataType: "json",
            success: function(){
                window.location.href = "/mostra_risultato";
            }
        })
    }
</script>