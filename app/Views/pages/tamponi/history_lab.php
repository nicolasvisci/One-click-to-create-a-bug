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
font-size: 60px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
text-align: center;
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

.white-text {
    color: white;
    font-weight: bold;
    
}

.orange-text {
    color: orange;
    display: inline;
    font-weight: bold;
    
}

h3.titolo {
    display: inline;
    color: white; 
    font-weight: bold;
}

.row div{
    float:left;
    width: 170px;
    height: 50px;
    border-radius: 5px;
    text-align: center;
    line-height: 50px;
    margin: 10px;
    background-color: #fff;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php 
    $db = \Config\Database::connect();
    $data = $_SESSION['date'];

    $sql = $db->query("SELECT tipologia_test, orario, numero_prenotati, numero_positivi FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND tipologia_test = tipologia AND data = '" . $data . "' AND laboratori.email = '" . $_SESSION['email'] . "' ORDER BY orario ASC;")->getResultArray();
    $tuples = count($sql);

?>

<div class="history-form" >
    <h1 class="white-text" style="text-align: center"><span>Prenotazioni</span></h1>
    <hr>
    <center>
    <h3 class="titolo" style="margin-left: 30px;"> DATA: </h3><h3 class="orange-text"><?php echo $_SESSION['date']?></h3>
    </center>
    <br> <br> <br>
    <h3 class="titolo" style="margin-left: 30px;"><span> TIPO DI TEST </span></h3>
    
    <h3 class="titolo" style="margin-left: 100px;"><span>  ORARIO </span></h3>
    <h3 class="titolo" style="margin-left: 100px;"><span>  N° PRENOTAZIONI </span></h3>

    <?php 

        for($i = 0; $i < $tuples; $i++) {
            ?>
            <div class="row"> <div style="margin-left:20px;"><?php echo $sql[$i]['tipologia_test']?></div> 
            <div style="margin-left: 43px;"> <?php echo substr($sql[$i]['orario'], 0, 5) ?> </div> 
            <div style="margin-left: 79px;"> <?php echo $sql[$i]['numero_prenotati'] ?> </div> </div>
            

            <?php 

                echo "<button type='submit' name='get_info' style='margin-left:275px' class='material-icons' id='" . $i . "' onclick='get_info(this.id)'> 
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
                else if (strtotime('now')> strtotime($data . " " . $sql[$i]['orario']) && $sql[$i]['numero_positivi'] == 0) {
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