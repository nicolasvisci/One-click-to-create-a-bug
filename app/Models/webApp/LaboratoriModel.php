<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class LaboratoriModel extends Model {

    protected $table = 'laboratori';
    protected $allowedFields = ['nome_lab','email','numero_telefono'];
}