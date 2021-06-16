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
        $this->examModel = $this->model('Exam');
    }
    public function Index()
    {
        $data = [];
        $students = $this->getStudents();
        $data['students'] = $students;
        $this->view('admin/index', $data);
    }

    public function addStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # code...
        } else {
            $this->view('admin/addStudent');
        }
    }

    public function addExam()
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
}
