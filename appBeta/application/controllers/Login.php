<?php
class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
    $this->load->helper('url_helper');
  }

  public function index()
  {
    $data['login'] = $this->login_model->get_login();
    $data['title'] = 'Login archive';

    $this->load->view('templates/header', $data);
    $this->load->view('login/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($slug = NULL)
  {
    $data['login_item'] = $this->login_model->get_login($slug);

    if (empty($data['login_item']))
    {
      show_404();
    }

    $data['title'] = $data['login_item']['title'];

    $this->load->view('templates/header', $data);
    $this->load->view('login/view', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a login item';



    $this->form_validation->set_rules('nome', 'Nome', 'required');
    $this->form_validation->set_rules('cognome', 'Cognome', 'required');
    $this->form_validation->set_rules('dataDiNascita', 'DataDiNascita', 'required');
    $this->form_validation->set_rules('codiceFiscale', 'CodiceFiscale', 'required');
    $this->form_validation->set_rules('luogoDiResidenza', 'LuogoDiResidenza', 'required');
    $this->form_validation->set_rules('indirizzo', 'Indirizzo', 'required');
    $this->form_validation->set_rules('cap', 'Cap', 'required');
    $this->form_validation->set_rules('telefono', 'Telefono', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');

    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confPassword', 'ConfPassword', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header', $data);
      $this->load->view('login/create');
      $this->load->view('templates/footer');

    }
    else
    {
      $this->login_model->set_login();
      $this->load->view('login/success');
    }
  }
}
