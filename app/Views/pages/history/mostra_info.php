<div class="history-form">
<h1 class="white-text" style="text-align: center">INFO</h1>
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

            echo "<h3 class='attributo'>CITTADINO</h3>
                  <h3 class='attributo'>Nome: " . $nome . "</h3> 
                  <h3 class='attributo'>Cognome: " . $cognome . "</h3>
                  <h3 class='attributo'>Data di Nascita: " . $data_nascita . "</h3>
                  <h3 class='attributo'>Codice Fiscale: " . $codice_fiscale . "</h3>
                  <h3 class='attributo'>Email: " . $email . "</h3>
                  <h3 class='attributo'>Numero Prenotati: " . $numero_prenotati . "</h3>
                  <br>";

                  if($_SESSION['questionario_anamnesi'] != '') {
                      echo "<h3 class='attributo'> Scarica questionario anamnesi: <button type='submit' name='download' class='material-icons'>
                            <a class='icons' style='font-size: 50px; text-decoration: none;' href='questionari_compilati/" . $_SESSION['questionario_anamnesi'] . "' download='questionario_anamnesi.pdf'>
                            file_download</a></button></h3>
                            <br>";
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

            echo "<h3 class='attributo'>CITTADINO</h3>
                  <h3 class='attributo'>Nome: " . $nome . "</h3> 
                  <h3 class='attributo'>Cognome: " . $cognome . "</h3>
                  <h3 class='attributo'>Data di Nascita: " . $data_nascita . "</h3>
                  <h3 class='attributo'>Codice Fiscale: " . $codice_fiscale . "</h3>
                  <h3 class='attributo'>Nome Azienda: " . $nome_azienda . "</h3>
                  <h3 class='attributo'>Partita Iva: " . $partita_iva . "</h3>
                  <h3 class='attributo'>Email: " . $email . "</h3>
                  <h3 class='attributo'>Numero Prenotati: " . $numero_prenotati . "</h3>
                  <br>";

                  if($_SESSION['questionario_anamnesi'] != '') {
                    echo "<h3 class='attributo'> Scarica questionario anamnesi: <button type='submit' name='download' class='material-icons'>
                          <a class='icons' style='font-size: 50px; text-decoration: none;' href='questionari_compilati/" . $_SESSION['questionario_anamnesi'] . "' download='questionario_anamnesi.pdf'>
                          file_download</a></button></h3>
                          <br>";
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

            echo "<h3 class='attributo'>CITTADINO</h3>
                  <h3 class='attributo'>Nome: " . $nome . "</h3> 
                  <h3 class='attributo'>Cognome: " . $cognome . "</h3>
                  <h3 class='attributo'>Data di Nascita: " . $data_nascita . "</h3>
                  <h3 class='attributo'>Codice Fiscale: " . $codice_fiscale . "</h3>
                  <h3 class='attributo'>Azienda Sanitaria: " . $azienda_sanitaria . "</h3>
                  <h3 class='attributo'>Partita Iva: " . $partita_iva . "</h3>
                  <h3 class='attributo'>Email: " . $email . "</h3>
                  <h3 class='attributo'>Numero Prenotati: " . $numero_prenotati . "</h3>
                  <br>";

                  if($_SESSION['questionario_anamnesi'] != '') {
                      echo "<h3 class='attributo'> Scarica questionario anamnesi: <button type='submit' name='download' class='material-icons'>
                            <a class='icons' style='font-size: 50px; text-decoration: none;' href='questionari_compilati/" . $_SESSION['questionario_anamnesi'] . "' download='questionario_anamnesi.pdf'>
                            file_download</a></button></h3>
                            <br>";
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