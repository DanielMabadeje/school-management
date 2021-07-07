<?php

// namespace App\Models;

class Guardian
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

    public function getStudentByParent($parent_id)
    {
        $this->db->query("SELECT * FROM guardians WHERE parent_id=$parent_id");

        return $this->db->single();
    }
}
