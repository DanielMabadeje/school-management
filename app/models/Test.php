<?php

// namespace App\Models;

class Test
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
    public function addTest($data)
    {
        // var_dump($data);

        $this->db->query('INSERT INTO tests (name, description, course_id, department_id, date) VALUES(:name, :description, :course_id, :department_id, :date)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':department_id', $data['department_id']);
        $this->db->bind(':date', $data['date']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getExams()
    {
        $this->db->query('SELECT * FROM tests');
        return $this->db->resultSet();
    }
}
