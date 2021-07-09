

<style>

h1 {
    color: #fff;
    text-align: center;
    position: relative;
    bottom: 50px;
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

</style>

        <main>
            <form class="compile-form" action='/signup_medico' method='post'>
            <h1><span> REGISTRAZIONE MEDICO DI BASE </span></h1>
                <input type required="text" name="nome" placeholder="Nome">
                <input type required="text" name="cognome" placeholder="Cognome">
                <input type="date" name="data_nascita">
                <input type required="text" name="cod_fiscale" placeholder="Codice Fiscale">
                <input type required="text" name="azienda_sanitaria" placeholder="Azienda Sanitaria">
                <input type required="number" name="p_iva" placeholder="Partita Iva">
                <input type required="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="passwordconf" placeholder="Conferma Password">
                <button type="submit" name="submit" class="regLog_btn"><a class="regLog_text">Registrati</a></button>
            </form>
        </main>
    </body>
</html>