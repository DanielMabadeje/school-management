<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
    }
    public function about()
    {
        $data = [
            'title' => 'About',
            'description' => "App to share posts"
        ];
        $this->view('pages/about', $data);
    }
    public function Index()
    {
    }
}
