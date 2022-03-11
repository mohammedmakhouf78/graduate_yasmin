<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
isLoggedIn();
?>
<?php include frontLayout('head.php'); ?>
<!-- Header Start -->
<div class="header home mb-0">
    <div class="container-fluid">
        <div class="header-top row align-items-center">
            <div class="col-lg-3">
                <div class="brand">
                    <a href="index.html">
                        Home Helper
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="topbar">
                    <div class="topbar-col">
                        <a href="tel:+012 345 67890"><i class="fa fa-phone-alt"></i>+012 345 67890</a>
                    </div>
                    <div class="topbar-col">
                        <a href="mailto:info@example.com"><i class="fa fa-envelope"></i>info@example.com</a>
                    </div>
                    <div class="topbar-col">
                        <div class="topbar-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>



                <?php include frontLayout('navbar.php'); ?>




            </div>
        </div>

        <div class="hero row align-items-center">
            <div class="col-md-7">
                <h2>اكبر واوثق</h2>
                <h2><span>خدمات</span> عماليه</h2>
                <p>
                    <?php if (isset($_SESSION['worker'])) : ?>
                        مرحبا بك نتمنى لك عملا موفقا
                    <?php elseif (isset($_SESSION['customer'])) : ?>
                        مرحبا بك نتمنى ان تجد العامل المناسب
                    <?php else : ?>
                        مرحبا بك في موقع العمال
                    <?php endif; ?>
                </p>
                <a class="btn" href="">Explore Now</a>
            </div>
            <div class="col-md-5">
                <div class="form">
                    <h3>عمل حساب عميل جديد</h3>


                    <form method="POST" action="<?= getController('site/auth/login.php') ?>">


                        <input class="form-control" type="email" placeholder="Your email" name="email">
                        <?php if (isset($_SESSION['errors']['email'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                        <?php endif ?>


                        <input class="form-control" type="password" placeholder="Your password" name="password">
                        <?php if (isset($_SESSION['errors']['password'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                        <?php endif ?>


                        <button type="submit" class="btn btn-block">Register</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<?php include frontLayout('footer.php'); ?>