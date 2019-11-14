<?php

class Users_model extends CI_Model {
  public function __construct()
  {
    $this->load->database();
  }

  public function set_users()
  {
    $data = array(
      'fullname' => $this->input->post('fullname'),
      'dob' => $this->input->post('dob'),
      'email' => $this->input->post('email'),
      'color' => $this->input->post('color')
    );

    return $this->db->insert('users', $data);
  }
}

?>