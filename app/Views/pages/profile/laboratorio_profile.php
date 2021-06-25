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
font-size: 60px; 
font-weight: bold; 
letter-spacing: -1px;
line-height: 1;
text-align: center;
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
            <form class="profile-form">
                <h1><span class="Title"> Profilo </span></h1>
                <p> <?php echo $_SESSION['nome_lab']?>
                <p> <?php echo $_SESSION['email']?> </p>
                <p> <?php echo $_SESSION['numero_telefono']?> </p>
            </form>

            <form class="modify-form" method="post">
                <h1><span class="Title"> Modifica Profilo </span></h1>
                <input type="text" class='agg_input' name="nome_LAB" placeholder="Nome Laboratorio">
                <input type="text" class='agg_input' name="email" placeholder="Email">
                <input type="number" class='agg_input' name="numero_telefono" placeholder="Numero di telefono">
                <button type="submit" name="submit" class="del_btn" formaction="delete">ELIMINA PROFILO</button>
                <button type="submit" name="submit" class="agg_btn" formaction="update">AGGIORNA PROFILO</button>
            </form>
        </main>