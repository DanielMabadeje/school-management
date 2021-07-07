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
        $this->db->query("SELECT * FROM guardians WHERE parent_id=:parent_id");
        $this->db->bind(":parent_id", $parent_id);



        $row = $this->db->single();
        // $row = $this->db->resultSet();

        // var_dump($row);
        // die;
        return $row->student_id;
    }
}
