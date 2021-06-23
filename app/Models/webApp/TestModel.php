<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class TestModel extends Model {

    protected $table = 'test'; 
    protected $allowedFields = ['tipologia', 'orario_inizio', 'orario_fine', 'costo', 'email'];
}