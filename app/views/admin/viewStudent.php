<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<section class="container">
    <section class="exams col-md-12 mt-5 pt-5">

        <h2 class="display-4">Student's Profile</h2>

        <section class="row pt-5">
            <?php $student = $data['student'] ?>
            <div class="col-md-12 card p-4">
                <h3>Name</h3>
                <div class="car"><?= $student->name ?></div>
            </div>
            <div class="col-md-12 card p-4">
                <h3>Reg No</h3>
                <div class="car"><?= $student->reg_no ?></div>
            </div>
            <div class="col-md-12 card p-4">
                <h3>Department</h3>
                <div class="car"><?= $student->department ?></div>
            </div>

            <div class="col-md-12 card p-4">
                <h3>Faculty</h3>
                <div class="car"><?= $student->faculty ?></div>
            </div>
            <div class="col-md-12 card p-4">
                <h3>Level</h3>
                <div class="car"><?= $student->level ?></div>
            </div>
            <div class="col-md-12 card p-4">
                <h3>GPA</h3>
                <div class="car"><?= $student->gpa ?></div>
            </div>
            <div class="col-md-12 card p-4">
                <h3>Paid Fees</h3>
                <div class="car"><?= $student->paid_fees ?></div>
            </div>

            <div class="col-md-12 card p-4">
                <h3>Paid Hostel Fees</h3>
                <div class="car"><?= $student->paid_hostel_fees ?></div>
            </div>

        </section>
    </section>
</section>


<?php require APPROOT . '/views/admin/inc/footer.php'; ?>