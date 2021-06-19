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
            "INSERT INTO attendance
            "
        );
    }
}
