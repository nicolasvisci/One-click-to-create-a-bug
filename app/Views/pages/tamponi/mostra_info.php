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
border: 0px;
}

.history-form {
    background-color: #222;
    padding: 40px 20px;
    margin: 100px;
    margin-left: 190px; 
    width: 1160px;
    border-radius: 10px;
    position: relative;
}

.white-text {
    color: white;
    font-weight: bold;
    white-space: nowrap;
    
}

.orange-text {
    color: orange;
    font-weight: bold;
    white-space: nowrap;
    display: inline;
    
}

h2.attributo {
    color: white;
    font-weight: bold;
}

h3.attributo {
    color: white;
    font-weight: bold;
    display:inline;
    position: relative;
    margin-left: 20px;
}

</style>

<div class="history-form" >
<h1 class="white-text" style="text-align: center"><span>INFO</span></h1>
<hr> 
  <?php 
    $session = session();
    $db = \Config\Database::connect();
    
    switch($session->get('tipo_prenotato')) {

        case "CI":
            $sql = $db->query("SELECT * FROM cittadini WHERE email = '" . $_SESSION['email_utente'] . "';")->getResultArray()[0];
            $nome = $sql['nome'];
            $cognome = $sql['cognome'];
            $data_nascita = $sql['data_nascita'];
            $codice_fiscale = $sql['codice_fiscale'];
            $email = $sql['email'];
            $numero_prenotati = $_SESSION['numero_prenotati'];

            echo "<center><h2 class='attributo'><span>CITTADINO</span></h2></center>
                  <h3 class='attributo'>Nome: </h3><h3 class='orange-text' >" . $nome . "</h3><br>
                  <h3 class='attributo'>Cognome: </h3><h3 class='orange-text'>" . $cognome . "</h3><br>
                  <h3 class='attributo'>Data di Nascita: </h3><h3 class='orange-text'>" . $data_nascita . "</h3><br>
                  <h3 class='attributo'>Codice Fiscale: </h3><h3 class='orange-text'>" . $codice_fiscale . "</h3><br>
                  <h3 class='attributo'>Email: </h3><h3 class='orange-text'>" . $email . "</h3><br>
                  <h3 class='attributo'>Numero Prenotati: </h3><h3 class='orange-text'>" . $numero_prenotati . "</h3><br>";

                  if($_SESSION['questionario_anamnesi'] != '') {
                    echo "<h3 class='attributo'> Scarica questionario anamnesi: <button type='submit' name='download' class='material-icons'>
                          <a class='icons' style='font-size: 50px; position: relative; top: 15px; text-decoration: none;' href='questionari_compilati/" . $_SESSION['questionario_anamnesi'] . "' download='questionario_anamnesi.pdf'>
                          file_download</a></button></h3>
                          <br><br>";
                }
                  echo "<button type='submit' class='material-icons' onclick='torna_indietro()'><a class='icons' style='font-size: 50px;'>arrow_back</a></button>";
            break;

        case "DA":
            $sql = $db->query("SELECT * FROM datori WHERE email = '" . $_SESSION['email_utente'] . "';")->getResultArray()[0];
            $nome = $sql['nome'];
            $cognome = $sql['cognome'];
            $data_nascita = $sql['data_nascita'];
            $codice_fiscale = $sql['codice_fiscale'];
            $nome_azienda = $sql['nome_azienda'];
            $partita_iva = $sql['partita_iva'];
            $email = $sql['email'];
            $numero_prenotati = $_SESSION['numero_prenotati'];

            echo "<center><h2 class='attributo'><span>DATORE DI LAVORO<span></h2></center>
                  <h3 class='attributo'>Nome: </h3><h3 class='orange-text' >" . $nome . "</h3><br> 
                  <h3 class='attributo'>Cognome: </h3><h3 class='orange-text' >" . $cognome . "</h3><br>
                  <h3 class='attributo'>Data di Nascita: </h3><h3 class='orange-text' >" . $data_nascita . "</h3><br>
                  <h3 class='attributo'>Codice Fiscale: </h3><h3 class='orange-text' >" . $codice_fiscale . "</h3><br>
                  <h3 class='attributo'>Nome Azienda: </h3><h3 class='orange-text' >" . $nome_azienda . "</h3><br>
                  <h3 class='attributo'>Partita Iva: </h3><h3 class='orange-text' >" . $partita_iva . "</h3><br>
                  <h3 class='attributo'>Email: </h3><h3 class='orange-text' >" . $email . "</h3><br>
                  <h3 class='attributo'>Numero Prenotati: </h3><h3 class='orange-text' >" . $numero_prenotati . "</h3><br>";

                  if($_SESSION['questionario_anamnesi'] != '') {
                    echo "<h3 class='attributo'> Scarica questionario anamnesi: <button type='submit' name='download' class='material-icons'>
                          <a class='icons' style='font-size: 50px; position: relative; top: 15px; text-decoration: none;' href='questionari_compilati/" . $_SESSION['questionario_anamnesi'] . "' download='questionario_anamnesi.pdf'>
                          file_download</a></button></h3>
                          <br><br>";
                }
                  echo "<button type='submit' class='material-icons' onclick='torna_indietro()'><a class='icons' style='font-size: 50px;'>arrow_back</a></button>";
            break;

        case "ME":
            $sql = $db->query("SELECT * FROM medici WHERE email = '" . $_SESSION['email_utente'] . "';")->getResultArray()[0];
            $nome = $sql['nome'];
            $cognome = $sql['cognome'];
            $data_nascita = $sql['data_nascita'];
            $codice_fiscale = $sql['codice_fiscale'];
            $azienda_sanitaria = $sql['azienda_sanitaria'];
            $partita_iva = $sql['partita_iva'];
            $email = $sql['email'];
            $numero_prenotati = $_SESSION['numero_prenotati'];

            echo "<center><h2 class='attributo'><span>MEDICO DI BASE</span></h2></center>
                  <h3 class='attributo'>Nome: </h3><h3 class='orange-text' >" . $nome . "</h3><br> 
                  <h3 class='attributo'>Cognome: </h3><h3 class='orange-text' >" . $cognome . "</h3><br>
                  <h3 class='attributo'>Data di Nascita: </h3><h3 class='orange-text' >" . $data_nascita . "</h3><br>
                  <h3 class='attributo'>Codice Fiscale: </h3><h3 class='orange-text' >" . $codice_fiscale . "</h3><br>
                  <h3 class='attributo'>Azienda Sanitaria: </h3><h3 class='orange-text' >" . $azienda_sanitaria . "</h3><br>
                  <h3 class='attributo'>Partita Iva: </h3><h3 class='orange-text' >" . $partita_iva . "</h3><br>
                  <h3 class='attributo'>Email: </h3><h3 class='orange-text' >" . $email . "</h3><br>
                  <h3 class='attributo'>Numero Prenotati: </h3><h3 class='orange-text' >" . $numero_prenotati . "</h3><br>";

                  if($_SESSION['questionario_anamnesi'] != '') {
                    echo "<h3 class='attributo'> Scarica questionario anamnesi: <button type='submit' name='download' class='material-icons'>
                          <a class='icons' style='font-size: 50px; position: relative; top: 15px; text-decoration: none;' href='questionari_compilati/" . $_SESSION['questionario_anamnesi'] . "' download='questionario_anamnesi.pdf'>
                          file_download</a></button></h3>
                          <br><br>";
                }
                  echo "<button type='submit' class='material-icons' onclick='torna_indietro()'><a class='icons' style='font-size: 50px;'>arrow_back</a></button>";
            break;

        default:
            break;
    }
    
  ?>

</div>

<script>
    function torna_indietro(){
        var tipo = 1;

        $.ajax({
            url: "/torna_indietro",
            type: "POST",
            data: {tipo},
            dataType: "json",
            success: function(){
                window.location.href = "/history_lab";
            }
        })
    }
</script>