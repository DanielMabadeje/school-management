<?php require APPROOT . '/views/admin/inc/header.php'; ?>


<div class="container ">

    <div class="col-md-12">


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
                                        <?php foreach ($data['students'] as $student) : ?>
                                            <tr>
                                                <td>Okon Doe</td>
                                                <td> 14,000</td>
                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>







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
                                        <tr>
                                            <td>Paypal</td>
                                            <td> 14,000</td>
                                        </tr>
                                        <tr>

                                            <td>Visa</td>
                                            <td>41,160</td>
                                        </tr>
                                        <tr>

                                            <td>Paypal</td>
                                            <td>12,603</td>
                                        </tr>
                                        <tr>

                                            <td>Paypal</td>
                                            <td>91,231</td>
                                        </tr>
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



                <div class="col-md-4 mb-4">
                    <div class="card">

                        <div class="card-header">
                            <h4>Users</h4>
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
                                        <tr>
                                            <td>Paypal</td>
                                            <td> 14,000</td>
                                        </tr>
                                        <tr>

                                            <td>Visa</td>
                                            <td>41,160</td>
                                        </tr>
                                        <tr>

                                            <td>Paypal</td>
                                            <td>12,603</td>
                                        </tr>
                                        <tr>

                                            <td>Paypal</td>
                                            <td>91,231</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </section>
    </div>
</div>


<?php require APPROOT . '/views/admin/inc/footer.php'; ?>