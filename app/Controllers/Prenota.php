<?php

namespace App\Controllers;

class Prenota extends BaseController {

    function get_closest_locations($lat, $lng) {
        $db = \Config\Database::connect();

        $sql= $this->$db->query("SELECT 
        nome_lab, CONCAT(lat,',', lng) AS pos, 'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon,
        ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $lng . ") ) + sin( radians(" . $lat . ") ) * sin( radians( lat ) ) ) ) AS distance,
        laboratori.email, numero_telefono
        FROM laboratori
        JOIN posizione_lab  ON laboratori.email = posizione_lab.email
        HAVING distance <= 30
        ORDER BY distance ASC;")->getResultArray();

        return $sql;
    }
    
    function closest_locations(){

        $db = \Config\Database::connect();

        $lat = $_POST['latitude'];
        $lng = $_POST['longitude'];

        

        $sql= $db->query("SELECT 
        nome_lab, CONCAT(lat,',', lng) AS pos, AS icon,
        ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $lng . ") ) + sin( radians(" . $lat . ") ) * sin( radians( lat ) ) ) ) AS distance,
        laboratori.email, numero_telefono
        FROM laboratori
        JOIN posizione_lab  ON laboratori.email = posizione_lab.email
        HAVING distance <= 30
        ORDER BY distance ASC;")->getResultArray();

        echo json_encode($sql);
    }
}