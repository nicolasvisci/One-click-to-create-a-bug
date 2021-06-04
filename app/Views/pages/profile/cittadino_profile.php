        <main>
            <form class="profile-form">
                <h1> Profilo </h1>
                <p> <?php echo $_SESSION['nome']?> </p>
                <p> <?php echo $_SESSION['cognome']?> </p>
                <p> <?php echo $_SESSION['data_nascita']?> </p>
                <p> <?php echo $_SESSION['codice_fiscale']?> </p>
                <p> <?php echo $_SESSION['email']?> </p>
            </form>

            <form class="modify-form" action="update" method="post">
                <h1> Modifica Profilo </h1>
                <input type="text" class='agg_input' name="nome" placeholder="Nome">
                <input type="text" class='agg_input' name="cognome" placeholder="Cognome">
                <input type="date" class='agg_input' name="data_nascita">
                <input type="text" class='agg_input' name="cod_fiscale" placeholder="Codice Fiscale">
                <input type="text" class='agg_input' name="email" placeholder="Email">
                <button type="submit" name="submit" class="del_btn" formaction="delete">ELIMINA PROFILO</button>
                <button type="submit" name="submit" class="agg_btn" formaction="update">AGGIORNA PROFILO</button>
            </form>
        </main>