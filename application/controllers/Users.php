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
    // default: returned if validation fails
    $requestResponse = [
      'userCreated' => FALSE,
      'errorMessage' => 'Invalid or missing fields.'
    ];
    
    // begin validation
    if ($this->validateCreateRequest())
    {
      try
      {
        $this->users_model->set_users();
        $requestResponse = [
          'userCreated' => TRUE,
          'errorMessage' => NULL
        ];
      }
      catch (Exception $e)
      {
        // something went wrong with model / data layer
        $requestResponse = [
          'userCreated' => FALSE,
          'errorMessage' => 'Internal server error...:('
        ];
      }
    }

    echo json_encode($requestResponse);
  }

}

?>