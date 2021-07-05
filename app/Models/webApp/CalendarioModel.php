<?php

namespace App\Models\webApp;

use CodeIgniter\Model;

class CalendarioModel extends Model {
	protected $table                = 'events';
	protected $allowedFields        = [
		'title',
		'start_event',
		'end_event'
	];
}