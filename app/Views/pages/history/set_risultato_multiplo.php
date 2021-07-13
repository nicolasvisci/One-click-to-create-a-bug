<?php session() ?>

<div class="history-form">
<h3 class="attributo" style="margin-left: 10px;"> Test effettuato il giorno <?php echo $_SESSION['date']?> alle ore <?php echo substr($_SESSION['orario'], 0, 5) ?></h3>
<h3 class="attributo" style="margin-left: 10px;"> tipo di test: <?php echo $_SESSION['tipologia_test'] ?></h3>
<hr>
<h3 class="attributo" style="margin-left: 100px;"> Numero Positivi: 
<?php if($_SESSION['numero_positivi'] === NULL) {
          
          echo "<input name='numero_positivi' id='numero_positivi' style='padding: .3em; border-radius: 2px; margin-top: 20px;' type='number' min='2' max='20' >";
          echo "<button type='submit' name='positivo' class='set_pos' style='margin-left:150px;' id='". $_SESSION['numero_prenotati'] . "' onclick='set_pos(this.id)'>CONFERMA</button>";

      } else {
        
          echo "<p style='width: 10%; color: black'>" . $_SESSION['numero_positivi'] . "</p>";

      } ?> </h3>

    <br>  
    <br>
    <button type='submit' class='material-icons' onclick='torna_indietro()'><a class='icons' style='font-size: 50px;'>arrow_back</a></button>";
</div>

<script>

    function set_pos(numero_prenotati){
        var form = new FormData();
        form.append('numero_positivi', $('#numero_positivi').val());
        var numero_positivi = form.get('numero_positivi');

        $.ajax({
            url: "/set_pos",
            type: "POST",
            data: {num: numero_positivi},
            dataType: "json",
            success: function(){
                    
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