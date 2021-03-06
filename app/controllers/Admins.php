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

    public function viewStudent($id)
    {

        $student = $this->studentModel->getStudentByUserId($id);

        $data['student'] = $student;
        $this->view("admin/viewStudent", $data);
    }

    public function addParent()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'student_username' => trim($_POST['student_uname']),
                'memberId' => "parent",
                'groupId' => 4,
                'isApproved' => 1
            ];

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);


            if ($this->adminModel->addParent($data)) {
                flash('add_exam_success', 'Guardian Added successfully');
                redirect('/');
            } else {
                # code...
            }
        } else {

            $data['students'] = $this->getStudents();
            $this->view("admin/addParent", $data);
        }
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
                'paid_fees' => $_POST['paid_fees'],
                'hostel_fees' => $_POST['hostel_fees'],
                'memberId' => "student",
                'groupId' => 2,
                'isApproved' => 1
            ];

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);


            if ($this->adminModel->addStudent($data)) {
                flash('add_exam_success', 'Student Added successfully');
                redirect('/');
            } else {
                # code...
            }
        } else {

            $data = [];
            $data['courses'] = $this->getCourses();
            $data['departments'] = $this->getdepartments();
            $data['faculties'] = $this->getFaculties();
            $this->view('admin/addStudent', $data);
        }
    }

    public function students()
    {

        $data['students'] = $this->getStudents();
        $this->view("admin/getStudents", $data);
    }

    public function updategpa($student_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "student_id" => $student_id,
                "gpa" => $_POST['gpa']
            ];
            if ($this->adminModel->editStudentGPA($data)) {
                redirect("/");
            } else {
                # code...
            }
        } else {
            $this->view("admin/updateGPA");
        }
    }

    public function addScore($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $student = $this->getStudentsProfile($user_id);
            $data = [
                "user_id" => $user_id,
                "reg_no" => $student->reg_no,
                "level" => $student->level,
                "semester" => 1,
            ];

            foreach ($_POST['course'] as $key => $value) {
                $data['course_id'] = $value;
                $data['score'] = $_POST['score'][$key];

                if ($this->studentModel->selctScoreCourse($data)) {
                    $this->studentModel->insertScore($data);
                } else {
                    $this->studentModel->updateScore($data);
                }
            }

            redirect("admins/student");
        } else {


            $data['student'] = $this->getStudentsProfile($user_id);

            $level = $data['student']->level;
            $data['user_id'] = $user_id;

            $data['courses'] = $this->getCoursesByLevel($level);
            $this->view("admin/addScore", $data);
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
                'department_id' => $_POST['department'],
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

    private function getCoursesByLevel($level)
    {
        $data = $this->courseModel->getCoursesByLevel($level);
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

    private function getStudentsProfile($user_id)
    {
        $data = $this->studentModel->getStudentProfile($user_id);
        return $data;
    }
}
