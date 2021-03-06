<?php require APPROOT . '/views/students/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/students/inc/dashnav.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <section>



            <div class="attendance">
                <h2 class="display-4">Attendance List</h2>


                <section class="attendance">
                    <div class="mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-md-12">
                                    <div class="col-md-4 ml-auto text-right">
                                        <!-- <a href="<?= URLROOT ?>/staffs/addattendance" class="btn bg-other text-white ml-auto">Add Student</a> -->

                                    </div>
                                </div>
                                <div class="card-title mb-0">Student Attendance</div>
                                <div class="table-responsive">
                                    <table class="table text-left">
                                        <thead>
                                            <tr class="bg-light text-dark">
                                                <!-- <th> Name </th> -->
                                                <th> Reg No</th>
                                                <!-- <th> Week </th> -->
                                                <th> Course</th>
                                                <th> Created</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php foreach ($data['attendance'] as $attendance) : ?>

                                                <tr>
                                                    <!-- <td><?= $attendance->name ?></td> -->
                                                    <!-- <td></td> -->
                                                    <td><?= $attendance->student_reg_no ?></td>
                                                    <!-- <td>Student</td> -->
                                                    <td><?= $data['current_attendance']->course_name->name ?></td>
                                                    <td><?= $attendance->created_at ?></td>
                                                    <td>
                                                        <!-- <div class="row"> -->
                                                        <!-- <a href="<?= $attendance->id ?>" class="btn btn-danger">Delete</a> -->
                                                        <!-- </div> -->

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>



                                </div>


                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
</div>

<?php require APPROOT . '/views/staffs/inc/footer.php'; ?>