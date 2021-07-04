<header class="mt-3 ml-2 mr-5">
    <h3 class="text-gray">
        <!-- <label for="nav-toggle" style="background: black;">
					<span class="las la-bars"></span>
				</label> -->

        Dashboard
    </h3>

    <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" placeholder="Search Here........">
    </div>

    <div class="user-wrapper">
        <img src="<?= URLROOT; ?>/img/profile.png.2018-04-24.1524590440.png" width="30px" height="30px" alt="">
        <div>
            <h5><?= $_SESSION['user_name'] ?></h5>
            <!-- <small>Admin</small> -->
        </div>
    </div>
</header>