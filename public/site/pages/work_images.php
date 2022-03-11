<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
$id = $_GET['id'];
$images = query($conn, 'select * from work_images
where work_id = ' . $id);

$work = query($conn,"select * from works where id = " . $id)[0];
?>
<?php include frontLayout('head.php'); ?>

<!-- Header Start -->
<div class="header home" style="background: linear-gradient(
      rgba(0, 83, 156, 1),
      rgba(0, 83, 156, 0.9),
      rgba(0, 83, 156, 1)
    ),
    url(<?= asset('site/img/header.jpg') ?>)">
    <div class="container-fluid">
        <div class="header-top row align-items-center">
            <div class="col-lg-3">
                <div class="brand">
                    <a href="<?= getPageSite('index.php'); ?>">
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

    </div>
</div>
<!-- Header End -->


<!-- Workers Start -->
<div class="blog">
    <div class="container">
        <div class="section-header">
            <p><?= $work['date'] ?></p>
            <h2><?= $work['title'] ?></h2>
            <h2><?= $work['description'] ?></h2>
        </div>
        <div class="row">
            <?php foreach ($images as $img) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <img src="<?= getImage('work_images/'.$img['image']) ?>" alt="">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Workers End -->

<?php include frontLayout('footer.php'); ?>