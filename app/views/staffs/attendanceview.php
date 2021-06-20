<?php require APPROOT . '/views/staffs/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/staffs/inc/navbar.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <section>

            <!-- modal -->

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Student</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <p>Some text in the modal.</p> -->

                            <form action="" method="post">

                                <?php foreach ($data['students'] as $student) : ?>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="attendanceStudent[]" value="">Option 1</label>
                                    </div>
                                <?php endforeach; ?>
                                <input type="submit" value="Submit" class="form-lg">

                            </form>
                            <!-- <div class="checkbox">
                                <label><input type="checkbox" value="">Option 1</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Option 2</label>
                            </div> -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end modal -->


            <div class="attendance">
                <h2 class="display-4">Attendance List</h2>


                <section class="attendance">
                    <div class="mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-md-12">
                                    <div class="col-md-4 ml-auto text-right">
                                        <!-- <a href="<?= URLROOT ?>/staffs/addattendance" class="btn bg-other text-white ml-auto">Add Student</a> -->
                                        <button type="button" class="btn bg-other text-white" data-toggle="modal" data-target="#myModal">Add Student</button>
                                    </div>
                                </div>
                                <div class="card-title mb-0">Student Attendance</div>
                                <div class="table-responsive">
                                    <table class="table text-left">
                                        <thead>
                                            <tr class="bg-light text-dark">
                                                <th> Name </th>
                                                <th> Reg No</th>
                                                <th> Week </th>
                                                <th> Course</th>
                                                <th> Created</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>






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