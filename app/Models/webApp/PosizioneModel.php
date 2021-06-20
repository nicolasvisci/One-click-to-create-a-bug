<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class PosizioneModel extends Model {

    protected $table = 'posizione_lab'; 
    protected $allowedFields = ['lat', 'lng', 'email'];
}