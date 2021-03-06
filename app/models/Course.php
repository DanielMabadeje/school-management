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

    public function getCoursesByLevel($level)
    {
        $this->db->query("SELECT * FROM courses WHERE level=:level");
        $this->db->bind(":level", $level);
        return $this->db->resultSet();
    }

    public function addCourse($data)
    {
        $this->db->query("INSERT INTO courses (name, department, level, description) VALUES(:name, :department, :level, :description)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':department', $data['department']);
        $this->db->bind(':level', $data['level']);
        $this->db->bind(':description', $data['description']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCourseById($id)
    {
        $this->db->query("SELECT * FROM courses WHERE id=:id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
}
