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
                echo view('templates/header_loggedIn');

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
}