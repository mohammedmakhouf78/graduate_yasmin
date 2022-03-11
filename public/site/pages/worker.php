<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
$id = $_GET['id'];
$works = query($conn,'select w.id, w.title,w.description,w.date,u.name
from works as w
join workers as wr
on w.worker_id = wr.id
join users as u
on u.id = wr.user_id
where wr.id =' . $id);

$worker = query($conn,"select workers.id,workers.job,users.name from workers
join users
on workers.user_id = users.id
where workers.id = $id")[0];
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
            <p><?= $worker['job'] ?></p>
            <h2><?= $worker['name'] ?></h2>
        </div>
        <div class="row">
            <?php foreach($works as $work): ?>
            <?php 
                $image = query($conn,'select * 
                from work_images
                where work_id = '. $work['id'] . " limit 1")[0];
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="<?= getImage('work_images/' . $image['image']) ?>" alt="Blog">
                    <h3><?= $work['title'] ?></h3>
                    <div class="meta">
                        <i class="fa fa-list-alt"></i>
                        <a href=""><?= $work['name'] ?></a>
                        <i class="fa fa-calendar-alt"></i>
                        <p><?= $work['date'] ?></p>
                    </div>
                    <p>
                        <?= $work['description'] ?>
                    </p>
                    <a class="btn" href="<?= getPageSite('pages/work_images.php?id=' . $work['id']) ?>">Learn More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Workers End -->

<!-- Workers Start -->
<div class="blog">
    <div class="container">
        <div class="section-header">
           <a href="<?= getPageSite('pages/worker_personal.php?id= ' . $id) ?>" class="btn btn-outline-primary" style="width: 200px;height:60px">
           <h1>للتواصل</h1>
        </a>
        </div>
    </div>
</div>
<!-- Workers End -->
<?php include frontLayout('footer.php'); ?>