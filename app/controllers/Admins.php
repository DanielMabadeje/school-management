<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Admins extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn() && $_SESSION['membership_group'] !== "admin") {
            redirect('/');
        }
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
        $this->staffModel = $this->model('Staff');
        $this->examModel = $this->model('Exam');
        $this->attendanceModel = $this->model('Attendance');
        $this->testModel = $this->model('Test');
        $this->courseModel = $this->model('Course');
    }
    public function Index()
    {
        $data = [];
        $students = $this->getStudents();
        $data['students'] = $students;
        $data['staff'] = $this->getStaffs();
        $data['stats'] = $this->stats();
        $data['exams'] = $this->getExams();
        $data['tests'] = $this->getTests();
        $this->view('admin/index', $data);
    }


    public function addCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [];
        } else {
            $this->view('admin/addCourse');
        }
    }
    public function addStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # code...
        } else {
            $this->view('admin/addStudent');
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
                flash('add_exam_success', 'Tests Added successfully');
                redirect('admins');
            } else {
                # code...
            }
        } else {


            $data['courses'] = $this->getCourses();
            $this->view('admin/addTest', $data);
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
                flash('add_exam_success', 'Exams Added successfully');
                redirect('/');
            } else {
                # code...
            }
        } else {
            $this->view('admin/addExam');
        }
    }

    public function addStaff()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'course_id' => trim($_POST['course']),
                'department_id' => trim($_POST['department'])
            ];

            if ($this->examModel->addExam($data)) {
                redirect('/');
            } else {
                # code...
            }
        } else {
            $this->view('admin/addStaff');
        }
    }

    public function getExam()
    {

        $data = [];
        $data['exams'] = $this->getExams();
        $this->view('admin/viewExams', $data);
    }

    public function getTest()
    {

        $data = [];
        $data['tests'] = $this->getTests();
        $this->view('admin/viewTests', $data);
    }
    public function studentView()
    {
        # code...
    }

    public function settings()
    {
        # code...
    }

    public function editProfile()
    {
        # code...
    }

    private function getStudents($limit = 10)
    {
        $data = $this->studentModel->getAllStudents();
        return $data;
    }

    private function getStaffs()
    {
        $data = $this->staffModel->getAllStaff();
        return $data;
    }

    private function stats()
    {
        $data = [];
        $data['allUsers'] = $this->userModel->getUsers(true);
        $data['activeUsers'] = $this->userModel->getActiveUsers(true);
        $data['bannedUsers'] = $this->userModel->getBannedUsers(true);


        return $data;
    }

    private function getExams()
    {
        $data = $this->examModel->getExams();
        return $data;
    }
    private function getTests()
    {
        $data = $this->testModel->getTests();
        return $data;
    }

    private function getCourses()
    {
        $data = $this->courseModel->getCourses();
        return $data;
    }
}
