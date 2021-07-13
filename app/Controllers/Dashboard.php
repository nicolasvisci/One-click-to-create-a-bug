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

            default:
                echo view('templates/header_loggedOut');
                echo view('pages/homepage/home');
                break;
        } 
    }

    public function info() {
        $session = session();

        switch ($session->get('tipo_utente')) {

            case "CI":
                echo view('templates/header_loggedIn');
                echo view('pages/homepage/info');
                echo view('templates/footer_loggedIn_users');
                break;

            case "DA":
                echo view('templates/header_loggedIn');
                echo view('pages/homepage/info');
                echo view('templates/footer_loggedIn_users');
                break;

            case "ME":
                echo view('templates/header_loggedIn');
                echo view('pages/homepage/info');
                echo view('templates/footer_loggedIn_users');
                break;

            case "LA":
                echo view('templates/header_loggedIn');
                echo view('pages/homepage/info');
                echo view('templates/footer_loggedIn_LAB');
                break;
                
            default:
                echo view('templates/header_loggedOut');
                echo view('pages/homepage/info');
                break;
        }
    }

    public function signup() {
        echo view('templates/header_loggedOut');
        echo view('pages/homepage/signup_choice');
    }

    public function login() {
        echo view('templates/header_loggedOut');
        echo view('pages/homepage/login');
    }

    public function recuperaPassword() {
        echo view('templates/header_loggedOut');
        echo view('pages/homepage/recupera_password');
    }

    public function cambiaPassword() {
        echo view('templates/header_loggedOut');
        echo view('pages/homepage/cambia_password');
    }

    public function visualizza_notifiche() {
        $session = session();

        switch ($session->get('tipo_utente')) {

            case "LA":
                echo view('templates/header_loggedIn');
                echo view('pages/notifiche/visualizza_notifiche_lab');
                echo view('templates/footer_loggedIn_LAB');
                break;

            default:
                echo view('templates/header_loggedIn');
                echo view('pages/notifiche/visualizza_notifiche_utenti');
                echo view('templates/footer_loggedIn_users');
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

    public function logout() {
        
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function prenota() {

        echo view('templates/header_loggedIn');
        echo view('pages/prenotazione/mappa');
        echo view('templates/footer_loggedIn_users');
    }
    
    public function history() {
        session();

        echo view('templates/header_loggedIn');
        echo view('pages/history/history');
        echo view('templates/footer_loggedIn_users');
    }

    public function modificaTamp() {
        session();

        echo view('templates/header_loggedIn');
        echo view('pages/modifica/modificaTamp');
        echo view('templates/footer_loggedIn_LAB');
    }

    public function calendario() {
        echo view('templates/header_loggedIn');
        echo view('pages/history/calendario');
        echo view('templates/footer_loggedIn_LAB');
    }

}