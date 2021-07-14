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
font-size: 10px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 0;
text-align: center;
border: 0px; 
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

h1 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 40px; 
font-weight: bold; 
letter-spacing: -1px;
border: 0px;
}

h2 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 35px; 
font-weight: bold; 
letter-spacing: -1px;
border: 0px;
position:relative;
text-align: center;
}

h3.attributo {
    color: white;
    font-weight: bold;
    display:inline;
    position: relative;
    margin-left: 20px;
}

.white-text {
    color: white;
    font-weight: bold;
    
}

.orange-text {
    color: orange;
    font-weight: bold;
    display: inline;
    
}

.set_pos {
    background-color: red;
    position: relative;
    padding: 9px 0px;
    width: 20%;
    height: 50px;
    text-align: center;
    border-radius: 3px;
    font-weight: bold;
    cursor: pointer;
    color: #fff
}
    
</style>

<?php session() ?>

<div class="history-form">
<h3 class="attributo" style="margin-left: 10px;"> Test effettuato il giorno: </h3><h3 class='orange-text' ><?php echo $_SESSION['date']?><br>
<h3 class="attributo" style="margin-left: 10px;"> Orario: </h3><h3 class='orange-text' ><?php echo substr($_SESSION['orario'], 0, 5) ?></h3><br>
<h3 class="attributo" style="margin-left: 10px;"> Tipo di test: </h3><h3 class='orange-text' ><?php echo $_SESSION['tipologia_test'] ?></h3>
<hr>
<br>
<h1 class="white-text"><span>RISULTATO:</span></h1> 
<?php if($_SESSION['numero_positivi'] === NULL) {
          echo "<center><button type='submit' name='positivo' class='set_pos' id='1' onclick='set_pos(this.id)'>POSITIVO</button>
                <button type='submit' name='negativo' class='set_pos' style='background-color: green; margin-left: 20px;' id='2' onclick='set_pos(this.id)'>NEGATIVO</button></center>";

      } else {
          
          if ($_SESSION['numero_positivi'] == 1) {
               echo "<h2 style='color: red;'>POSITIVO</h2>";

          } else { 
               echo "<h2 style='color: green;'>NEGATIVO</h2>";
            } 
        } ?></h3>

    <br>
    <br>
    <button type='submit' class='material-icons' onclick='torna_indietro()'><a class='icons' style='font-size: 50px;'>arrow_back</a></button>
</div>

<script>

    function set_pos(id){

        $.ajax({
            url: "/set_pos",
            type: "POST",
            data: {id},
            dataType: "json",
            success: function(res){
                console.log(res);
                window.location.href = "/set_risultato_lab";
            }
        })
    }

    function torna_indietro(){
        var tipo = 2;

        $.ajax({
            url: "/torna_indietro",
            type: "POST",
            data: {tipo},
            dataType: "json",
            success: function(){
                window.location.href = "/history_lab";
            }
        })
    }
</script>