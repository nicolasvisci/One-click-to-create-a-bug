<?php 
    $db = \Config\Database::connect(); 

    $sql = $db->query("SELECT DISTINCT * FROM test, laboratori WHERE test.email = '" . $_SESSION['email_lab'] . "' AND laboratori.email = test.email;")->getResultArray();
    $nome_lab = $sql[0]['nome_lab'];
    $email = $sql[0]['email'];
    $numero_telefono = $sql[0]['numero_telefono'];
?>

<div class="book-form">

    <h1 class="white-text"> <?php echo $nome_lab?></h1>
    <h5 class="white-text"> email: <?php echo $email?></h5>
    <h5 class="white-text"> numero di telefono: <?php echo $numero_telefono?></h5>
    <br> <hr> 
    <h2 class="white-text"> Test disponibili </h2>

    <?php

        $db = \Config\Database::connect();

        $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email_lab'] . "' ORDER BY tipologia;")->getResultArray();
        $tuples = count($sql);

        for ($i = 0; $i < $tuples; $i++) {
            ?>
            <div class="book-options"> <?php echo $sql[$i]['tipologia'] ?> <br> <?php echo "Orario: " . substr($sql[$i]['orario_inizio'], 0, 5) . "-" . substr($sql[$i]['orario_fine'], 0, 5) ?> <br> <?php echo "Costo: " . $sql[$i]['costo']  . "€" ;?> <br> 
                <tr> <td> <input type="checkbox" name="seleziona" value="1" tabIndex="1" onclick="ckChange(this)"> </td> </tr> 
            </div>
    <?php 
        }

    ?>

    <div style="clear:both;"></div>
    <button id="prenotazione_singola" type="submit" name="submit" class="agg_btn" style="background-color: green;">PRENOTAZIONE SINGOLA</button>
    <button id="prenotazione_multipla" type="submit" name="submit" class="agg_btn" style="background-color: green">PRENOTAZIONE MULTIPLA</button>
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


