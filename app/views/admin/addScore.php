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
                    <h4>Student Score</h4>
                </div>
                <div class="card-body p-0">
                    <div class="form p-5">
                        <form action="<?= URLROOT ?>/admins/addscore/<?= $data['user_id'] ?>" method="post">


                            <?php foreach ($data['courses'] as $course) : ?>
                                <div class="form-group">
                                    <label for="name"><?= $course->name ?> <sup>*</sup></label>
                                    <input type="hidden" name="course[]" value="<?= $course->id ?>">
                                    <input type="text" name="score[]" class="form-control form-control-lg" value="" placeholder="Put in Student's score....">
                                    <span class="invalid-feedback"></span>
                                </div>
                            <?php endforeach; ?>

                            <div class="form-group">
                                <input type="submit" value="Add Exam" class="btn btn-primary btn-block col-6 p-3">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?php require APPROOT . '/views/admin/inc/footer.php'; ?>