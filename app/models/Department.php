<?php

// namespace App\Models;

class Department
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

    public function getDepartment()
    {
        $this->db->query("SELECT * FROM departments");
        return $this->db->resultSet();
    }
}
