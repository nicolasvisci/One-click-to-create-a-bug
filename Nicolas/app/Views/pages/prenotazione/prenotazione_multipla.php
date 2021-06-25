<html>
 <head>
  <style>
   body {background-color: powderblue;}
   h1   {color: blue;}
   p    {color: red;}
  </style>
 </head>
 <body>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div><p> Quando si desidera prenotare il test:</p></div>
  <div>
  <center>
  <a style="color:white">Data del test</a>
  <input type="date" class='agg_input' name="data_test">
  <a style="color:white"> Orario del test: </a> <input name="hh_test" class="set_tamp" type="number" min="0" max="23" placeholder="23"><a style="color:white">:</a><input name="mm_test" class="set_tamp" type="number" min="0" max="59" placeholder="00">
  </center>
  </div>
<div><p> Scegliere il tipo di test:</p></div>
  <div>
  <p>
    <select type="text" name="tipologiaTest">
      <option disabled selected>Tipologia Test:</option>
      <option> Test antigenico rapido </option>
      <option> Test molecolare</option>
      <option> Test sierologico</option> 
    </select>
    </p>
  </div>


  <center><button type="submit" name="tasto_invia" class="agg_btn" formaction="prenota">PRENOTA TEST</button></center>
  
  </form>
</body>
</html>