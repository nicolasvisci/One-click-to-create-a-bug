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
                echo view('templates/header_loggedIn_LAB');
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
                echo view('templates/header_loggedIn_LAB');
                echo view('pages/homepage/info');
                echo view('templates/footer_loggedIn_LAB');
                break;
                
            default:
                echo view('templates/header_loggedOut');
                echo view('pages/homepage/info');
                break;
        }
    }

    public function scegliRegistrazione() {
        
        echo view('templates/header_loggedOut');
        echo view('pages/signup/signup_choice');
    }

    public function login() {

        echo view('templates/header_loggedOut');
        echo view('pages/login/login');
    }

    public function reimpostaPassword() {

        echo view('templates/header_loggedOut');
        echo view('pages/login/reimposta_password');
    }

    public function cambiaPassword() {
        echo view('templates/header_loggedOut');
        echo view('pages/login/cambia_password');
    }

    public function visualizza_notifiche() {
        $session = session();

        switch ($session->get('tipo_utente')) {

            case "LA":
                echo view('templates/header_loggedIn_LAB');
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
                echo view('templates/header_loggedIn_LAB');
                echo view('pages/profile/laboratorio_profile');
                echo view('templates/footer_loggedIn_LAB');
                break;
        }
    }

    public function guida() {

        echo view('templates/header_loggedOut');
        echo view('pages/guida/guida');
    }

    public function guidaLoggedIn() {

        echo view('templates/header_loggedIn');
        echo view('pages/guida/guida');
        echo view('templates/footer_loggedIn_users');
    }

    public function logout() {
        
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
  
    public function prenota() {

        echo view('templates/header_loggedIn');
        echo view('pages/prenotazione/mappa');
        echo view('templates/footer_loggedIn_users');
    }

    public function download() {

        echo view('templates/header_loggedIn');
        echo view('pages/questionari/download');
        echo view('templates/footer_loggedIn_users');
    }


    public function tamponiLab() {

        session();
        $db = \Config\Database::connect();
        echo view('templates/header_loggedIn_LAB');
        echo view('pages/tamponi/tipiTampone');
        echo view('templates/footer_loggedIn_LAB');
    }

    public function history() {
        session();

        echo view('templates/header_loggedIn');
        echo view('pages/tamponi/history');
        echo view('templates/footer_loggedIn_users');
    }

    public function calendario() {
        echo view('templates/header_loggedIn_LAB');
        echo view('pages/tamponi/calendario');
        echo view('templates/footer_loggedIn_LAB');
    }

    

}