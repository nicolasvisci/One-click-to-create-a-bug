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

h2 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 40px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
border: 0px; 
}

a {
  font-size: 25px;
}

.set_tamp {

  position:relative;
  display:inline-block;

}

#element1 {
  display:inline-block;
  margin-right:100px;
  margin-left:120px;
}

#element2 {
  display:inline-block;
  margin-right:100px;
}

#element3 {
  
  margin-right:60px;
}

#element4 {
  position: relative;
  top: 35px;
}

#element5 {
  position: relative;
  bottom: 35px;
}


.btn {
  position: relative;
  bottom: 50px;
}

.tamp-form {
    position: relative;
    top: 20px;
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

<body>
<form class="tamp-form" method="post">
<h1><span class="w3-margin w3-jumbo Title">INSERISCI I TIPI DI TAMPONE DISPONIBILI</span></h1>
    <div id="element1" class="input-form">
    <a style="color:white">Test: </a><select name="tipo" class="set_tamp">
            <option value=""> Seleziona il test da aggiungere </option>
            <option value="test antigenico rapido"> Test antigenico rapido </option>
            <option value="test molecolare"> Test molecolare </option>
            <option value="test sierologico"> Test sierologico </option>
        </select>
        </div>
        <div id="element2" class = "input-form">
            <a style="color:white"> Orario di inizio: </a> <input name="hh_inizio" class="set_tamp" type="number" min="0" max="23" placeholder="23"><a style="color:white">:</a><input name="mm_inizio" class="set_tamp" type="number" min="0" max="59" placeholder="00">
        </div>
        <div id="element2" class = "input-form">
            <a style="color:white"> Orario di fine: </a> <input name="hh_fine" class="set_tamp" type="number" min="0" max="23" placeholder="23"><a style="color:white">:</a><input name="mm_fine" class="set_tamp" type="number" min="0" max="59" placeholder="00">
        </div>
        <br>
        <br>
        <center>
        <div id="element3" class = "input-form">
            <a style="color:white "> Costo: </a> <input name="unita" class="set_tamp" type="number" min="0" max="999" ><a style="color:white"> , </a><input name="centesimi" class="set_tamp" type="number" min="00" max="99" placeholder="00"><a style="color:white"> €</a>
        </div>
        </center>
    </div>
    <button class="btn" formaction="aggiungi_test"> AGGIUNGI TEST </button>

</form>

<br>

<div class="tamp-form2">
    <?php 
        $db = \Config\Database::connect();

        $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email'] . "' ;")->getResultArray();
        $tuples = count($sql);

        ?>
        <h2 class="titolo" style="display:inline-block; margin-right:280px; margin-left:160px" ><span> TIPO DI TEST </span></h2>
        <h2 class="titolo" style="display:inline-block; margin-right:300px"><span> ORARIO </span></h2>
        <h2 class="titolo" style="display:inline-block; "><span> COSTO </span></h2>
        <?php

        for ($i = 0; $i < $tuples; $i++) {
            ?>
            <div class="row">
            <div id="element4" style="text-align:left; margin-left:150px" ><a style="color:white"> <?php echo $sql[$i]['tipologia']?> </a></div> 
            <div style="text-align:center"><a style="color:white"> <?php  echo $sql[$i]['orario_inizio'] . "-" . $sql[$i]['orario_fine'] ?> </a></div> 
            <div id="element5" style="text-align:right; margin-right:250px"><a style="color:white"> <?php echo $sql[$i]['costo']  . "€" ;?> </a></div> 
            </div>
            
        <?php } ?>
</div>