<div class="navbar navbar-expand-lg bg-light navbar-light">
    <a href="#" class="navbar-brand">MENU</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            <a href="<?= getPageSite('index.php') ?>" class="nav-item nav-link active">Home</a>

            <?php if(!(isset($_SESSION['worker']) || isset($_SESSION['customer']))): ?>

            <a href="<?= getPageSite('auth/login.php'); ?>" class="nav-item nav-link">تسجيل دخول</a>

            <a href="<?= getPageSite('auth/registerCustomer.php'); ?>" class="nav-item nav-link">تسجيل عميل</a>

            <a href="<?= getPageSite('auth/registerWorker.php'); ?>" class="nav-item nav-link">تسجيل عامل</a>

            <?php else: ?>
                <a href="<?= getController('site/auth/logout.php'); ?>" class="nav-item nav-link">تسجيل خروج</a>
            <?php endif; ?>
        </div>
    </div>
</div>