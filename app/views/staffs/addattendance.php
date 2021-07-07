<?php require APPROOT . '/views/staffs/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/staffs/inc/navbar.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <section>
            <div class="attendance">



                <div class="col-md-8 mx-auto">
                    <h2 class="display-4">Add Attendance</h2>
                    <form action="<?= URLROOT ?>staffs/addattendance" method="post" class="mt-5">
                        <div class="form-group">
                            <label for="name">Name <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg" value="">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Course <sup>*</sup></label>
                            <input type="text" name="course" class="form-control form-control-lg " value="">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Week <sup>*</sup></label>
                            <input type="date" name="week" class="form-control form-control-lg " value="">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn bg-other text-white" value="Add Attendance">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>

<?php require APPROOT . '/views/staffs/inc/footer.php'; ?>