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

.btn {
  background-color: orange;
  border: none;
  border-radius: 5px;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
  width: 35%;
  margin-bottom: 10px;
}

.book-form {
    background-color: #222;
    padding: 30px 20px;
    margin: 100px;
    margin-left: 370px; 
    width: 800px;
    border-radius: 10px;
    position: relative;
}

.white-text {
    color: white;
    font-weight: bold;

}

</style>

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

<form class="book-form" method='post' enctype="multipart/form-data">
    <center>
    <h1 class="white-text"><span> <?php echo strtoupper($tipologia)?></span></h1>
    <h4 class="white-text">Orario disponibile: <?php echo $orario_inizio . "-" . $orario_fine ?></h4>
    <h4 class="white-text">Costo: <?php echo $costo . "€"?></h4>
    <br><hr>
    <h4 class="white-text">Data: <input type="date" name="data_prenotazione" >
    <br> Ora: <input name="hh" class="set_tamp" type="number" min="0" max="23" placeholder="23">:<input name="mm" class="set_tamp" type="number" min="0" max="59" placeholder="00"></h4>
    <h4 class="white-text" style="margin-top:40px;">Carica Questionario Anamnesi (facoltativo):<input type="file" name="questionario" style="margin-left:40px"></h4>
    <div style="clear:both;"></div>
    <button type="submit" name="submit" class="btn" formaction="conferma_prenotazione">PRENOTA TEST</button>
    </center>

</form>
