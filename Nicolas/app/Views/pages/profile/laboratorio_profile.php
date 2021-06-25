        <main>
            <form class="profile-form">
                <h1 class="profile"> Profilo </h1>
                <p> <?php echo $_SESSION['nome_lab']?> </p>
                <p> <?php echo $_SESSION['email']?> </p>
                <p> <?php echo $_SESSION['numero_telefono']?> </p>
            </form>

            <form class="modify-form" method="post">
                <h1 class="profile"> Modifica Profilo </h1>
                <input type="text" class='agg_input' name="nome_LAB" placeholder="Nome Laboratorio">
                <input type="text" class='agg_input' name="email" placeholder="Email">
                <input type="number" class='agg_input' name="numero_telefono" placeholder="Numero di telefono">
                <button type="submit" name="submit" class="del_btn" formaction="delete">ELIMINA PROFILO</button>
                <button type="submit" name="submit" class="agg_btn" formaction="update">AGGIORNA PROFILO</button>
            </form>
        </main>