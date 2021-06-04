<?php

namespace App\Controllers;

use App\Models\webApp\DatoriModel;
use App\Models\webApp\UtentiModel;

class Datori extends BaseController {

	public function create() {
        helper('form');

        $model = new DatoriModel();
        $model2 = new UtentiModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nome' => 'required|max_length[20]',
            'cognome' => 'required|max_length[20]',
            'data_nascita' => 'required',
            'cod_fiscale' => 'required|min_length[16]|max_length[16]',
            'nome_azienda' => 'required|max_length[40]',
            'p_iva' => 'required|min_length[11]|max_length[11]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[utenti.email]',
            'password' => 'required|min_length[8]',
            'passwordconf' => 'matches[password]'
        ]))  
        {
            $model2->save([
                'email' => strtolower($this->request->getVar('email')),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'tipo_utente' => "DA"
            ]);

            $model->save([
                'nome' => ucfirst(strtolower($this->request->getVar('nome'))),
                'cognome'  => ucfirst(strtolower($this->request->getVar('cognome'))),
                'data_nascita'  => $this->request->getVar('data_nascita'),
                'codice_fiscale' => strtoupper($this->request->getVar('cod_fiscale')),
                'nome_azienda' => ucwords(strtolower($this->request->getVar('nome_azienda'))),
                'partita_iva' => $this->request->getVar('p_iva'),
                'email' => strtolower($this->request->getVar('email'))
            ]);
    
        return redirect()->to('/login');

        } else {
            echo view('templates/header_loggedOut');
            echo view('pages/signup_datore');
        }
    }
} 