<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="section pic-bg mt-0 pt-5 pb-5" style="
                            background:linear-gradient(to right,  rgba(11, 12, 12, 0.8),  rgba(8, 8, 8, 0.8)), url('<?= URLROOT ?>/img/WhatsApp Image 2021-06-07 at 2.37.49 AM.jpeg');
                            background-size:cover !important;">
    <div class="container">


        <div class="col-md-5 mt-5 pt-5 pb-5 mx-auto card">
            <div class="form">
                <?php flash('register_success'); ?>
                <?php flashfail('login_fail'); ?>
                <!-- <p>Please fill the form</p> -->
                <h3 class="text-other">SignIn here</h3>
                <form action="<?= URLROOT ?>" class="pt-3 mt-3" method="post">
                    <div class="form-group">
                        <label for="email">Email Or RegNo <sup>*</sup></label>
                        <input type="text" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                        <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
                        <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn text-white bg-other btn-block">
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT; ?>users/register " class="btn btn-light btn-block">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>