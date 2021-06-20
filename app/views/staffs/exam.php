<?php require APPROOT . '/views/staffs/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/staffs/inc/navbar.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <section>
            <div class="attendance">
                <h2 class="display-4">Exams</h2>


                <section class="attendance">
                    <div class="mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-md-12">
                                    <div class="col-md-4 ml-auto text-right">
                                        <a href="<?= URLROOT ?>/staffs/addExam" class="btn bg-other text-white ml-auto">Add Exam</a>
                                    </div>
                                </div>
                                <div class="card-title mb-0">Tests</div>
                                <div class="table-responsive">
                                    <table class="table text-left">
                                        <thead>
                                            <tr class="bg-light text-dark">
                                                <th> Name </th>
                                                <th> Description</th>
                                                <th> Course</th>
                                                <th> Date</th>
                                                <th> Time</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($data['exam'] as $test) : ?>
                                                <tr>
                                                    <td><?= $test->name ?></td>
                                                    <td><?= $test->description ?></td>
                                                    <td><?= $test->course_id ?></td>
                                                    <td><?= $test->date ?></td>
                                                    <td><?= $test->time ?></td>
                                                    <td>
                                                        <a href="" class="btn bg-other text-white">Edit</a>
                                                        <a href="" class="btn btn-danger">Delete</a>
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