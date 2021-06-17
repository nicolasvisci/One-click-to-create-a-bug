<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class PosizioneModel extends Model {

    function get_closest_locations($lng,$lat,$email) {
        $db = \Config\Database::connect();

        $sql= $this->$db->query("SELECT 
        nome_lab, CONCAT(lat,',', lng) AS pos, 'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon,
        ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $lng . ") ) + sin( radians(" . $lat . ") ) * sin( radians( lat ) ) ) ) AS distance,
        laboratori.email, numero_telefono
        FROM laboratori
        JOIN posizione_lab  ON laboratori.email = posizione_lab.email
        
        HAVING distance <= 100
        ORDER BY distance ASC;")->result_array();

        return $sql;
    }
}