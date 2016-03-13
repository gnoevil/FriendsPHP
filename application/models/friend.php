<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends CI_Model {

  public function add($user)
  {
    date_default_timezone_set('America/New_York');
    $now = date("y-m-d, H:i:s");
    $query = "INSERT INTO friendships (user_id, friend_id, created_at, updated_at) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id);";
    $values = array($user['user_id'], $user['friend_id'], $now, $now);
    return $this->db->query($query, $values);
  }

  public function get_by_id($id)
  {
     $query = "SELECT alias, friend_id FROM friendships
              LEFT JOIN users ON users.id=friendships.friend_id
              WHERE user_id=?
              AND friendships.friend_id != ?";

    $values = array($id, $id);

    return $this->db->query($query, $values)->result_array();
  }

   public function get_others_by_id($id)
  {
    $query = "SELECT alias, users.id AS id FROM users WHERE users.id NOT IN
    (SELECT friend_id FROM friendships WHERE user_id= ?) AND users.id != ?";
    $values = array($id, $id);
    return $this->db->query($query, $values)->result_array();
  }
  public function remove($friendship)
  {
    $query = "DELETE FROM friendships WHERE user_id = ? AND friend_id = ?";
    $values = array($friendship['user_id'], $friendship['friend_id']);
    return $this->db->query($query, $values);
  }
   
}



