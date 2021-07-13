<nav class="navbar navbar-expand-lg navbar-dark bg-white mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?= URLROOT ?>">
            <!-- <?php echo SITENAME; ?> -->
            <img src="<?= URLROOT; ?>img/logo/ru_logo.jfif" alt="" height="40px">
        </a>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link text-dark" href="<?= URLROOT ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= URLROOT ?>pages/about">About</a>
                </li> -->


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Groups
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">View Groups</a>
                        <!-- <a class="dropdown-item" href="#">Another action</a> -->

                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Members
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/addStudent">Register Student</a>
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/addStaff">Add Staff</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/students">View Students</a>
                    </div>
                </li>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Courses
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/addCourse">Add Courses</a>

                        <div class="dropdown-divider"></div>

                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Exams
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/addExam">Add Exams</a>
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/getExam">View Exams</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/addTest">Add Test</a>
                        <a class="dropdown-item" href="<?= URLROOT ?>/admins/getTest">View Test</a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Utilities
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Maintainance Mode</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Updates</a>
                    </div>
                </li>




            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?> <li class="nav-item active">
                    <li class="nav-item">
                        <a class="nav-link bg-other btn mr-3 text-white pl-5 pr-5" href="#">User Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="<?= URLROOT ?>users/logout">Logout</a>
                    </li>
                <?php else : ?>
                    <a class="nav-link text-dark" href="<?= URLROOT ?>users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= URLROOT ?>users/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>