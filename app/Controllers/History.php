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
                $sql = $db->query("SELECT email_utente, orario FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND tipologia_test = tipologia AND data = '" . $data . "' AND laboratori.email = '" . $_SESSION['email'] . "' ORDER BY orario ASC;")->getResultArray()[$id];
                $email_utente = $sql['email_utente'];
                $orario = $sql['orario'];

                $del = $db->query("DELETE FROM prenotazioni WHERE email_lab = '" . $email . "' AND email_utente = '" . $email_utente . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");
                return json_encode($id);

                break; 

            default:
                $sql = $db->query("SELECT email_lab, data, orario FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND prenotazioni.email_utente = '" . $email . "' AND tipologia_test = tipologia ORDER BY data DESC, orario DESC;")->getResultArray()[$id];
                $email_lab = $sql['email_lab'];
                $data = $sql['data'];
                $orario = $sql['orario'];

                $del = $db->query("DELETE FROM prenotazioni WHERE email_lab = '" . $email_lab . "' AND email_utente = '" . $email . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");
                return json_encode($id);
        }    
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

        $sql = $db->query("SELECT email_utente, numero_prenotati FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND tipologia_test = tipologia AND data = '" . $data . "' AND laboratori.email = '" . $_SESSION['email'] . "' ORDER BY orario ASC;")->getResultArray()[$id];
        $_SESSION['numero_prenotati'] = $sql['numero_prenotati'];
        $_SESSION['email_utente'] = $sql['email_utente'];

        $sql2 = $db->query("SELECT tipo_utente FROM utenti WHERE email = '" . $sql['email_utente'] . "';")->getResultArray()[0];
        $_SESSION['tipo_prenotato'] = $sql2['tipo_utente'];

        return json_encode($id);
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

        unset($_SESSION['numero_prenotati']);
        unset($_SESSION['email_utente']);
        unset($_SESSION['tipo_prenotato']);

        return json_encode($tipo);
    }
}