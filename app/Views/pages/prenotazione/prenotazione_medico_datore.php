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

.book-form {
    background-color: #222;
    padding: 40px 20px;
    margin: 100px;
    margin-left: 370px; 
    width: 800px;
    border-radius: 10px;
    position: relative;
}

div.book-options {
    float: left;
    width: 170px;
    height: 130px;
    margin-left: 62px;
    border-radius: 5px;
    text-align: center;
    background-color: white;
}

.white-text {
    color: white;
    font-weight: bold;

}

.orange-text {
    color: orange;
    font-weight: bold;
    
}

.btn {
  background-color: orange;
  border: none;
  border-radius: 5px;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
  width: 40%;
  margin-top: 100px;
  margin-left: 50px;
}
</style>

<?php 
    $db = \Config\Database::connect(); 

    $sql = $db->query("SELECT DISTINCT * FROM test, laboratori WHERE test.email = '" . $_SESSION['email_lab'] . "' AND laboratori.email = test.email;")->getResultArray();
    $nome_lab = $sql[0]['nome_lab'];
    $email = $sql[0]['email'];
    $numero_telefono = $sql[0]['numero_telefono'];
    $tipologia = $sql[0]['tipologia'];
    $orario_inizio = $sql[0]['orario_inizio'];
    $orario_fine = $sql[0]['orario_fine'];
    $costo = $sql[0]['costo'];
    

    //unset($_SESSION["email_lab"]);
?>

<div class="book-form">
    <center>
    <h1 class="white-text" style="font-size:50px"><span> <?php echo $nome_lab?></span></h1>
    <h5 class="white-text"> Email: </h5><h5 class="orange-text"><?php echo $email?></h5>
    <h5 class="white-text"> Numero di telefono: </h5><h5 class="orange-text"><?php echo $numero_telefono?></h5>
    <br> <br>
    <h2 class="white-text"><span> Test disponibili </span></h2>
    </center>

    <?php

        $db = \Config\Database::connect();

        $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email_lab'] . "' ORDER BY tipologia;")->getResultArray();
        $tuples = count($sql);

        for ($i = 0; $i < $tuples; $i++) {
            ?>
            <center>
            <div class="book-options"> <?php echo strtoupper($sql[$i]['tipologia']) ?> <br> <?php echo "Orario: " . $sql[$i]['orario_inizio'] . "-" . $sql[$i]['orario_fine'] ?> <br> <?php echo "Costo: " . $sql[$i]['costo']  . "€" ;?> <br> 
                <tr> <td> <center><input type="checkbox" name="seleziona" value="1" tabIndex="1" onclick="ckChange(this)"></center> </td> </tr> 
            </div>
            </center>
    <?php 
        }

    ?>

    <div style="clear:both;"></div>
    <button id="prenotazione_singola" type="submit" name="submit" class="btn">PRENOTAZIONE SINGOLA</button>
    <button id="prenotazione_multipla" type="submit" name="submit" class="btn">PRENOTAZIONE MULTIPLA</button>
</div>

<script>
    var id;
    
    function ckChange(ckType) {
        var ckName = document.getElementsByName(ckType.name);
        
        for (var i = 0; i < ckName.length; i++) {
            if (!ckType.checked) {
                ckName[i].disabled = false;
            } else {
                if (!ckName[i].checked) {
                    ckName[i].disabled = true;
                } else {
                    ckName[i].disabled = false;
                }
            }
        }
        
        for (var i = 0; i < ckName.length; i++) {
            if (ckName[i].checked) {
                id = i;
            }

            if (id != null && !ckName[id].checked) {
                id = null;
            }
        }
    };

    $("#prenotazione_singola").click(function() {

        if (id != null) {
            $.ajax({
                url:"/setBookData",
                type: 'POST',
                data: {id},
                dataType: "json",
                success: function(res){
                    console.log(res);
                    window.location.href = "/conferma_prenotazione_singola";
                }
            });
        }

        else {
            alert("seleziona un test! ");
        }
    });

    $("#prenotazione_multipla").click(function() {

        if (id != null) {
            $.ajax({
                url:"/setBookData",
                type: 'POST',
                data: {id},
                dataType: "json",
                success: function(res){
                    console.log(res);
                    window.location.href = "/conferma_prenotazione_multipla";
                }
            });
        }

        else {
            alert("seleziona un test! ");
        }
    });

</script>


