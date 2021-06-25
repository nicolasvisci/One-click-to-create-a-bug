<!DOCTYPE html>
<html lang="en">
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

h2 { color: white;
font-family: 'Helvetica Neue', sans-serif; 
font-size: 40px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
text-align: center; 
}

p {
    background-color: #2990c8;
    margin: 20px 45px;
    border: 0px;
    border-radius: 0px;
    padding: .5em;
    font-size: 16px;
    text-align: center;
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

</style>

<title>Guida Tamponi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-download {font-size:50px}
</style>
<body>

<!-- Header -->
<header class="w3-container w3-dark w3-center" style="padding:0px 16px">
  <h1><span class="w3-margin w3-jumbo Title">SCARICA IL QUESTIONARIO D'ANAMNESI</span></h1>
</header>

<button class="btn" onclick="window.open('//www.aslal.it/allegati/SCHEDA%20ANAMNESTICA.pdf','_blank')" ><i class="fa fa-download"></i> DOWNLOAD</button>
</body>
</html>