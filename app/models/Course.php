<?php

// namespace App\Models;

class Course
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

    public function getCourses()
    {
        $this->db->query("SELECT * FROM courses");
        return $this->db->resultSet();
    }

    public function addCourse(Type $var = null)
    {
        # code...
    }
}
