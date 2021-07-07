<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<div class="container ">

    <div class="col-md-12">


        <div class="header-side pt-5 mt-5">
            <h1 class="display-4">Add Student</h1>

            <hr>
        </div>





        <div class="col-md-12 ">
            <div class="card ">

                <div class="card-header pt-0 pb-0 bg-other-faint">
                    <h4>Add Student</h4>
                </div>
                <div class="card-body p-0">
                    <div class="form p-5">
                        <form action="<?= URLROOT ?>/admins/addstudent" method="post">
                            <div class="form-group">
                                <label for="name">Name <sup>*</sup></label>
                                <input type="text" name="name" class="form-control form-control-lg" value="">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Reg No <sup>*</sup></label>
                                <input type="text" name="regno" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="">
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email <sup>*</sup></label>
                                <input type="text" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password: <sup>*</sup></label>
                                <input type="password" name="password" class="form-control form-control-lg " value="">
                                <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                            </div>
                            <!-- <div class="form-group">
                                <label for="password">Course: <sup>*</sup></label>
                                <input type="text" name="course" class="form-control form-control-lg " value="">
                                <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                            </div> -->
                            <div class="form-group">
                                <label for="name">Faculty: <sup>*</sup></label>
                                <select name="faculty_id" class="form-control form-control-lg ">

                                    <?php foreach ($data['faculties'] as $faculty) : ?>
                                        <option value="<?= $faculty->id ?>"><?= $faculty->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Department: <sup>*</sup></label>
                                <select name="department_id" class="form-control form-control-lg ">

                                    <?php foreach ($data['departments'] as $department) : ?>
                                        <option value="<?= $department->id ?>"><?= $department->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Level: <sup>*</sup></label>
                                <input type="text" name="level" class="form-control form-control-lg " value="">
                                <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                            </div>


                            <div class="form-group">
                                <label for="name">GPA: <sup>*</sup></label>
                                <input type="text" name="gpa" class="form-control form-control-lg " value="">
                                <span class="invalid-feedback"><?= $data['gpa']; ?></span>
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Add Student" class="btn btn-primary btn-block col-6 p-3">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php require APPROOT . '/views/admin/inc/footer.php'; ?>