<form class="tamp-form" method="post">
    <h1 class="profile"> TEST </h1>
    <div class="tamp-form">
        <select name="tipo" class="set_tamp">
            <option value=""> Seleziona il test da aggiungere </option>
            <option value="test antigenico rapido"> Test antigenico rapido </option>
            <option value="test molecolare"> Test molecolare </option>
            <option value="test sierologico"> Test sierologico </option>
        </select>
        <div class = "input-form">
            <a style="color:white"> Orario di inizio: </a> <input name="hh_inizio" class="set_tamp" type="number" min="0" max="23" placeholder="23"><a style="color:white">:</a><input name="mm_inizio" class="set_tamp" type="number" min="0" max="59" placeholder="00">
        </div>
        <div class = "input-form">
            <a style="color:white"> Orario di fine<a style=" color:white; margin-left:11px">:</a></a> <input name="hh_fine" class="set_tamp" type="number" min="0" max="23" placeholder="23"><a style="color:white">:</a><input name="mm_fine" class="set_tamp" type="number" min="0" max="59" placeholder="00">
        </div>
        <div class = "input-form">
            <a style="color:white "> Costo<a style="color:white; margin-left:67px">: </a></a> <input name="unita" class="set_tamp" type="number" min="0" max="999" ><a style="color:white"> , </a><input name="centesimi" class="set_tamp" type="number" min="00" max="99" placeholder="00"><a style="color:white"> €</a>
        </div>
    </div>
    <button class="agg_tamp" formaction="aggiungi_test"> AGGIUNGI TEST </button>

</form>

<div class="dettagli-form">
    <?php 
        $db = \Config\Database::connect();

        $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email'] . "' ;")->getResultArray();
        $tuples = count($sql);

        ?>
        <h1 class="titolo" > TIPO DI TEST </h1>
        <h1 class="titolo" style="margin-left: 78px;"> ORARIO </h1>
        <h1 class="titolo" style="margin-left: 150px;"> COSTO </h1>
        <?php

        for ($i = 0; $i < $tuples; $i++) {
            ?>
            <div class="row"><div> <?php echo $sql[$i]['tipologia']?> </div> <div style="margin-left: 105px;"> <?php  echo $sql[$i]['orario_inizio'] . "-" . $sql[$i]['orario_fine'] ?> </div> <div style="margin-left: 105px;"> <?php echo $sql[$i]['costo']  . "€" ;?> </div> </div>
            
        <?php } ?>
</div>