<?php

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index() { $this->load->view('users/create'); }
  public function create() { $this->load->view('users/create'); }

  private function validateCreateRequest()
  {
    return TRUE;
  }

  public function createNewUser()
  {
    if (validateCreateRequest())
    $this->users_model->set_users();
  }

}

?>