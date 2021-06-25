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
  width: 15%;
  margin-left: 650px;
  margin-top: 100px;
}

h1 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 60px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
text-align: center;
border: 0px; 
}

label {
color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 30px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
border: 0px;
font-weight: 500;
margin-left: 110px;
}

.select + label {
  margin-top: 2rem;
}

.set_tamp {

  margin-left: 0px;
  position:relative;
  display:inline-block;

}

#element1 {
  display:inline-block;
  margin-right:70px;
}

#element2 {
  display:inline-block;
  margin-right:150px;
}

#element3 {
  display:inline-block;
  margin-right:60px;
}

#element4 {
  position: relative;
  left: 60px;
  display:inline-block;
  margin-right:140px;
}

#element5 {
  display:inline-block;
  position: relative;
  margin-right:150px;
}

#element6 {
  display:inline-block;
  position: relative;
  right:30px;
}

#element7 {
  position: relative;
  left: 60px;
  display:inline-block;
  margin-right:265px;
}

#element8 {
  display:inline-block;
  margin-right:250px;
}

#element9 {
  display:inline-block;
  position: relative;
  right:10px;
}

.btn {
  position: relative;
  bottom: 50px;
}

.tamp-form {
    position: relative;
    bottom: 50px;
    background-color: #222;
    border-radius: 10px;
    width: 1500px;
    margin-left: 10px;
}

.tamp-form2 {
    position: relative;
    bottom: 30px;
    background-color: #222;
    border-radius: 10px;
    width: 1500px;
    margin-left: 10px;
}




</style>


<h1><span class="w3-margin w3-jumbo Title">INSERISCI I TIPI DI TAMPONE DISPONIBILI</span></h1>
<body>
<form class="tamp-form" action="" method="post">
<label for="standard-select"><span>Test molecolare</span></label>
    <select name="Test1">
        <option value="Disponibile">Disponibile</option>
        <option value="NonDisponibile">Non disponibile</option>
    </select>
<label for="standard-select"><span>Test antigenico rapido</span></label>
    <select name="Test2">
        <option value="Disponibile">Disponibile</option>
        <option value="NonDisponibile">Non disponibile</option>
    </select>
<label for="standard-select"><span>Test sierologico</span></label>
    <select name="Test3">
        <option value="Disponibile">Disponibile</option>
        <option value="NonDisponibile">Non disponibile</option>
    </select>
    <br>
    <br>
<div id="element1">
<label for="standard-select"><span>Costo</span></label>
</div>
<input class="set_tamp" type="number" name="Costo1" min="0" max="999"> , 
<input class="set_tamp" type="number" name="Costo1a" min="0" max="999" > €
<div id="element2">
<label for="standard-select"><span>Costo</span></label>
</div>
<input class="set_tamp" type="number" name="Costo2" min="0" max="999" > ,
<input class="set_tamp" type="number" name="Costo2a" min="0" max="999" > €
<div id="element3">
<label for="standard-select"><span>Costo</span></label>
</div>
<input class="set_tamp" type="number" name="Costo3" min="0" max="999" > ,
<input class="set_tamp" type="number" name="Costo3a" min="0" max="999" > €
<button type="submit" name="submit" class="btn" formaction="inserisciTamponi"><a class="regLog_text">Invia</a></button>
</form>
<form class="tamp-form2">
    <?php 
        $db = \Config\Database::connect();
        $session = session();

        $sql = $db->query("SELECT tamp_1, tamp_2, tamp_3, costo_1, costo_2, costo_3 FROM tamponi,laboratori WHERE tamponi.email=laboratori.email AND laboratori.email = '" . $_SESSION['email'] . "' ;")->getResultArray();
        $tuples = count($sql);

        for ($i = 0; $i < $tuples; $i++) {
            if($sql[$i]['tamp_1']=='0'){
                ?>
                <div id="element4">
                <p class="output-form">Disponibilità attuale: <?php echo 'Non disponibile'; ?></p>
                </div>
                <?php
            }else{
                ?>
                <div id="element4">
                <p class="output-form">Disponibilità attuale : <?php echo 'Disponibile'; ?></p>
                </div>
                <?php
            }
                ?>
                <?php
           if($sql[$i]['tamp_2']=='0'){
                ?>
                <div id="element5">
                <p class="output-form">Disponibilità attuale : <?php echo 'Non disponibile'; ?></p>
                </div>
                <?php
            }else{
                  ?>
                  <div id="element5">
                  <p class="output-form">Disponibilità attuale: <?php echo 'Disponibile'; ?></p>
                  </div>
                  <?php
            }
                  ?>
                  <?php
            if($sql[$i]['tamp_3']=='0'){
                  ?>
                  <div id="element6">
                  <p class="output-form">Disponibilità attuale: <?php echo 'Non disponibile'; ?></p>
                  </div>
                  <?php
            }else{
                  ?>
                  <div id="element6">
                  <p class="output-form">Disponibilità attuale : <?php echo 'Disponibile'; ?></p>
                  </div>
                  <?php
            }
                  ?>
            <div id="element7">
            <p class="output-form">Costo attuale : <?php echo $sql[$i]['costo_1']; ?> €</p>
            </div>
            <div id="element8">
            <p class="output-form">Costo attuale : <?php echo $sql[$i]['costo_2']; ?> €</p>
            </div>
            <div id="element9">
            <p class="output-form">Costo attuale : <?php echo $sql[$i]['costo_3']; ?> €</p>
            </div>
            <?php
        } ?>
</form>

</body>