<?php echo validation_errors(); ?>

<?php echo form_open('login/create'); ?>
<p>

  <label for="nome">Nome</label>
  <input type="text" name="nome" /><br />
</p>
<p>

  <label for="cognome">Cognome</label>
  <input type="text" name="cognome" /><br />
</p>
<p>

  <label for="dataDiNascita">Data di nascita</label>
  <input type="text" name="dataDiNascita" /><br />
</p>
<p>

  <label for="luogoDiNascita">Luogo di nascita</label>
  <input type="text" name="luogoDiNascita" /><br />
</p>
<p>

  <label for="codiceFiscale">Codice Fiscale</label>
  <input type="text" name="codiceFiscale" /><br />
</p>
<p>

  <label for="luogoDiResidenza">Luogo di residenza</label>
  <input type="text" name="luogoDiResidenza" /><br />

</p>
<p>

  <label for="indirizzo">Indirizzo</label>
  <input type="text" name="indirizzo" /><br />

</p>
<p>

  <label for="cap">CAP</label>
  <input type="text" name="cap" /><br />

</p>
<p>

  <label for="telefono">Telefono</label>
  <input type="tel" name="telefono" /><br />
</p>
<p>

  <label for="email">Email</label>
  <input type="text" name="email" /><br />
</p>

<p>

  <label for="password">Password</label>
  <input type="password" name="password" /><br />
</p>
<p>

  <label for="confPassword">Conferma password</label>
  <input type="password" name="confPassword" /><br />
</p>

<p>
<input type="submit" name="submit" value="Create" />
</p>
