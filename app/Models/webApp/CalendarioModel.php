<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class CalendarioModel extends Model {
	protected $table                = 'prenotazioni';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'title',
		'start'
	];
}