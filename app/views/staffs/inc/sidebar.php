<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/dashboard/dashboard.css">

<div class="sidebar pb-5">
	<div class="sidebar-brand">
		<h2><span class="lab la-accusoft"></span><span>RUSIMS</span></h2>
	</div>

	<div class="col-12"><img src="<?= URLROOT; ?>/img/logo/ru_logo.jfif" alt="User Logo" height="100%" width="70%"></div>

	<div class="sidebar-menu pb-5">
		<ul>
			<li class="active">
				<a href="">
					<span class="las la-igloo"></span>
					<span>Home</span></a>
			</li>

			<li>
				<a href="<?= URLROOT ?>staffs/faculty">
					<span class="las la-users"></span>
					<span>Faculty</span></a>
			</li>

			<li>
				<a href="<?= URLROOT ?>staffs/students">
					<span class="las la-clipboard-list"></span>
					<span>Students</span></a>
			</li>

			<li>
				<a href="<?= URLROOT ?>staffs/assignment">
					<span class="las la-shipping-bag"></span>
					<span>Assignment</span></a>
			</li>

			<li>
				<a href="<?= URLROOT ?>staffs/attendance">
					<span class="las la-receipt"></span>
					<span>Attendance List</span></a>
			</li>


			<li>
				<a href="<?= URLROOT ?>staffs/test">
					<span class="las la-user-circle"></span>
					<span>Tests</span></a>
			</li>

			<li>
				<a href="<?= URLROOT ?>staffs/exams">
					<span class="las la-user-circle"></span>
					<span>Exams</span></a>
			</li>

			<li class="logout bg-danger pt-3 pb-3">
				<a href="<?= URLROOT  ?>/pages/logout">
					<span class="las la-clipboard-list"></span>
					<span>Log Out</span>
				</a>
			</li>

		</ul>
	</div>
</div>