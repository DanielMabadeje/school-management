
    <?php require APPROOT . '/views/students/inc/header.php'; ?>
	<div class="main-content">
    <?php require APPROOT . '/views/students/inc/dashnav.php'; ?>
    <!-- <?=  ?> -->
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

		<main>
			<!-- <div class="uid">
				<h1>Hello, <span>User Full Name</span></h1><br>
				<p>Time: <?php echo date('d-m-y h:i:s'); ?></p>
			</div> -->

			<!-- <div>
				<p>The rest of the content is here.</p>
			</div> -->


            <section class="calendar">
            <div class="month">
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      August<br>
      <span style="font-size:18px">2016</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active">10</span></li>
  <li>11</li>
  ...etc
</ul>
            </section>

		</main>
	</div>
</body>
</html>