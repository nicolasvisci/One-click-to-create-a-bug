<?php 
    $db = \Config\Database::connect();
    $data = $_SESSION['date'];

    $sql = $db->query("SELECT tipologia_test, orario, numero_prenotati, numero_positivi FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND tipologia_test = tipologia AND data = '" . $data . "' AND laboratori.email = '" . $_SESSION['email'] . "' ORDER BY orario ASC;")->getResultArray();
    $tuples = count($sql);

?>

<div class="history-form" >
    <h1 class="white-text" style="text-align: center">Prenotazioni</h1>
    <hr>
    <h3 class="titolo" style="margin-left: 30px;"> DATA: <?php echo $_SESSION['date']?></h3>
    <br> <br> <br>
    <h3 class="titolo" style="margin-left: 30px;"> TIPO DI TEST </h3>
    
    <h3 class="titolo" style="margin-left: 100px;"> ORARIO </h3>
    <h3 class="titolo" style="margin-left: 100px;"> N° PRENOTAZIONI </h3>

    <?php 

        for($i = 0; $i < $tuples; $i++) {
            ?>
            <div class="row"> <div style="margin-left:20px;"><?php echo $sql[$i]['tipologia_test']?></div> 
            <div style="margin-left: 43px;"> <?php echo substr($sql[$i]['orario'], 0, 5) ?> </div> 
            <div style="margin-left: 79px;"> <?php echo $sql[$i]['numero_prenotati'] ?> </div> </div>
            

            <?php 

                echo "<button type='submit' name='annulla_prenotazione' style='margin-left:275px' class='material-icons' id='" . $i . "' onclick='get_info(this.id)'> 
                <a class='icons' style='font-size: 50px; color:rgb(185, 185, 185); line-height: 70px;'> 
                info 
                </a> 
                </button>";
            
                if(strtotime('now') < strtotime($data) - 86400 || (strtotime('now') < strtotime($data) && strtotime('now') < strtotime($sql[$i]['orario']))) {
                    echo "<button type='submit' name='annulla_prenotazione' style='margin-left:30px' class='material-icons' id='" . $i . "' onclick='annulla_prenotazione(this.id)'> 
                    <a class='icons' style='font-size: 50px; color:rgb(255, 40, 20); line-height: 70px;'> 
                    cancel 
                    </a> 
                    </button>";
                }
                  
                else if (strtotime('now') > strtotime($data . " " . $sql[$i]['orario']) && $sql[$i]['numero_positivi'] == NULL) {
                    echo "<button type='submit' name='set_risultato' style='margin-left:30px' class='material-icons' id='" . $i . "' onclick='set_risultato(this.id)'> 
                    <a class='icons' style='font-size: 50px; color:rgb(100, 185, 20); line-height: 70px;'> 
                    rule
                    </a> 
                    </button>";
                }
                  
            ?>  

        <div style="clear:both"></div>

        <?php } ?>
</div>

<script>

    function get_info(id) {
        $.ajax({
            url: "/get_info",
            type: "POST",
            data: {id},
            dataType: "json",
            success: function(){
                window.location.href = "/mostra_info";
            }
        })
    }

    function annulla_prenotazione(id){
        $.ajax({
            url: "/annulla_prenotazione",
            type: "POST",
            data: {id},
            dataType: "json",
            success: function(){
                window.location.href = "/history_lab";
            }
        })
    }

    function set_risultato(id){
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