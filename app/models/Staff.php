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
            $this->db->query('SELECT staffs.user_id, users.username, users.created_at FROM staffs
                              INNER JOIN users
                              ON users.id=staffs.user_id');
            return $this->db->resultSet();
        } else {
            # code...
        }
    }

    public function getStaffById($user_id)
    {
        $this->db->query('SELECT * FROM staffs WHERR user_id=:user_id');
        $this->db->bind(':user_id', $user_id);

        return $this->db->single();
    }
}
