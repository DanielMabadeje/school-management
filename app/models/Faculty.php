<?php

// namespace App\Models;

class Faculty
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

    public function getFaculty()
    {
        $this->db->query("SELECT * FROM faculty");
        return $this->db->resultSet();
    }
}
