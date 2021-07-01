<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class PrenotazioniModel extends Model {

    protected $table = 'prenotazioni';
    protected $allowedFields = ['email_lab','email_utente','tipologia_test', 'data', 'orario', 'numero_prenotati'];
}