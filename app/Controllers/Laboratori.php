<?php

namespace App\Controllers;

use App\Models\webApp\LaboratoriModel;
use App\Models\webApp\UtentiModel;
use App\Models\webApp\PosizioneModel;

class Laboratori extends BaseController {

	public function create() {
        helper('form');

        $model = new LaboratoriModel();
        $model2 = new UtentiModel();
        $model3 = new PosizioneModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'nome_lab' => 'required|max_length[40]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[utenti.email]',
            'numero_telefono' => 'required|min_length[10]|max_length[10]',
            'password' => 'required|min_length[8]',
            'passwordconf' => 'matches[password]'
        ]))  
        {
            $model2->save([
                'email' => strtolower($this->request->getVar('email')),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'tipo_utente' => "LA"
            ]);

            $model->save([
                'nome_lab' => ucwords(strtolower($this->request->getVar('nome_lab'))),
                'email' => strtolower($this->request->getVar('email')),
                'numero_telefono' => $this->request->getVar('numero_telefono')
            ]);

            $model3->save([
                'lat' => 41.1122 - mt_rand(20, 100) * 0.001,
                'lng' => 16.8547 - mt_rand(-100, 100) * 0.001,
                'email' => strtolower($this->request->getVar('email'))
            ]);
    
        return redirect()->to('/login');

        } else {
            echo view('templates/header_loggedOut');
            echo view('pages/signup/signup_laboratorio');
        }
    }
    
} 