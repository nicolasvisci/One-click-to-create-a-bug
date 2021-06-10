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
                <p> <?php echo $_SESSION['nome']?> </p>
                <p> <?php echo $_SESSION['cognome']?> </p>
                <p> <?php echo $_SESSION['data_nascita']?> </p>
                <p> <?php echo $_SESSION['codice_fiscale']?> </p>
                <p> <?php echo $_SESSION['email']?> </p>
            </form>

            <form class="modify-form" action="update" method="post">
                <h1><span class="Title"> Modifica Profilo </span></h1>
                <input type="text" class='agg_input' name="nome" placeholder="Nome">
                <input type="text" class='agg_input' name="cognome" placeholder="Cognome">
                <input type="date" class='agg_input' name="data_nascita">
                <input type="text" class='agg_input' name="cod_fiscale" placeholder="Codice Fiscale">
                <input type="text" class='agg_input' name="email" placeholder="Email">
                <button type="submit" name="submit" class="del_btn" formaction="delete">ELIMINA PROFILO</button>
                <button type="submit" name="submit" class="agg_btn" formaction="update">AGGIORNA PROFILO</button>
            </form>
        </main>