<?php

// namespace App\Models;

class Exam
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
    public function addExam($data)
    {
        // var_dump($data);

        $this->db->query('INSERT INTO exams (name, description, course_id, department_id) VALUES(:name, :description, :course_id, :department_id)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':department_id', $data['department_id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
