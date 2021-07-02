<?php 
    $db = \Config\Database::connect();
    $id = $_SESSION['id'];
    
    $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email_lab'] . "' ORDER BY tipologia;")->getResultArray();
    $tipologia = $sql[$id]['tipologia'];
    $orario_inizio = $sql[$id]['orario_inizio'];
    $orario_fine = $sql[$id]['orario_fine'];
    $costo = $sql[$id]['costo'];
?>

<form class="book-form">

    <h1 class="white-text"> <?php echo $tipologia?></h1>

    <div style="clear:both;"></div>
    <button type="submit" name="submit" class="agg_btn" style="background-color: green; margin-left: 250px;" formaction="conferma">PRENOTA TEST</button>

</form>