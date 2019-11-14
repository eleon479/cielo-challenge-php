<?php

class Users extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->helper('url_helper');
  }

  public function index() {
    $this->load->view('users/create');
  }
  public function create() {
    $this->load->view('users/create');
  }

  private function validateCreateRequest() {
    $rules = [
      'date' => function($date) { 
        return (bool) date_create($date);
      },
      'email' => function($email) { 
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
      },
      'required' => function($val) {
        if ($val == '') return false;
        else return true;
      }
    ];

    $fieldRuleSet = [
      'fullname' => ['required'],
      'dob' => ['required', 'date'],
      'email' => ['required', 'email'],
      'color' => ['required']
    ];

    foreach ($fieldRuleSet as $field => $fieldRules) {
      foreach ($fieldRules as $ruleType) {
        if (!$rules[$ruleType]($this->input->post($field))) {
          return FALSE;
        }
      }
    }

    return TRUE;
  }

  public function createNewUser() {
    // default: returned if validation fails
    $requestResponse = [
      'userCreated' => FALSE,
      'errorMessage' => 'Invalid or missing fields.'
    ];

    // begin validation
    if ($this->validateCreateRequest()) {
      try {
        $this->users_model->set_users();
        $requestResponse = [
          'userCreated' => TRUE,
          'errorMessage' => NULL
        ];
      } catch (Exception $e) {
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