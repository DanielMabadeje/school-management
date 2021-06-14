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
    }
    public function Index()
    {

        $this->view('admin/index');
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
                'name' => '',
                'description' => '',
                'course_id' => '',
                'department_id' => ''
            ];
        } else {
            $this->view('admin/addExam');
        }
    }

    public function addStaff()
    {
        # code...
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
}
