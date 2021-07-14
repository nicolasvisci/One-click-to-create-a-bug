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

h1 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 50px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 0;
text-align: center;
border: 0px; 
}

h2 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 35px; 
font-weight: bold; 
letter-spacing: -1px;
border: 0px;
position:relative;
display: inline;
}

.history-form {
    background-color: #222;
    padding: 40px 20px;
    margin: 100px;
    margin-left: 190px; 
    width: 1160px;
    border-radius: 10px;
    position: relative;
}

.white-text {
    color: white;
    font-weight: bold;
    white-space: nowrap;
    
}

.orange-text {
    color: orange;
    font-weight: bold;
    display: inline;
    
}

h3.attributo {
    color: white;
    font-weight: bold;
    display:inline;
    position: relative;
    margin-left: 20px;
}

</style>

<?php session() ?>

<div class="history-form">
<h3 class="attributo" style="margin-left: 10px;"> Test effettuato il giorno: </h3><h3 class='orange-text' ><?php echo $_SESSION['date']?><br>
<h3 class="attributo" style="margin-left: 10px;"> Orario </h3><h3 class='orange-text' ><?php echo substr($_SESSION['orario'], 0, 5) ?></h3><br>
<h3 class="attributo" style="margin-left: 10px;"> Tipo di test: </h3><h3 class='orange-text' ><?php echo $_SESSION['tipologia_test'] ?></h3><br>
<hr>
<br>
<h1 class="white-text"><span>RISULTATO:</span></h1> 
<?php if($_SESSION['numero_prenotati'] == 1) {

          if ($_SESSION['numero_positivi'] == 1) {
               echo "<center><h2 style='color: red;'>POSITIVO</h2></center>";

          } else { 
               echo "<center><h2 style='color: green;'>NEGATIVO</h2></center>";

            } 

      } else {
          echo "<br><center><h2 style='color: white;'>" . $_SESSION['numero_positivi'] . "</h2><h2 style='color: red;'> Positivo/i " . "<br><h2 style='color: white;'>" . $_SESSION['numero_prenotati'] - $_SESSION['numero_positivi'] . " </h2><h2 style='color: green;'>Negativo/i</h2></center>";
      }
           ?></h3>
    <br>
    <br>
    <button type='submit' class='material-icons' onclick='torna_indietro()'><a class='icons' style='font-size: 50px;'>arrow_back</a></button>";
</div>

<script>

    function torna_indietro() {
        var tipo = 3;

        $.ajax({
            url: "/torna_indietro",
            type: "POST",
            data: {tipo},
            dataType: "json",
            success: function(){
                window.location.href = "/history";
            }
        })
    }
</script>