<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxst.icons8.com/vue-static/landings/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/dashboard/dashboard.css">
</head>

<body>

	<input type="checkbox" name="" id="nav-toggle">
	<!-- <div class="sidebar">
		<div class="sidebar-brand">
			<h2><span class="lab la-accusoft"></span><span>RUSIMS</span></h2>
		</div>

		<div class="col-12"><img src="<?= URLROOT; ?>/img/logo/ru_logo.jfif" alt="User Logo" height="100%" width="70%"></div>
		
		<div class="sidebar-menu">
			<ul>
				<li class="active">
					<a href="">
						<span class="las la-igloo"></span>
					<span>Home</span></a>
				</li>

				<li>
					<a href="">
						<span class="las la-users"></span>
					<span>Faculty</span></a>
				</li>

				<li>
					<a href="">
						<span class="las la-clipboard-list"></span>
					<span>Students</span></a>
				</li>

				<li>
					<a href="">
						<span class="las la-shipping-bag"></span>
					<span>Parents</span></a>
				</li>

				<li>
					<a href="">
						<span class="las la-receipt"></span>
					<span>Notifications</span></a>
				</li>

				<li>
					<a href="">
						<span class="las la-user-circle"></span>
					<span>Messages</span></a>
				</li>

				<li class="logout">
					<a href="">
						<span class="las la-clipboard-list"></span>
					<span>Log Out</span></a>
				</li>

			</ul>
		</div>
	</div> -->

	<div class="main-content">
		<header>
			<h1>
				<label for="nav-toggle" style="background: black;">
					<span class="las la-bars"></span>
				</label>

				Dashboard
			</h1>

			<div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="Search Here">
			</div>

			<div class="user-wrapper">
				<img src="Images\download (4).jfif" width="30px" height="30px" alt="">
				<div>
					<h4>John Doe</h4>
					<small>Admin</small>
				</div>
			</div>
		</header>

		<main>
			<div class="uid">
				<h1>Hello, <span>User Full Name</span></h1><br>
				<p>Time: <?php echo date('d-m-y h:i:s'); ?></p>
			</div>

			<div>
				<p>The rest of the content is here.</p>
			</div>

		</main>
	</div>
</body>
</html>