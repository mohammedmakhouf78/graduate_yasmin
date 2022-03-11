<?php
$team = query($conn, 'select workers.id,workers.image,workers.job,users.name from workers 
    join users
    on workers.user_id = users.id
    limit 4 offset 4
    ');
?>

<div class="team">
    <div class="container">
        <div class="section-header">
            <p>Team Member</p>
            <h2>Meet Our Expert Cleaners</h2>
        </div>
        <div class="row">
            <?php foreach ($team as $member) : ?>
                <div class="col-lg-3 col-md-6">
                    <a href="<?= getPageSite('pages/worker.php?id=' . $member['id']) ?>">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="<?= getImage('workers/' . $member['image']) ?>" alt="Team Image" style="width: 255px;height:255px;object-fit:cover">
                            </div>
                            <div class="team-text">
                                <h2><?= $member['name'] ?></h2>
                                <h3><?= $member['job'] ?></h3>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>