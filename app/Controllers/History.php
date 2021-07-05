<?php

namespace App\Controllers;

class History extends BaseController {
    
    function annulla_prenotazione() {
        session();
        $db = \Config\Database::connect();

        $id = $_POST['id'];
        $email = $_SESSION['email'];

        $sql = $db->query("SELECT email_lab, data, orario FROM laboratori, test, prenotazioni WHERE prenotazioni.email_lab = test.email AND test.email = laboratori.email AND prenotazioni.email_utente = '" . $email . "' AND tipologia_test = tipologia ORDER BY data DESC, orario DESC;")->getResultArray()[$id];
        $email_lab = $sql['email_lab'];
        $data = $sql['data'];
        $orario = $sql['orario'];

        $del = $db->query("DELETE FROM prenotazioni WHERE email_lab = '" . $email_lab . "' AND email_utente = '" . $email . "' AND data = '" . $data . "' AND orario = '" . $orario . "';");
        return json_encode($id);
    }
}