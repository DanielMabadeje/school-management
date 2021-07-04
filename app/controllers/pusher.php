<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class pusher extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
    }

    public function Index()
    {
        $this->view("map/index");
    }

    public function auth(){
        $data=[
            "auth"=>"9a3f71f9e4863b13493f:58df8b0c36d6982b82c3ecf6b4662e34fe8c25bba48f5369f135bf843651c3a4"
        ];

        die(
          json_encode($data)
        );
    }
}
