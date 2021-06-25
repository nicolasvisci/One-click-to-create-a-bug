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
                echo view('pages/home');
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

    public function recuperaPassword() {

        echo view('templates/header_loggedOut');
        echo view('pages/login/recupera_password');
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
        echo view('pages/guida/guida_loggedIn');
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
        echo view('pages/download');
        echo view('templates/footer_loggedIn_users');
    }


    public function tamponiLab() {

        echo view('templates/header_loggedIn_LAB');
        echo view('pages/tipiTampone');
        echo view('templates/footer_loggedIn_LAB');
    }

    public function inserisciTamponi() {

        helper('form');
        helper('text');
        $session = session();
        $db = \Config\Database::connect();

            switch ($session->get('tipo_utente')) {
                
                case "LA":
                    $table = 'tamponi';
                    break;

                default:
                    break;
            }

            if(isset($_POST['submit'])){
                if(!empty($_POST['Test1'])) {
                    $selected1 = $_POST['Test1'];
                    $selected2 = $_POST['Test2'];
                    $selected3 = $_POST['Test3'];
                    $costo1 = $_POST['Costo1'];
                    $costo1a = $_POST['Costo1a'];
                    $costo2 = $_POST['Costo2'];
                    $costo2a = $_POST['Costo2a'];
                    $costo3 = $_POST['Costo3'];
                    $costo3a = $_POST['Costo3a'];
                   if($selected1 == "Disponibile"){
                    $sql = "UPDATE " . $table . " SET tamp_1 = '1' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                    $sql = "UPDATE " . $table . " SET costo_1 = '$costo1.$costo1a' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                   }
                   else if($selected1 == "NonDisponibile"){
                    $sql = "UPDATE " . $table . " SET tamp_1 = '0' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                   }
                   if($selected2 == "Disponibile"){
                    $sql = "UPDATE " . $table . " SET tamp_2 = '1' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                    $sql = "UPDATE " . $table . " SET costo_2 = '$costo2.$costo2a' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                   }
                   else if($selected2 == "NonDisponibile"){
                    $sql = "UPDATE " . $table . " SET tamp_2 = '0' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                   }
                   if($selected3 == "Disponibile"){
                    $sql = "UPDATE " . $table . " SET tamp_3 = '1' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                    $sql = "UPDATE " . $table . " SET costo_3 = '$costo3.$costo3a' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                   }
                   else if($selected3 == "NonDisponibile"){
                    $sql = "UPDATE " . $table . " SET tamp_3 = '0' WHERE email = '" . $session->get('email') . "';";
                    $db->query($sql);
                   }
                   return redirect()->to('/tipiTampone');
                }
                
            }

    }

}