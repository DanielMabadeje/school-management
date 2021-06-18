<?php require APPROOT . '/views/staffs/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/staffs/inc/navbar.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <section>
            <div class="attendance">
                <h2 class="display-4">Add Attendance</h2>


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
        </section>
    </main>
</div>

<?php require APPROOT . '/views/staffs/inc/footer.php'; ?>