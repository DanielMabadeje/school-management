<?php require APPROOT . '/views/staffs/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/staffs/inc/navbar.php'; ?>
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
                                        <a href="<?= URLROOT ?>/staffs/addattendance" class="btn btn-primary ml-auto">Add Attendance</a>
                                    </div>
                                </div>
                                <div class="card-title mb-0">Students</div>
                                <div class="table-responsive">
                                    <table class="table text-left">
                                        <thead>
                                            <tr class="bg-light text-dark">
                                                <th> Name </th>
                                                <th> Week </th>
                                                <th> Course</th>
                                                <th> Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php foreach ($data['attendance'] as $attendance) : ?>

                                                <tr>
                                                    <td><?= $attendance->name ?></td>
                                                    <td><?= $attendance->week ?></td>
                                                    <!-- <td>Student</td> -->
                                                    <td></td>
                                                    <td><?= date('Y') ?></td>
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