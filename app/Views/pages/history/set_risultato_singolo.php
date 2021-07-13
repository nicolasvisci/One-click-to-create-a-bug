<?php session() ?>

<div class="history-form">
<h3 class="attributo" style="margin-left: 10px;"> Test effettuato il giorno <?php echo $_SESSION['date']?> alle ore <?php echo substr($_SESSION['orario'], 0, 5) ?></h3>
<h3 class="attributo" style="margin-left: 10px;"> tipo di test: <?php echo $_SESSION['tipologia_test'] ?></h3>
<hr>
<h3 class="attributo" style="margin-left: 100px;"> Risultato: 
<?php if($_SESSION['numero_positivi'] === NULL) {
          echo "<button type='submit' name='positivo' class='set_pos' id='1' onclick='set_pos(this.id)'>POSITIVO</button>
                <button type='submit' name='negativo' class='set_pos' style='background-color: red;' id='2' onclick='set_pos(this.id)'>NEGATIVO</button>";

      } else {
          
          if ($_SESSION['numero_positivi'] == 1) {
               echo "Positivo";

          } else { 
               echo "Negativo";

            } 
        } ?></h3>

    <br>
    <br>
    <button type='submit' class='material-icons' onclick='torna_indietro()'><a class='icons' style='font-size: 50px;'>arrow_back</a></button>";
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