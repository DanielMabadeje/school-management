<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<div class="container ">

    <div class="col-md-12">


        <div class="header-side pt-5 mt-5">
            <h1 class="display-4">Add Test</h1>

            <hr>
        </div>





        <div class="col-md-12 ">
            <div class="card ">

                <div class="card-header pt-0 pb-0 bg-other-faint">
                    <h4>Add Test</h4>
                </div>
                <div class="card-body p-0">
                    <div class="form p-5">
                        <form action="<?= URLROOT ?>/admins/addTest" method="post">
                            <div class="form-group">
                                <label for="name">Name <sup>*</sup></label>
                                <input type="text" name="name" class="form-control form-control-lg" value="">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Description <sup>*</sup></label>
                                <!-- <input type="text" name="description" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value=""> -->
                                <textarea name="description" rows="10" cols="30" class="form-control form-control-lg">

                            </textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Course: <sup>*</sup></label>
                                <input type="text" name="course" class="form-control form-control-lg " value="">
                                <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Department: <sup>*</sup></label>
                                <input type="text" name="department_id" class="form-control form-control-lg " value="">
                                <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                            </div>

                            <div class="form-group">
                            <label for="">Date <sup>*</sup></label>
                            <input type="date" name="date" class="form-control form-control-lg ">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Time<sup>*</sup></label>
                            <input type="time" name="time" class="form-control form-control-lg ">
                            <span class="invalid-feedback"></span>
                        </div>
                            <div class="form-group">
                                <input type="submit" value="Add Test" class="btn btn-primary btn-block col-6 p-3">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php require APPROOT . '/views/admin/inc/footer.php'; ?>