<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class CittadiniModel extends Model {

    protected $table = 'cittadini';
    protected $allowedFields = ['nome','cognome','data_nascita','codice_fiscale', 'email'];
}