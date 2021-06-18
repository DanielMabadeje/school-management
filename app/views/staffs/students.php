<?php require APPROOT . '/views/staffs/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/staffs/inc/navbar.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <section>
            <div class="students">
                <h2 class="display-4">Students</h2>


                <section class="students_table">
                    <div class="mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title mb-0">Students</div>
                                <div class="table-responsive">
                                    <table class="table text-left">
                                        <thead>
                                            <tr class="bg-light text-dark">
                                                <th> Name </th>
                                                <th> Reg No </th>
                                                <th> Status </th>
                                                <th> Course</th>
                                                <th> Academic Year</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                        <?php foreach ($data['students'] as $student) : ?>
                                    <tr>
                                        <td><?= $student->name ?></td>
                                        <td><?= $student->reg_no ?></td>
                                        <td>Student</td>
                                        <td><?= $student->department ?></td>
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