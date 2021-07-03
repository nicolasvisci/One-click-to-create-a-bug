<?php

namespace App\Controllers;

use App\Models\webApp\LaboratoriModel;
use App\Models\webApp\UtentiModel;
use App\Models\webApp\PosizioneModel;
use App\Models\webApp\TamponiModel;

class Laboratori extends BaseController {

	public function create() {
        helper('form');

        $model = new LaboratoriModel();
        $model2 = new UtentiModel();
        $model3 = new PosizioneModel();
        $model4 = new TamponiModel();

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
                'lat' => 41.107813 - mt_rand(0.1, 1) * 0.1,
                'lng' => 16.866235 - mt_rand(-1, 1) * 0.1,
                'email' => strtolower($this->request->getVar('email'))
            ]);

            $model4->save([
                'email' => strtolower($this->request->getVar('email'))
            ]);
    
        return redirect()->to('/login');

        } else {
            echo view('templates/header_loggedOut');
            echo view('pages/signup/signup_laboratorio');

        }
    }

    public function aggiungi_test() {
        session();
        $db = \Config\Database::connect();

        $email = $_SESSION['email'];

        $tipo = $this->request->getVar('tipo');
        $hh_inizio = $this->request->getVar('hh_inizio');
        $mm_inizio = $this->request->getVar('mm_inizio');
        $hh_fine = $this->request->getVar('hh_fine');
        $mm_fine = $this->request->getVar('mm_fine');
        $unita = $this->request->getVar('unita');
        $centesimi = $this->request->getVar('centesimi');

        if ($this->request->getMethod() === 'post' && $this->validate([
            'tipo' => 'required',
            'hh_inizio' => 'required|min_length[1]|max_length[2]',
            'mm_inizio' => 'required|min_length[1]|max_length[2]',
            'hh_fine' => 'required|min_length[1]|max_length[2]',
            'mm_fine' => 'required|min_length[1]|max_length[2]',
            'unita' => 'required|min_length[1]|max_length[3]',
            'centesimi' => 'required|min_length[1]|max_length[2]',
        ])) 

        {
            $sql = $db->query("SELECT * FROM test WHERE email = '" . $email . "' AND tipologia = '" . $tipo . "' ")->getResultArray();

            if($sql) {
                $sql = $db->query("UPDATE test SET orario_inizio = '" . $hh_inizio . ":" . $mm_inizio . "'," . "orario_fine = '" . $hh_fine . ":" . $mm_fine . "', costo = " . $unita . "." . $centesimi . " WHERE email = '" . $email . "' AND tipologia = '" . $tipo . "';");
            
            } else {

                $sql = $db->query("INSERT INTO test VALUES ('" . $tipo . "', '" . $hh_inizio . ":" . $mm_inizio . "', '" . $hh_fine . ":" . $mm_fine . "', " . $unita . "." . $centesimi . ", '" . $email . "');");
            } 
        }

        echo view('templates/header_loggedIn_LAB');
        echo view('pages/tipiTampone');
        echo view('templates/footer_loggedIn_LAB');
    }
    
} 