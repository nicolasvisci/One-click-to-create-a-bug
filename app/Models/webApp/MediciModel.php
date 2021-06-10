<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class MediciModel extends Model {

    protected $table = 'medici';
    protected $allowedFields = ['nome','cognome','data_nascita','codice_fiscale', 'azienda_sanitaria', 'partita_iva', 'email'];
}