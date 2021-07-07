<?php

// namespace App\Models;

class Admin
{
    private $db;

    /**
     * Post constructor.
     * @param null $data
     */
    public function __construct()
    {
        $this->db = new Database;
    }


    public function addUser($data)
    {
        $this->db->query('INSERT INTO users (memberId, username, email, password, groupId) VALUES(:email, :password)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':memberId', $data['memberId']);
        $this->db->bind(':groupId', $data['groupId']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function addStaff($data)
    {

        $this->addUser($data);
        $this->db->query('INSERT INTO staffs (user_id, department_id) VALUES(:user_id, :department_id)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
    }
}
