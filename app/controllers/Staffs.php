<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Staffs extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn() && $_SESSION['membership_group'] !== "staff") {
            redirect('/');
        }
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
        $this->staffModel = $this->model('Staff');
        $this->examModel = $this->model('Exam');
    }

    public function index()
    {
        $this->view('staffs/index');
    }


    public function students()
    {

        // $this->checkIfStudentIsLoggedIn();
        // $user = $this->getProfile($_SESSION['user_id']);
        $students = $this->studentModel->getStudentsByDepartment($user->faculty_id);
        // var_dump($students);
        // die;
        $data['students'] = $students;
        $this->view('staffs/students', $data);
    }
    public function attendance($course_id = null)
    {
        $this->view('staffs/attendance');
    }
}
