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
        if (isLoggedIn()) {
            // redirect('posts');
            // if ($_SESSION['membershipId'] == 'student') {
            //     // redirect('posts');
            // }

            switch ($_SESSION['membership_group']) {
                case 'student':
                    redirect('students');
                    break;
                case 'staff':
                    redirect('staffs');
                    break;
                case 'admin':
                    redirect('admins');
                    break;

                default:
                    # code...
                    break;
            }
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //process form 

                //sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];
                // validate email


                // Validate e-mail
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        //user found
                    } else {
                        $data['email_err'] = 'no user found';
                        // die('hi');
                    }
                    // echo ("$email is a valid email address");
                } elseif ($student = $this->studentModel->getStudentByRegNo($data['email'])) {
                    // echo ("$email is not a valid email address");
                    $data['email'] = $student->data->email;
                } else {
                    $data['email_err'] = 'no user found';
                    // die('hif');
                }



                //Make sure errors are empty
                if (empty($data['email_err']) && empty($data['password_err'])) {
                    //validated
                    //check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if ($loggedInUser) {
                        //create session
                        // var_dump($loggedInUser, $student->data);
                        // die;
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password Incorrect';


                        flashfail('login_fail', 'Unable To Login');
                        $this->view('users/login', $data);
                    }
                    #..
                } else {
                    //load view with errors
                    flashfail('login_fail', 'Unable To Login');
                    $this->view('users/login', $data);
                }
            } else {
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
                $this->view('pages/index', $data);
            }
        }
    }


    public function  createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['membership_group'] = $user->memberId;

        switch ($user->memberId) {
            case 'student':
                redirect('students');
                break;
            case 'staff':
                redirect('staffs');
                break;
            case 'admin':
                redirect('admins');
                break;

            default:
                # code...
                break;
        }
        // redirect('posts');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}
