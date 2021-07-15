<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Maps extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
    }

    public function Index()
    {
$this->checkIfParentIsLoggedIn();
        $this->view("map/index");
    }
private function checkIfParentIsLoggedIn()
    {
        if (isLoggedIn()) {

            if ($_SESSION['membership_group'] !== 'parent' || $_SESSION['membership_group'] !== 'admin') {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

}
