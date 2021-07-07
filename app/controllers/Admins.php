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
        $this->adminModel = $this->model('Admin');
        $this->testModel = $this->model('Test');
        $this->courseModel = $this->model('Course');
        $this->departmentModel = $this->model('Department');
        $this->facultyModel = $this->model('Faculty');
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
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'level' => $_POST['level'],
                'department' => $_POST['department'],
            ];

            if ($this->courseModel->addCourse($data)) {
                redirect('/');
            } else {
                echo "alert";
            }
        } else {
            $data['departments'] = $this->getdepartments();
            $this->view('admin/addCourse', $data);
        }
    }
    public function addStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'regno' => trim($_POST['regno']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'faculty_id' => trim($_POST['faculty_id']),
                'department_id' => trim($_POST['department_id']),
                'level' => trim($_POST['level']),
                'gpa' => trim($_POST['gpa']),
                'memberId' => "student",
                'groupId' => 2,
                'isApproved' => 1
            ];

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {

            $data = [];
            $data['courses'] = $this->getCourses();
            $data['departments'] = $this->getdepartments();
            $data['faculties'] = $this->getFaculties();
            $this->view('admin/addStudent', $data);
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
            $data['departments'] = $this->getdepartments();
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
            $data['courses'] = $this->getCourses();
            $data['departments'] = $this->getdepartments();
            $this->view('admin/addExam', $data);
        }
    }

    public function addStaff()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'department_id' => trim($_POST['department_id']),
                'memberId' => "staff",
                'groupId' => 3,
                'isApproved' => 1
            ];

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            if ($this->adminModel->addStaff($data)) {
                flash('add_exam_success', 'Staff Added successfully');
                redirect('/');
            } else {
                # code...
            }
        } else {
            $data = [];
            $data['departments'] = $this->getdepartments();
            $this->view('admin/addStaff', $data);
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
    private function getDepartments()
    {
        $data = $this->departmentModel->getDepartment();
        return $data;
    }

    private function getFaculties()
    {
        $data = $this->facultyModel->getFaculty();
        return $data;
    }
}
