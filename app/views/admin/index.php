<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<div class="container ">

    <div class="col-md-12">

        <?php flash("add_exam_success") ?>

        <div class="header-side pt-5 mt-5">
            <h1 class="display-4">Admin Dashboard Area</h1>

            <hr>
        </div>

        <section class="row">
            <div class="row pt-5 mt-3 pb-5 mb-5 col-md-9">
                <div class="col-md-6 ">
                    <div class="card ">

                        <div class="card-header pt-0 pb-0 bg-other-faint">
                            <h4>Students</h4>
                        </div>
                        <div class="card-body p-0">

                            <div class="pt-0 pb-1">
                                <h5 class="mb-0"></h5>
                                <p class="small text-muted"></p>
                                <table class="table col-12">
                                    <thead>
                                        <tr>
                                            <th> Name </th>
                                            <th> Reg No </th>
                                        </tr>
                                    </thead>
                                    <tbody id="order">
                                        <?php foreach ($data['students'] as $student) : ?>
                                            <tr>
                                                <td><?= $student->name; ?></td>
                                                <td> <?= $student->reg_no; ?></td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- staffs -->
                <div class="col-md-6 mb-4">
                    <div class="card">

                        <div class="card-header pt-0 pb-0 bg-other-faint">
                            <h4>Staffs</h4>
                        </div>
                        <div class="card-body p-0">

                            <div class="pt-0 pb-1">
                                <h5 class="mb-0"></h5>
                                <p class="small text-muted"></p>
                                <table class="table col-12 pt-0">
                                    <thead>
                                        <tr>
                                            <th> Name </th>
                                            <th> Registered </th>
                                        </tr>
                                    </thead>
                                    <tbody id="order">
                                        <?php foreach ($data['staff'] as $staff) : ?>
                                            <tr>
                                                <td><?= $staff->username; ?></td>
                                                <td> <?= $staff->created_at; ?></td>
                                            </tr>

                                        <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end staff -->







                <div class="col-md-4 mb-4">
                    <div class="card">

                        <div class="card-header">
                            <h4>Exams</h4>
                        </div>
                        <div class="card-body p-0">

                            <div class="pt-0 pb-4">
                                <h5 class="mb-0"></h5>
                                <p class="small text-muted"></p>
                                <table class="table col-12">
                                    <thead>
                                        <tr>
                                            <th> Name </th>
                                            <th> Registered </th>
                                        </tr>
                                    </thead>
                                    <tbody id="order">
                                        <?php foreach ($data['exams'] as $exam) : ?>
                                            <tr>
                                                <td><?= $exam->name; ?></td>
                                                <!-- <td> <?= $exam->reg_no; ?></td> -->
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- stats -->
                <div class="col-md-4 mb-4">
                    <div class="card">

                        <div class="card-header">
                            <h4>Member Stats</h4>
                        </div>
                        <div class="card-body p-0">

                            <div class="pt-0 pb-4">
                                <h5 class="mb-0"></h5>
                                <p class="small text-muted"></p>
                                <table class="table col-12">
                                    <thead>
                                        <tr>
                                            <!-- <th> Name </th>
                                        <th> Registered </th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="order">
                                        <tr>
                                            <td>Total Members</td>
                                            <td><?= $data['stats']['allUsers'][0]->count ?></td>
                                        </tr>
                                        <tr>

                                            <td>Active Members</td>
                                            <td><?= $data['stats']['activeUsers'][0]->count; ?></td>
                                        </tr>
                                        <tr>

                                            <td>Banned Members</td>
                                            <td><?= $data['stats']['bannedUsers'][0]->count; ?></td>
                                        </tr>
                                        <tr>

                                            <td>Total Groups</td>
                                            <td>41,160</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end stats -->



                <!-- Tests -->
                <div class="col-md-4 mb-4">
                    <div class="card">

                        <div class="card-header">
                            <h4>Tests</h4>
                        </div>
                        <div class="card-body p-0">

                            <div class="pt-0 pb-4">
                                <h5 class="mb-0"></h5>
                                <p class="small text-muted"></p>
                                <table class="table col-12">
                                    <thead>
                                        <tr>
                                            <th> Name </th>
                                            <th> Date </th>
                                        </tr>
                                    </thead>
                                    <tbody id="order">
                                    <?php foreach ($data['tests'] as $test) : ?>
                                            <tr>
                                                <td><?= $test->name; ?></td>
                                                <td> <?= $test->date; ?></td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end tests -->
            </div>
            <div class="col-md-3"></div>
        </section>
    </div>
</div>


<?php require APPROOT . '/views/admin/inc/footer.php'; ?>