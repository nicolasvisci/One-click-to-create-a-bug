<?php

namespace App\Controllers;

class Prenota extends BaseController {
    
    function closest_locations(){
        $db = \Config\Database::connect();
        $lat = $_POST['latitude'];
        $lng = $_POST['longitude'];

        $sql= $db->query("SELECT 
        nome_lab, CONCAT(lat,',', lng) AS pos,
        ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $lng . ") ) + sin( radians(" . $lat . ") ) * sin( radians( lat ) ) ) ) AS distance,
        laboratori.email, numero_telefono
        FROM laboratori
        JOIN posizione_lab  ON laboratori.email = posizione_lab.email AND laboratori.email IN (SELECT email FROM test)
        HAVING distance <= 30
        ORDER BY distance ASC;")->getResultArray();

        echo json_encode($sql);
    }

    function get_data() {
        session();
        $nome_lab = $_POST['nome_lab'];
        $email = $_POST['email'];
        $numero_telefono = $_POST['numero_telefono'];
        $info = array($nome_lab, $email, $numero_telefono);
        $_SESSION['email_lab'] = $email;
        return json_encode($info);
    }

    function prenotazione() {
        $session = session();

        switch ($session->get('tipo_utente')) {

            case "CI":
                echo view('templates/header_loggedIn');
                echo view('pages/prenotazione/prenotazione_cittadino');
                echo view('templates/footer_loggedIn_users');
                break;

            case "DA":
                echo view('templates/header_loggedIn');
                echo view('pages/prenotazione/prenotazione_medico_datore');
                echo view('templates/footer_loggedIn_users');
                break;

            case "ME":
                echo view('templates/header_loggedIn');
                echo view('pages/prenotazione/prenotazione_medico_datore');
                echo view('templates/footer_loggedIn_users');
                break;
        }
    }

    function set_book_data() {
        session();
        $id = $_POST['id'];
        $_SESSION['id'] = $id;
        return json_encode($id);
    }

    public function conferma_prenotazione_singola() {
        session();

        echo view('templates/header_loggedIn');
        echo view('pages/prenotazione/prenotazione_singola');
        echo view('templates/footer_loggedIn_users');
    }

    public function conferma_prenotazione_multipla() {
        session();

        echo view('templates/header_loggedIn');
        echo view('pages/prenotazione/prenotazione_multipla');
        echo view('templates/footer_loggedIn_users');
    }

    public function conferma_prenotazione() {
        session();
        $db = \Config\Database::connect();
    
        $email = $_SESSION['email'];
        $email_lab = $_SESSION['email_lab'];
        $id = $_SESSION['id'];
        $sql = $db->query("SELECT tipologia, orario_inizio, orario_fine, costo FROM test, laboratori WHERE test.email = laboratori.email AND laboratori.email = '" . $_SESSION['email_lab'] . "' ORDER BY tipologia;")->getResultArray()[$id];
        $orario_inizio = $sql['orario_inizio'];
        $orario_fine = $sql['orario_fine'];
        $tipologia = $sql['tipologia'];
    
        $data_prenotazione = $this->request->getVar('data_prenotazione');
        $hh = $this->request->getVar('hh');
        $mm = $this->request->getVar('mm');
        $orario = $hh . ":" . $mm;
    
        if($_SESSION['prenotazione'] === 'prenotazione_multipla') {
            $numero_prenotati = $this->request->getVar('numero_prenotati');
    
            if ($this->request->getMethod() === 'post' && $this->validate([
                'data_prenotazione' => 'required',
                'hh' => 'required|min_length[1]|max_length[2]',
                'mm' => 'required|min_length[1]|max_length[2]',
                'numero_prenotati' => 'required|min_length[1]|max_length[2]'
            ]) && strtotime($data_prenotazione) > strtotime('now') && strtotime($orario) > strtotime($orario_inizio)
               && strtotime($orario) < strtotime($orario_fine) && $numero_prenotati > 1 && $numero_prenotati <= 20)
    
            {
                $sql = $db->query("INSERT INTO prenotazioni VALUES ('" . $email_lab . "', '" . $email . "', '" . 
                                   $tipologia . "', '" . $data_prenotazione . "', '" . $hh . ":" . $mm . "', " . $numero_prenotati . ", 0, '');");
    
                unset($_SESSION['email_lab']);
                unset($_SESSION['id']);
                unset($_SESSION['prenotazione']);
                return redirect()->to('home');
    
            } else {
                return redirect()->to('conferma_prenotazione_multipla');
            }
    
        } else {
    
            if ($this->request->getMethod() === 'post' && $this->validate([
                'data_prenotazione' => 'required',
                'hh' => 'required|min_length[1]|max_length[2]',
                'mm' => 'required|min_length[1]|max_length[2]'
            ]) && strtotime($data_prenotazione) > strtotime('now') && strtotime($orario) > strtotime($orario_inizio)
            && strtotime($orario) < strtotime($orario_fine)) 

            {
                $questionario = '';

                if(isset($_FILES['questionario']['size']) && $_FILES['questionario']['size'] > 0) {
                    $uploadDir = 'C:/xampp/htdocs/sito-web/app/Views/pages/questionari/questionari';
                    $questionario = basename($_FILES['questionario']['name']);
                    $uploadedFile = $uploadDir . $questionario;
                    
                    if (file_exists($uploadedFile)) {
                        $temp = explode(".", basename($_FILES['questionario']['name']));
                        $uploadedFile = $temp[0];
                        
                        for ($i = 1; $i < count($temp)-1; $i++) {
                            $uploadedFile = $uploadedFile . '.' . $temp[$i]; 
                        }

                        $questionario = $uploadedFile . round(microtime(true)) . '.' . end($temp);
                        $uploadedFile = $uploadDir . $questionario;
                    }

                    
                    move_uploaded_file($_FILES['questionario']['tmp_name'], $uploadedFile);
                }
                
                $sql = $db->query("INSERT INTO prenotazioni VALUES ('" . $email_lab . "', '" . $email . "', '" . 
                $tipologia . "', '" . $data_prenotazione . "', '" . $hh . ":" . $mm . "', 1, 0, '" . $db->escapeString($questionario) . "');");

                unset($_SESSION['email_lab']);
                unset($_SESSION['id']);
                unset($_SESSION['prenotazione']);
                return redirect()->to('home');

            } else {
                return redirect()->to('conferma_prenotazione_singola');
            }
        }
    }

}