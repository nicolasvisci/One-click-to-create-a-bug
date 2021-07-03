<?php 
    $db = \Config\Database::connect();
    $id = $_SESSION['id'];
    
    $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email_lab'] . "' ORDER BY tipologia;")->getResultArray()[$id];
    $tipologia = $sql['tipologia'];
    $orario_inizio = substr($sql['orario_inizio'], 0, 5);
    $orario_fine = substr($sql['orario_fine'], 0, 5);
    $costo = $sql['costo'];
    $_SESSION['prenotazione'] = 'prenotazione_singola';
?>

<form class="book-form" method='post'>

    <h1 class="white-text"> <?php echo $tipologia?></h1>
    <h4 class="white-text">Orario disponibile: <?php echo $orario_inizio . "-" . $orario_fine ?></h4>
    <h4 class="white-text">Costo: <?php echo $costo . "€"?></h4>
    <h4 class="white-text">Data: <input type="date" name="data_prenotazione" style="border: 3px solid var(--clr-bg); border-radius: 2px; padding: .3em; margin-right: 100px;"> Ora: <input name="hh" class="set_tamp" type="number" min="0" max="23" placeholder="23">:<input name="mm" class="set_tamp" type="number" min="0" max="59" placeholder="00"></h4>
    <div style="clear:both;"></div>
    <button type="submit" name="submit" class="agg_btn" style="background-color: green; margin-left: 250px;" formaction="conferma_prenotazione">PRENOTA TEST</button>

</form>