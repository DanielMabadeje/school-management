<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<div class="container ">

    <div class="col-md-12">


        <div class="header-side pt-5 mt-5">
            <h1 class="display-4">Add Exams</h1>

            <hr>
        </div>





        <div class="col-md-12 ">
                <div class="card ">

                    <div class="card-header pt-0 pb-0 bg-other-faint">
                        <h4>Users</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="form">
                        <form action="<?= URLROOT ?>users/register" method="post">
                <div class="form-group">
                    <label for="name">Name <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?= (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']; ?>">
                    <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?= (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>users/login " class="btn btn-light btn-block">Have an account? Login</a>
                    </div>
                </div>
            </form>
                        </div>
                    </div>
                </div>
            </div>

       
    </div>
</div>