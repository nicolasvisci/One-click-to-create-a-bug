<?php

namespace App\Controllers;
        
class Pages extends BaseController {

	public function index() {
		echo view('templates/header_loggedOut');
        echo view('pages/homepage/home');
	}

    public function view($page = '') {

        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('templates/header_loggedOut');
        echo view('pages/' . $page);   
    }

    
}