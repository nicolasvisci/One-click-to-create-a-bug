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

h1 { color: white; font-family: 'Helvetica Neue', sans-serif; 
font-size: 60px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
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
</style>


<main>
    <a class="Title" >
<br>
<br>
<br>
<br>
<h1> <span class="Title">Dott./Dott.ssa<output color="white"> <?php echo $_SESSION['cognome']?></output></span></h1>
<h2> <span class="Title"> Medico</span></h2>
</a>
</main>