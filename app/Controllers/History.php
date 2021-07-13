<?php

namespace App\Controllers;

class History extends BaseController {
    
    function annulla_prenotazione() {
        $session = session();
        $db = \Config\Database::connect();

        $id = $_POST['id'];
        $email = $_SESSION['email'];

        switch ($session->get('tipo_utente')) {

            case "LA":
                $data = $_SESSION['date'];
                $sql = $db->query("SELECT email_utente, orario, tipologia_test, numero_prenotati FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND tipologia_test = tipologia AND data = '" . $data . "' AND laboratori.email = '" . $_SESSION['email'] . "' ORDER BY orario ASC;")->getResultArray()[$id];
                $email_utente = $sql['email_utente'];
                $orario = $sql['orario'];
                $tipologia_test = $sql['tipologia_test'];
                $numero_prenotati = $sql['numero_prenotati'];

                $del = $db->query("DELETE FROM prenotazioni WHERE email_lab = '" . $email . "' AND email_utente = '" . $email_utente . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");

                $add = $db->query("INSERT INTO notifiche VALUES (3, '" . $email . "', '" . $email_utente . "', '" . 
                                   $tipologia_test . "', '" . $data . "', '" . $orario . "', " . $numero_prenotati . ", 'UTENTE', CURRENT_TIMESTAMP());");

                $add = $db->query("INSERT INTO notifiche VALUES (3, '" . $email . "', '" . $email_utente . "', '" . 
                                   $tipologia_test . "', '" . $data . "', '" . $orario . "', " . $numero_prenotati . ", 'LAB', CURRENT_TIMESTAMP());");

                return json_encode(true);

                break; 

            default:
                $sql = $db->query("SELECT email_lab, data, orario, tipologia_test, numero_prenotati FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND prenotazioni.email_utente = '" . $email . "' AND tipologia_test = tipologia ORDER BY data DESC, orario DESC;")->getResultArray()[$id];
                $email_lab = $sql['email_lab'];
                $data = $sql['data'];
                $orario = $sql['orario'];
                $tipologia_test = $sql['tipologia_test'];
                $numero_prenotati = $sql['numero_prenotati'];

                $del = $db->query("DELETE FROM prenotazioni WHERE email_lab = '" . $email_lab . "' AND email_utente = '" . $email . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");

                $add = $db->query("INSERT INTO notifiche VALUES (2, '" . $email_lab . "', '" . $email . "', '" . 
                                   $tipologia_test . "', '" . $data . "', '" . $orario . "', " . $numero_prenotati . ", 'UTENTE', CURRENT_TIMESTAMP());");

                $add = $db->query("INSERT INTO notifiche VALUES (2, '" . $email_lab . "', '" . $email . "', '" . 
                                   $tipologia_test . "', '" . $data . "', '" . $orario . "', " . $numero_prenotati . ", 'LAB', CURRENT_TIMESTAMP());");

                return json_encode(true);
        }    
    }

    function get_risultato_utente() {
        session();
        $db = \Config\Database::connect();

        $id = $_POST['id'];
        $email = $_SESSION['email'];

        $sql = $db->query("SELECT data, orario, tipologia_test, numero_prenotati, numero_positivi FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND prenotazioni.email_utente = '" . $email . "' AND tipologia_test = tipologia ORDER BY data DESC, orario DESC;")->getResultArray()[$id];
        $_SESSION['date'] = $sql['data'];
        $_SESSION['orario'] = $sql['orario'];
        $_SESSION['tipologia_test'] = $sql['tipologia_test'];
        $_SESSION['numero_prenotati'] = $sql['numero_prenotati'];
        $_SESSION['numero_positivi'] = $sql['numero_positivi'];

        return json_encode(true);
    }

    function mostra_risultato() {

        echo view('templates/header_loggedIn');
        echo view('pages/history/mostra_risultato');
        echo view('templates/footer_loggedIn_LAB');
    }

    function get_date() {
        session();

        $date = $_POST['date'];
        $_SESSION['date'] = $date;
        return json_encode($_SESSION['date']);
    }

    function history_lab() {
        session();
        echo view('templates/header_loggedIn');
        echo view('pages/history/history_lab');
        echo view('templates/footer_loggedIn_LAB');
    }

    function get_info() {
        session();
        $db = \Config\Database::connect();

        $data = $_SESSION['date'];
        $id = $_POST['id'];

        $sql = $db->query("SELECT email_utente, numero_prenotati, questionario_anamnesi FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND tipologia_test = tipologia AND data = '" . $data . "' AND laboratori.email = '" . $_SESSION['email'] . "' ORDER BY orario ASC;")->getResultArray()[$id];
        $_SESSION['numero_prenotati'] = $sql['numero_prenotati'];
        $_SESSION['email_utente'] = $sql['email_utente'];
        $_SESSION['questionario_anamnesi'] = $sql['questionario_anamnesi'];

        $sql2 = $db->query("SELECT tipo_utente FROM utenti WHERE email = '" . $sql['email_utente'] . "';")->getResultArray()[0];
        $_SESSION['tipo_prenotato'] = $sql2['tipo_utente'];

        return json_encode(true);
    }

    function mostra_info() {
        session();

        echo view('templates/header_loggedIn');
        echo view('pages/history/mostra_info');
        echo view('templates/footer_loggedIn_LAB');
    }

    function torna_indietro() {
        session();

        $tipo = $_POST['tipo'];

        if ($tipo === 1) {
            unset($_SESSION['numero_prenotati']);
            unset($_SESSION['email_utente']);
            unset($_SESSION['tipo_prenotato']);
            unset($_SESSION['questionario_anamnesi']);

        } else if ($tipo === 2) {
            unset($_SESSION['email_utente']);
            unset($_SESSION['orario']);
            unset($_SESSION['numero_prenotati']);
            unset($_SESSION['tipologia_test']);
            unset($_SESSION['numero_positivi']);

        } else if ($tipo === 3) {
            unset($_SESSION['date']);
            unset($_SESSION['orario']);
            unset($_SESSION['tipologia_test']);
            unset($_SESSION['numero_prenotati']);
            unset($_SESSION['numero_positivi']);
        }

        unset($_SESSION['tipo']);

        return json_encode(true);
    }

    function get_risultato_lab() {
        $session = session();
        $db = \Config\Database::connect();

        $id = $_POST['id'];
        $email = $_SESSION['email'];
        $data = $_SESSION['date'];

        $sql = $db->query("SELECT email_utente, orario, numero_prenotati, tipologia_test, numero_positivi FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND tipologia_test = tipologia AND data = '" . $data . "' AND laboratori.email = '" . $_SESSION['email'] . "' ORDER BY orario ASC;")->getResultArray()[$id];
        $_SESSION['email_utente'] = $sql['email_utente'];
        $_SESSION['orario'] = $sql['orario'];
        $_SESSION['numero_prenotati'] = $sql['numero_prenotati'];
        $_SESSION['tipologia_test'] = $sql['tipologia_test'];
        $_SESSION['numero_positivi'] = $sql['numero_positivi'];

        return json_encode(true);
    }

    function set_risultato_lab() {
        $session = session();

        if ($_SESSION['numero_prenotati'] == 1) {
            echo view('templates/header_loggedIn');
            echo view('pages/history/set_risultato_singolo');
            echo view('templates/footer_loggedIn_LAB');

        } else {

            echo view('templates/header_loggedIn');
            echo view('pages/history/set_risultato_multiplo');
            echo view('templates/footer_loggedIn_LAB');
        }
    }

    function set_pos() {
        $session = session();
        $db = \Config\Database::connect();
        
        $email = $_SESSION['email'];
        $data = $_SESSION['date'];
        $email_utente = $_SESSION['email_utente'];
        $orario = $_SESSION['orario'];

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            
            if ($id == 1) {
                $sql = $db->query("UPDATE prenotazioni SET numero_positivi = 1 WHERE email_lab = '" . $email . "' AND email_utente = '" . $email_utente . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");
                $_SESSION['numero_positivi'] = 1;

            } else if ($id == 2) {
                $sql = $db->query("UPDATE prenotazioni SET numero_positivi = 0 WHERE email_lab = '" . $email . "' AND email_utente = '" . $email_utente . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");
                $_SESSION['numero_positivi'] = 0;

            }

        } else {

            $numero_positivi = $_POST['num'];

            if ($numero_positivi <= $_SESSION['numero_prenotati']) {

                $sql = $db->query("UPDATE prenotazioni SET numero_positivi = " . $numero_positivi . " WHERE email_lab = '" . $email . "' AND email_utente = '" . $email_utente . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");
                $_SESSION['numero_positivi'] = $numero_positivi;
            }
        }
        

        return json_encode(true);
    }
}