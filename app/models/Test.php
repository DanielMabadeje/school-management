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

        $this->db->query('INSERT INTO tests (name, description, course_id, department_id, date, time) VALUES(:name, :description, :course_id, :department_id, :date, :time)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':department_id', $data['department_id']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':time', $data['time']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTests()
    {
        $this->db->query('SELECT * FROM tests');
        return $this->db->resultSet();
    }
}
