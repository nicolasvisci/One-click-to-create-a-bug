<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class TamponiModel extends Model {

    protected $table = 'tamponi';
    protected $allowedFields = ['tamp_1','tamp_2','tamp_3', 'costo_1', 'costo_2', 'costo_3','email'];
}