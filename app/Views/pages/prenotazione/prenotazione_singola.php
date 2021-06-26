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

    unset($_SESSION["email_lab"]);
?>

<form class="book-form">
    <h1 style="color:white; font-weight:bold"> <?php echo $nome_lab?></h1>

</form>


