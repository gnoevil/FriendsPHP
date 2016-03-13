<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

  public function add($user)
  {
    date_default_timezone_set('America/New_York');
    $now = date("y-m-d, H:i:s");
    $query = "INSERT INTO users (name, alias, email, password, dob, created_at, updated_at) VALUES (?,?,?,?,?,?,?);";
    $values = array($user['name'], $user['alias'], $user['email'], $user['password'], $user['dob'], $now, $now);

    return $this->db->query($query, $values);
  }

  public function get_by_email($email)
  {
    $query = "SELECT password, id FROM users WHERE email=?;";
    $values = $email;
    return $this->db->query($query, $values)->row_array();
  }

   public function get_by_id($id)
  {
    $query = "SELECT * FROM users WHERE id=?;";
    $values = $id;
    return $this->db->query($query, $values)->row_array();
  }
   
}









