<?php
class Login_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_login($slug = FALSE)
  {
    if ($slug === FALSE)
    {
      $query = $this->db->get('login3');
      return $query->result_array();
    }

    $query = $this->db->get_where('login', array('slug' => $slug));
    return $query->row_array();
  }

  public function set_login()
  {
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
      'nome' => $this->input->post('nome'),
      'cognome' => $this->input->post('cognome'),
      'dataDiNascita' => $this->input->post('dataDiNascita'),
      'luogoDiNascita' => $this->input->post('luogoDiNascita'),
      'codiceFiscale' => $this->input->post('codiceFiscale'),
      'luogoDiResidenza' => $this->input->post('luogoDiResidenza'),
      'indirizzo' => $this->input->post('indirizzo'),
      'cap' => $this->input->post('cap'),
      'telefono' => $this->input->post('telefono'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'confPassword' => $this->input->post('confPassword'),
      'slug' => $slug,
    );

    return $this->db->insert('login3', $data);
  }
}
