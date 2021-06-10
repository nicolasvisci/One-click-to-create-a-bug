<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class PosizioneModel extends Model {

    protected $table = 'posizione_lab';
    protected $allowedFields = ['lat','lng', 'email'];

    function get_closest_locations($lng,$lat,$email) {
        $sql= "SELECT 
        nome_lab, CONCAT(lat,',', lng) AS pos,'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon,
        ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance,
        email, numero_telefono
        FROM laboratori
        JOIN posizione_lab  ON laboratori.email = posizione_lab.email
        AND posizione_lab.email = $email
        HAVING distance <= 60
        ORDER BY distance ASC;";

        return $sql;
    }
}