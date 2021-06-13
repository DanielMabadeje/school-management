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
    }

    public function index()
    {
        # code...
    }
}