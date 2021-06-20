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

    public function getAttendance($course_id = null)
    {
        if (is_null($course_id)) {
            $this->db->query("SELECT * FROM attendance");
        } else {
            # code...
        }

        return $this->db->resultSet();
    }

    public function getAttendanceList($attendance_id)
    {
        $this->db->query("SELECT * FROM attendance_list WHERE attendance_id=:attendance_id");
        $this->db->bind(":attendance_id", $attendance_id);

        return $this->db->resultSet();
    }

    public function addStudentToAttendance($attendance_id, $reg_no)
    {
        $this->db->query("INSERT INTO attendance_list (attendance_id, student_reg_no) VALUES (:attendance_id, :reg_no)");
        $this->db->bind(":attendance_id", $attendance_id);
        $this->db->bind(":reg_no", $reg_no);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAttendanceById($id)
    {
        $this->db->query("SELECT * FROM attendance WHERE id=:attendance_id");
        $this->db->bind(":attendance_id", $id);

        return $this->db->single();
    }
}
