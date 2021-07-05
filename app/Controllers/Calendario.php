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

	public function load()
	{
		$event = new calendarioModel();
		$session = session();
		$db = \Config\Database::connect();
		// on page load this ajax code block will be run
		$sql = "SELECT id,title,start_event,end_event FROM events ;";
		$data = $db->query($sql)->getResultArray();;

		return json_encode($data);
	}

}
//WHERE email = '" . $session->get('email') . "'