<?php require APPROOT . '/views/staffs/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/staffs/inc/navbar.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <section>
            <div class="attendance">



                <div class="col-md-8 mx-auto">
                    <h2 class="display-4">Add Exam</h2>
                    <form action="<?= URLROOT ?>staffs/addExam" method="post" class="mt-5">
                        <div class="form-group">
                            <label for="name">Name <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg" value="">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Description <sup>*</sup></label>
                            <textarea name="description" rows="10" cols="30" class="form-control form-control-lg">

                            </textarea>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Course <sup>*</sup></label>
                            <!-- <input type="text" name="course" class="form-control form-control-lg " value=""> -->
                            <select name="course" class="form-control form-control-lg ">

                                <?php foreach ($data['courses'] as $course) : ?>
                                    <option value="<?= $course->id ?>"><?= $course->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Department<sup>*</sup></label>
                            <!-- <input type="text" name="department_id" class="form-control form-control-lg " value=""> -->
                            <select name="department_id" class="form-control form-control-lg ">

                                <?php foreach ($data['departments'] as $department) : ?>
                                    <option value="<?= $department->id ?>"><?= $department->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback"></span>
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
                            <input type="submit" class="btn bg-other text-white" value="Add Exam">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>

<?php require APPROOT . '/views/staffs/inc/footer.php'; ?>