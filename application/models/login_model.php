<?php

class Login_model extends CI_model
{

    public function auth_admin()
    {
        return $this->db->get_where('user', ['username' => 'admin']);
    }
    public function auth_user($username)
    {
        return $this->db->get_where('user', ['username' => $username]);
    }
}
