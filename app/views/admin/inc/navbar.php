<nav class="navbar navbar-expand-lg navbar-dark bg-white mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?= URLROOT ?>">
            <!-- <?php echo SITENAME; ?> -->
            <img src="<?= URLROOT; ?>img/logo/ru_logo.jfif" alt="" height="40px">
        </a>
        <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="<?= URLROOT ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= URLROOT ?>pages/about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?> <li class="nav-item active">
                    <li class="nav-item">
                        <a class="nav-link bg-other btn mr-3 text-white pl-5 pr-5" href="#">User Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="<?= URLROOT ?>users/logout">Logout</a>
                    </li>
                <?php else : ?>
                    <a class="nav-link text-dark" href="<?= URLROOT ?>users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= URLROOT ?>users/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>