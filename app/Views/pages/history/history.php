<div class="history-form" >
<h1 class="white-text" style="text-align: center">Prenotazioni</h1>
<hr>
    <?php 
        $db = \Config\Database::connect();

        $sql = $db->query("SELECT nome_lab, tipologia_test, data, orario, costo*numero_prenotati AS costo_totale, numero_prenotati FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND prenotazioni.email_utente = '" . $_SESSION['email'] . "' AND tipologia_test = tipologia ORDER BY data DESC, orario DESC;")->getResultArray();
        $tuples = count($sql);

        ?>
        <h3 class="titolo" > LABORATORIO </h3>
        <h3 class="titolo" style="margin-left: 60px;"> TIPO DI TEST </h3>
        <h3 class="titolo" style="margin-left: 60px;"> DATA </h3>
        <h3 class="titolo" style="margin-left: 60px;"> ORARIO </h3>
        <h3 class="titolo" style="margin-left: 60px;"> COSTO </h3>
        <h3 class="titolo" style="margin-left: 60px;">
        <?php 
            if ($_SESSION['tipo_utente'] == 'CI') {

            } else {
                echo "N° PRENOTAZIONI";
            }
        ?>
        </h3>
        <?php 

        for ($i = 0; $i < $tuples; $i++) {
            ?>
            <div class="row"><div style="margin-left: 0px;"> <?php echo $sql[$i]['nome_lab']?> </div> <div style="margin-left: 43px;"> <?php echo $sql[$i]['tipologia_test'] ?> </div>
            <div style="margin-left: 27px; width: 100px;"> <?php echo $sql[$i]['data'] ?> </div> <div style="margin-left: 23px; width: 120px;"> <?php echo substr($sql[$i]['orario'], 0, 5) ?> </div> 
            <div style="margin-left: 26px; width: 110px;"> <?php echo $sql[$i]['costo_totale'] . "€"?> </div> <?php if($sql[$i]['numero_prenotati'] > 1) { echo "<div style='margin-left: 60px;'>"; echo $sql[$i]['numero_prenotati']; echo "</div>";}?> 
            <?php if(strtotime('now') < strtotime($sql[$i]['data']) - 86400 || (strtotime('now') < strtotime($sql[$i]['data']) && strtotime('now') < strtotime($sql[$i]['orario']))) {
                      echo "<button type='submit' name='annulla_prenotazione'";
                      if($sql[$i]['numero_prenotati'] == 1) {
                          echo "style='margin-left:240px' ";
                      }
                      echo " class='material-icons' id='" . $i . "' onclick='annulla_prenotazione(this.id)'> 
                      <a class='icons' style='font-size: 29px; color:rgb(255, 40, 20); line-height: 70px;'> 
                      cancel 
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
</script>