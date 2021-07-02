<html>
 <head>
  <style>
      
body {
background-color: powderblue;
}

h1  {
color: blue;
}

.tamp-form {
    position: relative;
    background-color: #222;
    border-radius: 10px;
    width: 1400px;
    height: 350px;
    margin-left: 65px;
    top: 70px;
}

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
  padding: 10px 5px;
  cursor: pointer;
  font-size: 20px;
}

.set_tamp {
margin-left: 0px;
position:relative;
display:inline-block;
width: 170px;
}

.set_numb {
margin-left: 0px;
position:relative;
display:inline-block;
width: 60px;
}

.set_file {
margin-left: 60px;
position:relative;
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
font-size: 40px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
border: 0px;
font-weight: 500;
display: inline-block;
}


#element1 {
  display:inline-block;
  margin-left: 150px;
  margin-right:100px;
}

#element2 {
  display:inline-block;
  margin-right:100px;
}

#element3 {
  display:inline-block;
  margin-right:60px;
}


  </style>
 </head>
 <body>
 <form class="tamp-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
 <center>
 <label for="standard-select"><span>Quando si desidera prenotare il test:</span></label>
 </center>
  <div id="element1">
  <br>
  <label for="standard-select" style=" font-size:30px"><span>Data test:</span></label>
  <input type="date" class='set_tamp' name="data_test">
  </div>
  <div id="element2">
  <label for="standard-select" style=" font-size:30px"><span>Orario test:</span></label> 
  <input name="hh_test" class="set_numb" type="number" min="0" max="23" placeholder="00"><a style="color:white">:</a><input name="mm_test" class="set_numb" type="number" min="0" max="59" placeholder="00">
  </div>
  <div id="element3">
  <label for="standard-select" style=" font-size:30px"><span>Tipo test:</span></label> 
    <select type="text" name="tipologiaTest">
      <option disabled selected>Seleziona tipologia</option>
      <option> Test antigenico rapido </option>
      <option> Test molecolare</option>
      <option> Test sierologico</option> 
    </select>
  </div>
  <br>
  <br>
  <br>
  <center>
  <label for="standard-select" style=" font-size:30px"><span>Numero persone:</span></label>
  <input type="number" min="1" max="20" class="set_numb" name="number_test">
  </center>
  <br>
  <br>
  <center><button type="submit" class="btn" formaction="prenotaTestMultiplo"><a class="regLog_text">PRENOTA TEST</a></button></center>
  
  </form>
</body>
</html>
