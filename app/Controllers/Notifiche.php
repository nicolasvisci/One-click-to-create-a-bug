<?php

namespace App\Controllers;

class Notifiche extends BaseController {

    function elimina_notifica() {
        $session = session();
        $db = \Config\Database::connect();

        $n = $_POST['id'];
        $email = $_SESSION['email'];

        switch ($session->get('tipo_utente')) {

            case "LA":
                $sql = $db->query("SELECT id, email_utente, data, orario FROM notifiche, laboratori WHERE email_lab = email AND email ='" . $_SESSION['email'] . "' AND tipo = 'LAB' ORDER BY tempo DESC;")->getResultArray()[$n];
                $id = $sql['id'];
                $email_utente = $sql['email_utente'];
                $data = $sql['data'];
                $orario = $sql['orario'];
                $del = $db->query("DELETE FROM notifiche WHERE id = " . $id . " AND email_lab = '" . $email . "' AND email_utente = '" . $email_utente . "' AND data = '" . $data . "' AND orario = '" . $orario . "' AND tipo = 'LAB';");

                break;

            default:
                $sql = $db->query("SELECT id, email_lab, data, orario FROM notifiche, laboratori WHERE email_lab = email AND email_utente ='" . $email . "' AND tipo = 'UTENTE' ORDER BY tempo DESC;")->getResultArray()[$n];
                $id = $sql['id'];
                $email_lab = $sql['email_lab'];
                $data = $sql['data'];
                $orario = $sql['orario'];
                $del = $db->query("DELETE FROM notifiche WHERE id = " . $id . " AND email_lab = '" . $email_lab . "' AND email_utente = '" . $email . "' AND data = '" . $data . "' AND orario = '" . $orario . "' AND tipo = 'UTENTE';");
                break;
        }

        return json_encode(true);
    }
}
