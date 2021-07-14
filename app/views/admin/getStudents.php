<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<section class="container">
    <section class=" col-md-12 mt-5 pt-5">

        <h2 class="display-4">All Students</h2>

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
                                    <th> Action</th>
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
                                        <td>
                                            <a href="<?= URLROOT ?>/admins/addScore/<?= $student->user_id ?>" class="btn btn-secondary text-white">Student Scores</a>
                                            <a href="<?= URLROOT ?>/admins/viewStudent/<?= $student->user_id ?>" class="btn btn-primary text-white">View Student</a>
                                            <a href="<?= URLROOT ?>/admins/updateGPA/<?= $student->user_id ?>" class="btn bg-other text-white">Update GPA</a>
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
</section>
</section>


<?php require APPROOT . '/views/admin/inc/footer.php'; ?>