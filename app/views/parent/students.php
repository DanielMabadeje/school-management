<?php require APPROOT . '/views/parent/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/parent/inc/dashnav.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <!-- <div class="uid">
				<h1>Hello, <span>User Full Name</span></h1><br>
				<p>Time: <?php echo date('d-m-y h:i:s'); ?></p>
			</div> -->

        <!-- <div>
				<p>The rest of the content is here.</p>
			</div> -->

        <h2>Students</h2>


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

    </main>
</div>
<?php require APPROOT . '/views/parent/inc/footer.php'; ?>