<?php

namespace App\Controllers;

class Prenota extends BaseController {
    
    function closest_locations(){
        $db = \Config\Database::connect();
        $lat = $_POST['latitude'];
        $lng = $_POST['longitude'];

        $sql= $db->query("SELECT 
        nome_lab, CONCAT(lat,',', lng) AS pos,
        ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $lng . ") ) + sin( radians(" . $lat . ") ) * sin( radians( lat ) ) ) ) AS distance,
        laboratori.email, numero_telefono
        FROM laboratori
        JOIN posizione_lab  ON laboratori.email = posizione_lab.email
        HAVING distance <= 30
        ORDER BY distance ASC;")->getResultArray();

        echo json_encode($sql);
    }

    function get_data() {
        $nome_lab = $_POST['nome_lab'];
        $email = $_POST['email'];
        $numero_telefono = $_POST['numero_telefono'];
        $info = array($nome_lab, $email, $numero_telefono);
        return json_encode($info);
    }

    function scegli_prenotazione()
    {
        $session = session();

        switch ($session->get('tipo_utente')) {

            case "CI":
                echo view('templates/header_loggedIn');
                echo view('pages/prenotazione/prenotazione_singola');
                echo view('templates/footer_loggedIn_users');
                break;

            case "DA":
                echo view('templates/header_loggedIn');
                echo view('pages/prenotazione/scegli_prenotazione');
                echo view('templates/footer_loggedIn_users');
                break;

            case "ME":
                echo view('templates/header_loggedIn');
                echo view('pages/prenotazione/scegli_prenotazione');
                echo view('templates/footer_loggedIn_users');
                break;
        }

    }

    function prenotazione_singola() {
        
                echo view('templates/header_loggedIn');
                echo view('pages/prenotazione/prenotazione_singola');
                echo view('templates/footer_loggedIn_users');
    }

function prenotazione_multipla() {
        
    echo view('templates/header_loggedIn');
    echo view('pages/prenotazione/prenotazione_multipla');
    echo view('templates/footer_loggedIn_users');
    }
}