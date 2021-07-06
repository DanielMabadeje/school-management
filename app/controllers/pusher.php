<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Pusher extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
        header('Content-type: application/json; charset=utf-8');
    }

    public function Index()
    {
        $this->view("map/index");
    }

    public function auth()
    {


        // 131928.7777463
        // hash_hmac('sha256', $string, $secret);
        // $decode_string=hash_hmac('sha256', $_COOKIE['pusher_private'], "secret");
        $decode_string=hash_hmac('sha256', $_POST['socket_id'].':'.$_COOKIE['pusher_private'], "3293b4a15359d4d3c8bf");
        $data = [
            "auth" => "9a3f71f9e4863b13493f:".$decode_string
        ];

        die(json_encode($data));
    }
}
