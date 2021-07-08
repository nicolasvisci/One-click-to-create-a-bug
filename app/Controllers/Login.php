<?php

namespace App\Controllers;

use App\Models\webApp\UtentiModel;
use App\Models\webApp\CittadiniModel;
use App\Models\webApp\DatoriModel;
use App\Models\webApp\MediciModel;
use App\Models\webApp\LaboratoriModel;

class Login extends BaseController {

    public function auth() {
        helper('form');

        $session = session();
        $model = new UtentiModel();
        
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if ($data) {
            
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass){

                switch ($data['tipo_utente']) {
                    
                    case "CI":
                        $model = new CittadiniModel();
                        $data = $model->where('email', $email)->first();
                        $ses_data = [
                            'nome' => $data['nome'],
                            'cognome' => $data['cognome'],
                            'data_nascita' => $data['data_nascita'],
                            'codice_fiscale' => $data['codice_fiscale'],
                            'email' => $data['email'],
                            'tipo_utente' => "CI",
                            'logged_in' => TRUE
                        ];

                        $session->set($ses_data);
                        echo view('templates/header_loggedIn');
                        echo view('pages/dashboard/cittadino_dashboard');
                        echo view('templates/footer_loggedIn_users');
                        break;

                    case "DA":
                        $model = new DatoriModel();
                        $data = $model->where('email', $email)->first();
                        $ses_data = [
                            'nome' => $data['nome'],
                            'cognome' => $data['cognome'],
                            'data_nascita' => $data['data_nascita'],
                            'codice_fiscale' => $data['codice_fiscale'],
                            'nome_azienda' => $data['nome_azienda'],
                            'partita_iva' => $data['partita_iva'],
                            'email' => $data['email'],
                            'tipo_utente' => "DA",
                            'logged_in' => TRUE
                        ];
                
                        $session->set($ses_data);
                        echo view('templates/header_loggedIn');
                        echo view('pages/dashboard/datore_dashboard');
                        echo view('templates/footer_loggedIn_users');
                        break;

                    case "ME":
                        $model = new MediciModel();
                        $data = $model->where('email', $email)->first();
                        $ses_data = [
                            'nome' => $data['nome'],
                            'cognome' => $data['cognome'],
                            'data_nascita' => $data['data_nascita'],
                            'codice_fiscale' => $data['codice_fiscale'],
                            'azienda_sanitaria' => $data['azienda_sanitaria'],
                            'partita_iva' => $data['partita_iva'],
                            'email' => $data['email'],
                            'tipo_utente' => "ME",
                            'logged_in' => TRUE
                        ];
              
                        $session->set($ses_data);
                        echo view('templates/header_loggedIn');
                        echo view('pages/dashboard/medico_dashboard');
                        echo view('templates/footer_loggedIn_users');
                        break;

                    case "LA":
                        $model = new LaboratoriModel();
                        $data = $model->where('email', $email)->first();
                        $ses_data = [
                            'nome_lab' => $data['nome_lab'],
                            'email' => $data['email'],
                            'numero_telefono' => $data['numero_telefono'],
                            'tipo_utente' => "LA",
                            'logged_in' => TRUE
                        ];
          
                        $session->set($ses_data);
                        echo view('templates/header_loggedIn_LAB');
                        echo view('pages/dashboard/laboratorio_dashboard');
                        echo view('templates/footer_loggedIn_LAB');
                        break;

                    default:
                        break;
                }

            }  else {
                  $session->setFlashdata('msg', 'Wrong Password');
                  return redirect()->to('/login');
            }

        } else {
             $session->setFlashdata('msg', 'Email not Found');
             return redirect()->to('/login');
        }
    }

    public function forgot_password(){
        helper('form');
        helper('url');
        helper('text');
        $db = \Config\Database::connect();
        $email = \Config\Services::email();
        $session = session();
        $model = new UtentiModel();
        
        $to_email = $this->request->getVar('email');
        $row = $model->where('email', $to_email)->first();
        if($row){  

            $sql = "UPDATE utenti SET id = ? WHERE email = ?";
            $randomid = random_string('num', 30);
            $db->query($sql, [$randomid, $to_email]);
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'sardonmichel1@gmail.com', 
                'smtp_pass' => 'lollero24.', 
                'mailtype' => 'html',
                'charset' => 'UTF-8',
                'wordwrap' => TRUE
              );
            $email->initialize($config);
            
            $email->setTo($to_email);
            $email->setSubject('Reset della Password');
            $email->setMessage('Il tuo codice per resettare la password: <b>'.$randomid.'</b> <br>
            Clicca sul link per cambiare la password. <br> <a href=http://localhost/cambiaPassword/> CLICK </a>');
            $email->send();
            echo 'Email Inviata!';
            return redirect()->to('/recuperaPassword');
        }
        else{
            $data = $email->printDebugger(['headers']);
            print_r($data);
            return redirect()->to('/login');
        }
    }
    public function change_password(){
        helper('form');
        helper('url');

        $db = \Config\Database::connect();
        $session = session();
        $model = new UtentiModel();

        $codice = $this->request->getVar('id');
        $password = $this->request->getVar('password');
        $data = $model->where('id', $codice)->first();
        
        if($this->request->getMethod() === 'post' && $this->validate([

            'password' => 'required|min_length[8]',
            'confpsw' => 'matches[password]',
            'id' => 'required|min_length[10]|max_length[10]'

        ])){

            if($data){
                $sql = "UPDATE utenti SET password = ? WHERE id = ?";
                $db->query($sql, [password_hash($password, PASSWORD_DEFAULT), $this->request->getVar('id')]);
                return redirect()->to('/login');
            }
            else{
                $session->setFlashdata('msg', 'Email non trovata!');
                return redirect()->to(base_url());
            }
        }
        else{
            $session->setFlashdata('msg', 'Dati inseriti non corretti');
            return redirect()->to('/login');
        }
    }
}