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
        $this->testModel = $this->model('Test');
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
    public function attendance($attendance_id = null)
    {
        if (is_null($attendance_id)) {
            $data['attendance'] = $this->attendanceModel->getAttendance();
            $this->view('staffs/attendance', $data);
        } else {

            $data['attendance'] = $this->attendanceModel->getAttendanceList($attendance_id);
            $this->view('staffs/attendanceview');
        }
    }

    public function test($test_id = null)
    {
        if (is_null($test_id)) {

            $data['test'] = $this->testModel->getTests();
            $this->view('staffs/test', $data);
        } else {
            $this->view('staffs/testview');
        }
    }

    public function addTest()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'course_id' => $_POST['course'],
                'department_id' => $_POST['department_id'],
                'date' => $_POST['date'],
                'time' => $_POST['time'],
            ];
            if ($this->testModel->addTest($data)) {
                redirect('staffs/test');
            } else {
                # code...
            }
        } else {

            
            $this->view('staffs/addtest');
        }
    }

    public function exams( $exam_id=null)
    {
        if (is_null($exam_id)) {

            $data['exam'] = $this->examModel->getExams();
            $this->view('staffs/exam', $data);
        } else {
            $this->view('staffs/testview');
        }
    }

    public function addExam()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'course_id' => $_POST['course'],
                'department_id' => $_POST['department_id'],
                'date' => $_POST['date'],
                'time' => $_POST['time'],
            ];
            if ($this->examModel->addExam($data)) {
                redirect('staffs/exams');
            } else {
                # code...
            }
        } else {

            
            $this->view('staffs/addExam');
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
