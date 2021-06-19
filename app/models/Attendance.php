<?php

// namespace App\Models;

class Attendance
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
    public function addAttendance($data)
    {
        $this->db->query(
            "INSERT INTO attendance (name, course_id, week) VALUES(:name, :course_id, :week)"
        );

        $this->db->bind(":name", $data['name']);
        $this->db->bind(":course_id", $data['course_id']);
        $this->db->bind(":week", $data['week']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
