
        <main>
            <form class="compile-form" action='/signup_medico' method='post'>
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