<?php
// namespace App\Models;
class User
{
    private $db;

    /**
     * User constructor.
     * @param null $data
     */
    public function __construct()
    {
        $this->db = new Database;
    }
    //find user through email
    public function findUserByEmail($email)
    {
        // $this->db->bind(':email', $email);
        $this->db->query('SELECT * FROM users WHERE email= :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (email, password) VALUES(:email, :password)');
        // $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function login($email,  $password)
    {
        $this->db->query('SELECT *FROM users WHERE email=:email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    public function getUserbyId($user_id)
    {
        $this->db->query('SELECT * FROM users WHERE id= :user_id');
        $this->db->bind(':user_id', $user_id);

        $row = $this->db->single();
        return $row;
    }

    public function getUsers($count = false)
    {
        if ($count) {
            $this->db->query('SELECT COUNT(id) AS count FROM users');
        } else {
            $this->db->query('SELECT * FROM users');
        }
        return $this->db->resultSet();
    }

    public function getActiveUsers($count = false)
    {
        if ($count) {
            $this->db->query('SELECT COUNT(id) AS count FROM users WHERE isApproved=:isApproved');
        } else {
            $this->db->query('SELECT * FROM users WHERE isApproved=:isApproved');
        }
        $this->db->bind(':isApproved', 1);

        return $this->db->resultSet();
    }

    public function getBannedUsers($count = false)
    {
        if ($count) {
            $this->db->query('SELECT COUNT(id) AS count FROM users WHERE isBanned=:isBanned');
        } else {
            $this->db->query('SELECT * FROM users WHERE isBanned=:isBanned');
        }
        $this->db->bind(':isBanned', 1);

        return $this->db->resultSet();
    }
}
