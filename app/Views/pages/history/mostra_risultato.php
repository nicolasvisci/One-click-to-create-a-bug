<?php session() ?>

<div class="history-form">
<h3 class="attributo" style="margin-left: 10px;"> Test effettuato il giorno <?php echo $_SESSION['date']?> alle ore <?php echo substr($_SESSION['orario'], 0, 5) ?></h3>
<h3 class="attributo" style="margin-left: 10px;"> tipo di test: <?php echo $_SESSION['tipologia_test'] ?></h3>
<hr>
<h3 class="attributo" style="margin-left: 100px;"> Risultato: 
<?php if($_SESSION['numero_prenotati'] == 1) {

          if ($_SESSION['numero_positivi'] == 1) {
               echo "Positivo";

          } else { 
               echo "Negativo";

            } 

      } else {
          echo "<br>" . $_SESSION['numero_positivi'] . " Positivo/i " . "<br>" . $_SESSION['numero_prenotati'] - $_SESSION['numero_positivi'] . " Negativo/i";
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