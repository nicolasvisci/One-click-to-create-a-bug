<style>
span {
  transition: background-size .5s, background-position .3s ease-in .5s;
}
span:hover {
  transition: background-position .5s, background-size .3s ease-in .5s;
}
span {
  background-image: linear-gradient(#222, #222);
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

/* Darker background on mouse-over */
.btn:hover {
  background-color: #222;
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
</style>


<h1><span class="w3-margin w3-jumbo Title">INSERISCI I TIPI DI TAMPONE DISPONIBILI</span></h1>
<body>
<form action="" method="post">
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
    <button type="submit" name="submit" class="btn" formaction="inserisciTamponi"><a class="regLog_text">Invia</a></button>
</form>
</body>