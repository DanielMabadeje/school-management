<?php

// namespace App\Models;

class Exam
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
    public function addExam($data)
    {
        var_dump($data);
    }
}
