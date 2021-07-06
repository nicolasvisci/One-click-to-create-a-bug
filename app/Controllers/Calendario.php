<?php

namespace App\Controllers;

use App\Models\webApp\CalendarioModel;

class Calendario extends BaseController
{
	public function __construct()
	{
		helper(["html"]);
	}

	public function index()
	{
        echo view('templates/header_loggedIn_LAB');
		echo view('pages/tamponi/calendario');
        echo view('templates/footer_loggedIn_LAB');
	}

}