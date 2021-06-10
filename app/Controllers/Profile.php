<?php

namespace App\Controllers;

class Profile extends BaseController {

    public function update_nome() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('nome'));
        
        if ($len > 0 && $len <= 20) {
            $email = $session->get('email');
            $nome = ucfirst(strtolower($this->request->getVar('nome')));

            switch ($session->get('tipo_utente')) {
                
                case "CI":
                    $table = 'cittadini';
                    break;

                case "DA":
                    $table = 'datori';
                    break;

                case "ME":
                    $table = 'medici';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET nome = '" . $db->escapeString($nome) . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['nome'] = $nome;
        }
    }

    public function update_cognome() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('cognome'));
        
        if ($len > 0 && $len <= 20) {
            $email = $session->get('email');
            $cognome = ucfirst(strtolower($this->request->getVar('cognome')));

            switch ($session->get('tipo_utente')) {
                
                case "CI":
                    $table = 'cittadini';
                    break;

                case "DA":
                    $table = 'datori';
                    break;

                case "ME":
                    $table = 'medici';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET cognome = '" . $db->escapeString($cognome) . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['cognome'] = $cognome;
        }
    }

    public function update_data_nascita() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        if ($this->request->getVar('data_nascita')) {
            $email = $session->get('email');
            $data_nascita = $this->request->getVar('data_nascita');

            switch ($session->get('tipo_utente')) {
                
                case "CI":
                    $table = 'cittadini';
                    break;

                case "DA":
                    $table = 'datori';
                    break;

                case "ME":
                    $table = 'medici';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET data_nascita = '" . $data_nascita . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['data_nascita'] = $data_nascita;
        }
    }

    public function update_CF() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('cod_fiscale'));
        
        if ($len === 16) {
            $email = $session->get('email');
            $codice_fiscale = strtoupper($this->request->getVar('cod_fiscale'));

            switch ($session->get('tipo_utente')) {
                
                case "CI":
                    $table = 'cittadini';
                    break;

                case "DA":
                    $table = 'datori';
                    break;

                case "ME":
                    $table = 'medici';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET codice_fiscale = '" . $db->escapeString($codice_fiscale) . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['codice_fiscale'] = $codice_fiscale;
        }
    }

    public function update_email() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        if ($this->validate(['email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[utenti.email]'])) {
            $new_email = strtolower($this->request->getVar('email'));
            $old_email = $session->get('email');

            switch ($session->get('tipo_utente')) {
                
                case "CI":
                    $table = 'cittadini';
                    break;

                case "DA":
                    $table = 'datori';
                    break;

                case "ME":
                    $table = 'medici';
                    break;

                case "LA":
                    $table = 'laboratori';
                    break;

                default:
                    break;
            } 

            $table2 = 'utenti';

            $sql = "UPDATE " . $table2 . " SET email = '" . $db->escapeString($new_email) . "' WHERE email = '" . $db->escapeString($old_email) . "';";
            $db->query($sql);
            $sql = "UPDATE " . $table . " SET email = '" . $db->escapeString($new_email) . "' WHERE email = '" . $db->escapeString($old_email) . "';";
            $db->query($sql);
            $_SESSION['email'] = $new_email;
        }
    }

    public function update_nome_azienda() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('nome_azienda'));
        
        if ($len > 0 && $len <= 40) {
            $email = $session->get('email');
            $nome_azienda = ucwords(strtolower($this->request->getVar('nome_azienda')));

            switch ($session->get('tipo_utente')) {
                
                case "DA":
                    $table = 'datori';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET nome_azienda = '" . $db->escapeString($nome_azienda) . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['nome_azienda'] = $nome_azienda;
        }
    }

    public function update_partita_iva() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('p_iva'));
        
        if ($len === 11) {
            $email = $session->get('email');
            $partita_iva = $this->request->getVar('p_iva');

            switch ($session->get('tipo_utente')) {

                case "DA":
                    $table = 'datori';
                    break;

                case "ME":
                    $table = 'medici';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET partita_iva = '" . $db->escapeString($partita_iva) . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['partita_iva'] = $partita_iva;
        }
    }

    public function update_azienda_sanitaria() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('azienda_sanitaria'));
        
        if ($len > 0 && $len <= 40) {
            $email = $session->get('email');
            $azienda_sanitaria = ucwords(strtolower($this->request->getVar('azienda_sanitaria')));

            switch ($session->get('tipo_utente')) {
                
                case "ME":
                    $table = 'medici';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET azienda_sanitaria = '" . $db->escapeString($azienda_sanitaria) . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['azienda_sanitaria'] = $azienda_sanitaria;
        }
    }

    public function update_nome_LAB() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('nome_LAB'));
        
        if ($len > 0 && $len <= 40) {
            $email = $session->get('email');
            $nome_LAB = ucwords(strtolower($this->request->getVar('nome_LAB')));

            switch ($session->get('tipo_utente')) {
                
                case "LA":
                    $table = 'laboratori';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET nome_lab = '" . $db->escapeString($nome_LAB) . "' WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['nome_lab'] = $nome_LAB;
        }
    }

    public function update_numero_telefono() {
        helper('form');
        $session = session();
        $db = \Config\Database::connect();
        
        $len = strlen($this->request->getVar('numero_telefono'));
        
        if ($len === 10) {
            $email = $session->get('email');
            $numero_telefono = $this->request->getVar('numero_telefono');

            switch ($session->get('tipo_utente')) {
                
                case "LA":
                    $table = 'laboratori';
                    break;

                default:
                    break;
            }
            
            $sql = "UPDATE " . $table . " SET numero_telefono = " . $numero_telefono . " WHERE email = '" . $db->escapeString($email) . "';";
            $db->query($sql);
            $_SESSION['numero_telefono'] = $numero_telefono;
        }
    }

    public function update() {
        helper('form');

        $session = session();

        if ($this->request->getMethod() === 'post') {

            switch ($session->get('tipo_utente')) {

                case "CI":
                    
                    Profile::update_nome();
                    Profile::update_cognome();
                    Profile::update_data_nascita();
                    Profile::update_CF();
                    Profile::update_email();

                    return redirect()->to('/profile');
                    break;

                case "DA":

                    Profile::update_nome();
                    Profile::update_cognome();
                    Profile::update_data_nascita();
                    Profile::update_CF();
                    Profile::update_nome_azienda();
                    Profile::update_partita_iva();
                    Profile::update_email();

                    return redirect()->to('/profile');
                    break;

                case "ME":

                    Profile::update_nome();
                    Profile::update_cognome();
                    Profile::update_data_nascita();
                    Profile::update_CF();
                    Profile::update_azienda_sanitaria();
                    Profile::update_partita_iva();
                    Profile::update_email();

                    return redirect()->to('/profile');
                    break;

                case "LA":

                    Profile::update_nome_LAB();
                    Profile::update_numero_telefono();
                    Profile::update_email();

                    return redirect()->to('/profile');
                    break;
                
                default:
                    break;
            }
        }
    }

    public function delete() {
        $session = session();
        $db = \Config\Database::connect();

        $sql = "DELETE FROM utenti WHERE email = '" . $db->escapeString($session->get('email')) . "'";
        $db->query($sql);

        $session->destroy();

        return redirect()->to('/');
    }

}


?>