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

    <h2>Courses</h2>

    <div class="bg-white mt-5 pt-5">
      <?php foreach ($data['courses'] as $course) : ?>
        <button class="accordion"><?= $course->name ?></button>
        <div class="panel mb-3">
          <p><?= $course->description ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </main>
</div>
<?php require APPROOT . '/views/parent/inc/footer.php'; ?>