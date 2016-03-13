<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
   
  }

  public function index()
  {

    $this->load->view('main/index');
  }

  public function register()
  {
    //var_dump();
   // die('post happened');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('alias', 'Alias', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[passconf]');
    $this->form_validation->set_rules('passconf', 'Confirm Password', 'required');
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required');

    if (!$this->form_validation->run())
    {
      $this->session->set_flashdata('registration_errors', validation_errors());
      redirect('/');
    }
    else
    {
      $post = $this->input->post();

      $salt = bin2hex(openssl_random_pseudo_bytes(22));

      $encrypted_password = crypt($post['password'], $salt);

      $post['password'] = $encrypted_password;

      if($this->User->add($post))
      {
        // echo "registration complete!";
        $id = $this->db->insert_id();
        $this->session->set_userdata('signed_in', $id);
        redirect('/friends');
      }

    }
  }

  public function login()
  {
   
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('login_errors', validation_errors());
      redirect('/');
    }
    else
    {
      $dbPass = $this->User->get_by_email($this->input->post('email'));
      $post = $this->input->post();

      $encrypted_password = crypt($post['password'], $dbPass['password']);

      if($dbPass['password'] == $encrypted_password)
      {
        //echo "you logged in!!";
        $this->session->set_userdata('signed_in', $dbPass['id']);
        redirect('/friends');
      }
      else
      {
        $this->session->set_flashdata('errors', "<p>Invalid Login Credentials</p>");
        redirect('/');
      }

    }
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/');
  }
  

}









