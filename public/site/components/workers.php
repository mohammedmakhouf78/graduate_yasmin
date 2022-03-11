<?php
    $workers = query($conn,'select workers.id,workers.image,workers.job,workers.exp,users.name from workers 
    join users
    on workers.user_id = users.id
    limit 4
    ');
?>
<div class="service">
    <div class="container">
        <div class="section-header">
            <p>عمالنا</p>
            <h2>نوفر خدمات عالمية</h2>
        </div>
        <div class="row">
            <?php foreach($workers as $worker): ?>
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <img style="width: 255px;height:170px; object-fit:cover" src="<?= getImage('workers/' . $worker['image']) ?>" alt="Service">
                    <h3><?= $worker['name'] ?></h3>
                    <p>
                    <h3><?= $worker['job'] ?></h3>
                    <h3>الخبرات <?= $worker['exp'] ?></h3>
                    </p>
                    <a class="btn" href="<?= getPageSite('pages/worker.php?id='. $worker['id']) ?>">Learn More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>