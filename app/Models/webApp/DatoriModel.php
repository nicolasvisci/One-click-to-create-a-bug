<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class DatoriModel extends Model {

    protected $table = 'datori';
    protected $allowedFields = ['nome','cognome','data_nascita','codice_fiscale', 'nome_azienda', 'partita_iva', 'email'];
}