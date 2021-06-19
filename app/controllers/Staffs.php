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
        $this->attendanceModel = $this->model('Attendance');
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
        if (is_null($course_id)) {
            $data['attendance'] = $this->attendanceModel->getAttendance();
            $this->view('staffs/attendance', $data);
        } else {
            $this->view('staffs/attendanceview');
        }
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

            if ($this->attendanceModel->addAttendance($data)) {
                redirect('staffs/attendance');
            } else {
                # code...
            }
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
