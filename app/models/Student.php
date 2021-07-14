<?php
// namespace App\Models;
class Student
{
    private $db;

    /**
     * User constructor.
     * @param null $data
     */
    public function __construct()
    {
        $this->db = new Database;
    }
    //find user through email
    public function findUserByEmail($email)
    {
        // $this->db->bind(':email', $email);
        $this->db->query('SELECT * FROM users WHERE email= :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function login($email,  $password)
    {
        $this->db->query('SELECT *FROM users WHERE email=:email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    public function getUserbyId($user_id)
    {
        $this->db->query('SELECT * FROM users WHERE id= :user_id');
        $this->db->bind(':user_id', $user_id);

        $row = $this->db->single();
        return $row;
    }

    public function getStudentByRegNo($regNo)
    {
        $this->db->query('SELECT * FROM students WHERE regNo= :reg_no');
        $this->db->bind(':reg_no', $regNo);

        if ($row = $this->db->single()) {
            $row->data = $this->getUserbyId($row->user_id);
            return $row;
        } else {
            return false;
        }
    }

    public function getStudentProfile($user_id)
    {
        $this->db->query('SELECT * FROM students_profile WHERE user_id= :user_id');
        $this->db->bind(':user_id', $user_id);

        if ($row = $this->db->single()) {
            $row->data = $this->getUserbyId($row->user_id);
            return $row;
        } else {
            return false;
        }
    }

    public function getStudentsByFaculty($faculty_id, $level = null)
    {
        if (is_null($level)) {
            // $this->db->query('SELECT * FROM students_profile WHERE faculty_id= :faculty_id');
            $this->db->query('SELECT students.user_id, students.name, students.regNo AS reg_no, students_profile.faculty_id, students_profile.department_id, departments.name AS department
                              FROM students_profile
                              INNER JOIN students
                              ON students_profile.user_id=students.user_id
                              INNER JOIN departments
                              ON departments.id=students_profile.department_id
                              WHERE students_profile.faculty_id= :faculty_id');
            $this->db->bind(':faculty_id', $faculty_id);
        } else {
            $this->db->query('SELECT students.user_id, students.name, students.regNo AS reg_no, students_profile.faculty_id, students_profile.department_id, departments.name AS department
                              FROM students_profile
                              INNER JOIN students
                              ON students_profile.user_id=students.user_id
                              INNER JOIN departments
                              ON departments.id=students_profile.department_id
                              WHERE students_profile.faculty_id= :faculty_id AND level=:level');
            $this->db->bind(':faculty_id', $faculty_id);
            $this->db->bind(':level', $level);
        }


        return $this->db->resultSet();
    }


    public function getStudentsByDepartment($department_id, $level = null)
    {
        if (is_null($level)) {
            // $this->db->query('SELECT * FROM students_profile WHERE faculty_id= :faculty_id');
            $this->db->query('SELECT students.user_id, students.name, students.regNo AS reg_no, students_profile.faculty_id, students_profile.department_id, departments.name AS department
                              FROM students_profile
                              INNER JOIN students
                              ON students_profile.user_id=students.user_id
                              INNER JOIN departments
                              ON departments.id=students_profile.department_id
                              WHERE students_profile.department_id= :department_id');
            $this->db->bind(':department_id', $department_id);
        } else {
            $this->db->query('SELECT students.user_id, students.name, students.regNo AS reg_no, students_profile.faculty_id, students_profile.department_id, departments.name AS department
                              FROM students_profile
                              INNER JOIN students
                              ON students_profile.user_id=students.user_id
                              INNER JOIN departments
                              ON departments.id=students_profile.department_id
                              WHERE students_profile.department_id= :department_id AND level=:level');
            $this->db->bind(':department_id', $department_id);
            $this->db->bind(':level', $level);
        }


        return $this->db->resultSet();
    }

    public function getCourses($level)
    {
        $this->db->query('SELECT * FROM courses WHERE level= :level');
        $this->db->bind(':level', $level);


        return $this->db->resultSet();
    }


    public function getAllStudents($limit = null)
    {
        if (is_null($limit)) {
            $this->db->query('SELECT students.user_id, students.name, students.regNo AS reg_no, students_profile.faculty_id, students_profile.department_id, departments.name AS department
            FROM students_profile
            INNER JOIN students
            ON students_profile.user_id=students.user_id
            INNER JOIN departments
            ON departments.id=students_profile.department_id
            ');
            return $this->db->resultSet();
        } else {
            # code...
        }
    }

    public function getStudentByUserId($id)
    {

        $this->db->query('SELECT students.user_id, students.name, students.regNo AS reg_no, students_profile.faculty_id, students_profile.department_id, students_profile.paid_fees, students_profile.paid_hostel_fees, students_profile.level, students_profile.gpa, departments.name AS department, faculties.name AS faculty
            FROM students_profile
            INNER JOIN students
            ON students_profile.user_id=students.user_id
            INNER JOIN departments
            ON departments.id=students_profile.department_id
            INNER JOIN faculties
            ON faculties.id=students_profile.faculty_id
            WHERE students.user_id=:user_id
            ');

        $this->db->bind(":user_id", $id);
        return $this->db->single();
    }

    public function getScores($id)
    {
        $this->db->query("SELECT student_courses.score, student_courses.course_id, courses.name FROM student_courses
                          INNER JOIN courses
                          ON courses.id=student_courses.course_id
                          WHERE user_id=:user_id");
        $this->db->bind(":user_id", $id);

        return $this->db->resultSet();
    }
}
