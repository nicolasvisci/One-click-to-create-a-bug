<?php

namespace App\Controllers;

class Dashboard extends BaseController {

    public function home() {
        $session = session();

        switch ($session->get('tipo_utente')) {

            case "CI":
                echo view('templates/header_loggedIn');
                echo view('pages/dashboard/cittadino_dashboard');
                echo view('templates/footer_loggedIn_users');
                break;

            case "DA":
                echo view('templates/header_loggedIn');
                echo view('pages/dashboard/datore_dashboard');
                echo view('templates/footer_loggedIn_users');
                break;

            case "ME":
                echo view('templates/header_loggedIn');
                echo view('pages/dashboard/medico_dashboard');
                echo view('templates/footer_loggedIn_users');
                break;

            case "LA":
                echo view('templates/header_loggedIn');
                echo view('pages/dashboard/laboratorio_dashboard');
                echo view('templates/footer_loggedIn_LAB');
                break;
        } 
    }

    public function profile() {
        $session = session();

        switch ($session->get('tipo_utente')) {

            case "CI":
                echo view('templates/header_loggedIn');
                echo view('pages/profile/cittadino_profile');
                echo view('templates/footer_loggedIn_users');
                break;

            case "DA":
                echo view('templates/header_loggedIn');
                echo view('pages/profile/datore_profile');
                echo view('templates/footer_loggedIn_users');
                break;

            case "ME":
                echo view('templates/header_loggedIn');
                echo view('pages/profile/medico_profile');
                echo view('templates/footer_loggedIn_users');
                break;

            case "LA":
                echo view('templates/header_loggedIn');
                echo view('pages/profile/laboratorio_profile');
                echo view('templates/footer_loggedIn_LAB');
                break;
        }
    }

    public function guida() {
        $session = session();

        echo view('templates/header_loggedIn');
        echo view('pages/guida_loggedIn');
        echo view('templates/footer_loggedIn_users');
    }

    public function logout() {
        
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    
    public function prenota() {
        $session = session();

        echo view('templates/header_loggedIn');
        echo view('pages/mappa');
        echo view('templates/footer_loggedIn_users');
    }

    public function download() {
        $session = session();

        echo view('templates/header_loggedIn');
        echo view('pages/download');
        echo view('templates/footer_loggedIn_users');
    }

    public function calendario() {
        $session = session();

        echo view('templates/header_loggedIn');
        echo view('pages/calendario');
        echo view('templates/footer_loggedIn_users');
    }
}