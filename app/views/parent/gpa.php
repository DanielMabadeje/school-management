<?php require APPROOT . '/views/students/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/students/inc/dashnav.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <!-- <div class="uid">
				<h1>Hello, <span>User Full Name</span></h1><br>
				<p>Time: <?php echo date('d-m-y h:i:s'); ?></p>
			</div> -->

        <!-- <div>
				<p>The rest of the content is here.</p>
			</div> -->

        <h2>Your Ward's GPA</h2>

        <div class="bg-white mt-5 pt-5">

            <h2>GPA : <?= $data['gpa'] ?></h2>
        </div>

        <div class="pt-5 card col-md-12 pb-5">
            <?php foreach ($data['scores'] as $score) : ?>

                <div class="card p-3"><?= $score->name ?>: <?= $score->score ?></div>
            <?php endforeach; ?>
        </div>

    </main>
</div>
<?php require APPROOT . '/views/students/inc/footer.php'; ?>