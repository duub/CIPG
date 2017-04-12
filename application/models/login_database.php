<?php

Class Login_Database extends CI_Model {

  // Insert registration data in database
  public function registration_insert($data) {

    // Query to check whether username already exist or not
    $condition = "user_name =" . "'" . $data['user_name'] . "'";
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      $data['user_password'] = password_hash($data['user_password'], PASSWORD_BCRYPT);
      // Query to insert data in database
      $this->db->insert('user', $data);
      if ($this->db->affected_rows() > 0) {
        return true;
      }
    } else {
      return false;
    }
  }

  // Read data using username and password
  public function login($data) {

    $condition = "user_name =" . "'" . $data['username'] . "'";
    $this->db->select('user_password');
    $this->db->from('user');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    $row = $query->row();

    if ($query->num_rows() == 1 && password_verify ( $data['password'] , $row->user_password )) {
      return true;
    } else {
      return false;
    }
  }

  // Read data from database to show data in admin page
  public function read_user_information($username) {

    $condition = "user_name =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }

}

?>
