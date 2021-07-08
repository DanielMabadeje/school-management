<?php
class Students extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
        $this->staffModel = $this->model('Staff');
        $this->examModel = $this->model('Exam');
        $this->attendanceModel = $this->model('Attendance');
        $this->testModel = $this->model('Test');
        $this->courseModel = $this->model('Course');
        $this->departmentModel = $this->model('Department');
    }

    public function Index()
    {
        $this->checkIfStudentIsLoggedIn();
        $this->view('students/index');
    }

    public function courses($course_id = null)
    {
        $this->checkIfStudentIsLoggedIn();
        if (is_null($course_id)) {
            $user = $this->getProfile($_SESSION['user_id']);
            $courses = $this->studentModel->getCourses($user->level);
            $data['courses'] = $courses;
            $this->view('students/courses', $data);
        } else {
            # code...
        }
    }

    public function gpa()
    {
        $profile = $this->studentModel->getStudentProfile($_SESSION['user_id']);
        $data['gpa'] = $profile->gpa;

        $this->view("students/gpa", $data);
    }

    public function exams($exam_id = null)
    {
        if (is_null($exam_id)) {

            $data['exam'] = $this->examModel->getExams();
            $this->view('students/exams', $data);
        } else {
            $this->view('students/testview');
        }
    }

    public function tests($test_id = null)
    {
        if (is_null($test_id)) {

            $data['test'] = $this->testModel->getTests();
            $this->view('students/test', $data);
        } else {
            $this->view('students/testview');
        }
    }

    public function students()
    {

        $this->checkIfStudentIsLoggedIn();


        if (isset($_GET['byfaculty']) && $_GET['byfaculty'] == "true") {
            $user = $this->getProfile($_SESSION['user_id']);
            $students = $this->studentModel->getStudentsByFaculty($user->faculty_id);
            // var_dump($students);
            // die;
            $data['students'] = $students;
            $this->view('students/students', $data);
        } else {
            // $user = $this->getProfile($_SESSION['user_id']);
            $students = $this->studentModel->getAllStudents();
            // var_dump($students);
            // die;
            $data['students'] = $students;
            $this->view('students/students', $data);
        }
    }


    public function attendance($attendance_id = null)
    {
        $this->checkIfStudentIsLoggedIn();
        $user = $this->getProfile($_SESSION['user_id']);

        if (is_null($attendance_id)) {
            $data['attendance'] = $this->attendanceModel->getAttendance();

            $this->view('students/attendance', $data);
        } else {

            $data['attendance_id'] = $attendance_id;
            $data['attendance'] = $this->attendanceModel->getAttendanceList($attendance_id);
            $data['current_attendance'] = $this->attendanceModel->getAttendanceById($attendance_id);
            $data['current_attendance']->course_name = $this->getCourseById($data['current_attendance']->course_id);
            $data['students'] = $this->getStudents();
            $this->view('students/attendanceview', $data);
        }
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form 

            //sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // validate name

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter email';
            }
            //Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'email already taken';
                }
            }

            //Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must have 6 characters';
            }

            // Validate Confirm Password

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                //validated
                // die('success');
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are Registered Successfully');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
                #..
            } else {
                //load view with errors
                $this->view('users/register', $data);
            }
        } else {
            //Load Form
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            //Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            //Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            //Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                //user found
            } else {
                $data['email_err'] = 'no user found';
            }

            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                //validated
                //check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    //create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password Incorrect';

                    $this->view('users/login', $data);
                }
                #..
            } else {
                //load view with errors
                $this->view('users/login', $data);
            }
            #..
        } else {
            //Load Form
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('users/login', $data);
        }
    }
    public function  createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('/');
    }


    public function getProfile($user_id)
    {
        $this->checkIfStudentIsLoggedIn();
        $data = $this->studentModel->getStudentProfile($user_id);
        return $data;
    }
    private function checkIfStudentIsLoggedIn()
    {
        if (isLoggedIn()) {

            if ($_SESSION['membership_group'] !== 'student') {
                redirect('/');
            }
        } else {
            redirect('/');
        }
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
    private function getDepartments()
    {
        $data = $this->departmentModel->getDepartment();
        return $data;
    }

    private function getStudents($limit = 10)
    {
        $data = $this->studentModel->getAllStudents();
        return $data;
    }
    public function getCourseById($id)
    {
        $data = $this->courseModel->getCourseById($id);
        return $data;
    }
}
