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
        $this->db->query('INSERT INTO users (memberId, username, email, password, groupId) VALUES(:memberId, :username, :email, :password, :groupId)');
        $this->db->bind(':username', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':memberId', $data['memberId']);
        $this->db->bind(':groupId', $data['groupId']);

        if ($this->db->execute()) {
            $user_id = $this->db->lastId();
            return $user_id;
        } else {
            return false;
        }
    }
    public function addStaff($data)
    {

        $user_id = $this->addUser($data);
        $this->db->query('INSERT INTO staffs (user_id, department_id) VALUES(:user_id, :department_id)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':department_id', $data['department_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addStudent($data)
    {
        $user_id = $this->addUser($data);
        $this->db->query('INSERT INTO students (user_id, regNo, name) VALUES(:user_id, :regno, :name)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':regno', $data['regno']);
        $this->db->bind(':name', $data['name']);


        if ($this->db->execute()) {
            $data['user_id'] = $user_id;
            if ($this->addStudentProfile($data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function addStudentProfile($data)
    {
        $this->db->query('INSERT INTO students_profile (user_id, reg_no, faculty_id, department_id, level, gpa) VALUES(:user_id, :regno, :faculty_id, :department_id, :level, :gpa)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':regno', $data['regno']);
        $this->db->bind(':faculty_id', $data['faculty_id']);
        $this->db->bind(':department_id', $data['department_id']);
        $this->db->bind(':level', $data['level']);
        $this->db->bind(':gpa', $data['gpa']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editStudentGPA($data)
    {
        $this->db->query('UPDATE students_profile set gpa=:gpa WHERE student_id=:user_id');
        $this->db->bind(':user_id', $data['student_id']);
        $this->db->bind(':gpa', $data['gpa']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
