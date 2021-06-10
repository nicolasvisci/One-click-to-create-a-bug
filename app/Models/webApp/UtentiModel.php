<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class UtentiModel extends Model {

    protected $table = 'utenti';
    protected $allowedFields = ['email', 'password', 'tipo_utente'];
}