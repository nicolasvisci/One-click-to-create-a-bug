<form class="tamp-form">
    <h1 class="profile"> TAMPONI </h1>
    <div class="tamp-form">
        <select class="set_tamp">
            <option value=""> Seleziona il test da aggiungere </option>
            <option value="test antigenico rapido"> Test antigenico rapido </option>
            <option value="test molecolare"> Test molecolare </option>
            <option value="test sierologico"> Test sierologico </option>
        </select>
        <div class = "input-form">
            <a style="color:white"> Orario di inizio: </a> <input class="set_tamp" type="number" min="0" max="23" placeholder="23"><a style="color:white">:</a><input class="set_tamp" type="number" min="0" max="59" placeholder="00">
        </div>
        <div class = "input-form">
            <a style="color:white"> Orario di fine<a style=" color:white; margin-left:11px">:</a></a> <input class="set_tamp" type="number" min="0" max="23" placeholder="23"><a style="color:white">:</a><input class="set_tamp" type="number" min="0" max="59" placeholder="00">
        </div>
        <div class = "input-form">
            <a style="color:white "> Costo<a style="color:white; margin-left:67px">: </a></a> <input class="set_tamp" type="number" min="0" max="999" ><a style="color:white"> , </a><input class="set_tamp" type="number" min="00" max="99" placeholder="00"><a style="color:white"> €</a>
        </div>
    </div>
    <button class="agg_tamp"> AGGIUNGI TAMPONE </button>

</form>

<form class="dettagli-form">
    <?php 
        $db = \Config\Database::connect();

        $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email'] . "' ;")->getResultArray();
        $tuples = count($sql);

        for ($i = 0; $i < $tuples; $i++) {
            ?>
            <p class="output-form"><?php echo $sql[$i]['tipologia']; ?></p>
            <p class="output-form"><?php echo $sql[$i]['orario_inizio']; ?></p>
            <p class="output-form"><?php echo $sql[$i]['orario_fine']; ?></p>
            <p class="output-form"><?php echo $sql[$i]['costo']; ?></p>
            <?php
        } ?>
</form>