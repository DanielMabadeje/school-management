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
        $user = $this->getProfile($_SESSION['user_id']);
        $students = $this->studentModel->getStudentsByDepartment($user->department_id);
        // var_dump($students);
        // die;
        $data['students'] = $students;
        $this->view('staffs/students', $data);
    }
    public function attendance($course_id = null)
    {
        $this->view('staffs/attendance');
    }

    public function getProfile($user_id)
    {
        $this->checkIfStaffIsLoggedIn();
        $data = $this->staffModel->getStaffById($user_id);
        return $data;
    }

    public function addAttendance()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'name' => $_POST['name'],
                'course_id' => $_POST['course'],
                'week' => $_POST['week']

            ];
        } else {
            $this->view('staffs/addattendance');
        }
    }

    private function checkIfStaffIsLoggedIn()
    {
        if (isLoggedIn()) {

            if ($_SESSION['membership_group'] !== 'staff') {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }
}
