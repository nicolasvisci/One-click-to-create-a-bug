<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class NotificheModel extends Model {

    protected $table = 'notifiche';
    protected $allowedFields = ['id','email_lab','email_utente','tipologia_test','data','orario','numero_prenotati','tipo','tempo'];
}