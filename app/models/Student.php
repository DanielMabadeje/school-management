<?php
// namespace App\Models;
class Student
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
        $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
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

    public function getStudentByRegNo($regNo)
    {
        $this->db->query('SELECT * FROM students WHERE regNo= :reg_no');
        $this->db->bind(':reg_no', $regNo);

        if ($row = $this->db->single()) {
            $row->data = $this->getUserbyId($row->user_id);
            return $row;
        } else {
            return false;
        }
    }

    public function getStudentProfile($user_id)
    {
        $this->db->query('SELECT * FROM students_profile WHERE user_id= :user_id');
        $this->db->bind(':user_id', $user_id);

        if ($row = $this->db->single()) {
            $row->data = $this->getUserbyId($row->user_id);
            return $row;
        } else {
            return false;
        }
    }

    public function getStudentsByFaculty($faculty_id, $level = null)
    {
        if (is_null($level)) {
            $this->db->query('SELECT * FROM students_profile WHERE faculty_id= :faculty_id');
            $this->db->bind(':faculty_id', $faculty_id);
        } else {
            $this->db->query('SELECT * FROM students_profile WHERE faculty_id= :faculty_id AND level=:level');
            $this->db->bind(':faculty_id', $faculty_id);
            $this->db->bind(':level', $level);
        }


        return $this->db->resultSet();
    }

    public function getCourses($level)
    {
        $this->db->query('SELECT * FROM courses WHERE level= :level');
        $this->db->bind(':level', $level);


        return $this->db->resultSet();
    }
}
