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

h3 {
  color: orange;
}
</style>


<main>
    <a class="Title" >
<br>
<br>
<br>
<br>
<h1> <span class="Title"><output color="white"> <?php echo $_SESSION['nome_lab']?></output></span></h1>
<h2> <span class="Title"> Laboratorio di Analisi</span></h2>
<br>
<?php 
            session();
            $db = \Config\Database::connect();

            $sql = $db->query("SELECT COUNT(*) as numero FROM notifiche WHERE email_lab = '" . $_SESSION['email'] . "' AND tipo = 'LAB';")->getResultArray();
            $numero = $sql[0]['numero'];

            if ($numero) {
                echo "<h3 style='text-align: center; font-weight: bold'><span> Hai " . $sql[0]['numero'] . " notifica/che</h3></span>";
            }
        ?>
</a>
</main>