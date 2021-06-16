<?php

// namespace App\Models;

class Staff
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

    public function getAllStaff($limit = null)
    {
        if (is_null($limit)) {
            $this->db->query('SELECT * FROM staffs');
            return $this->db->resultSet();
        } else {
            # code...
        }
    }
}
