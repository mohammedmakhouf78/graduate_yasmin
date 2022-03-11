<div class="hero row align-items-center">
    <div class="col-md-5">
        <h2>اكبر واوثق</h2>
        <h2><span>خدمات</span> عماليه</h2>
        <p>
            <?php if(isset($_SESSION['worker'])): ?>
                مرحبا بك نتمنى لك عملا موفقا
            <?php elseif(isset($_SESSION['customer'])): ?>
                مرحبا بك نتمنى ان تجد العامل المناسب
            <?php else: ?>
                مرحبا بك في موقع العمال
            <?php endif; ?>
        </p>
        <a class="btn" href="">Explore Now</a>
    </div>
    <div class="col-md-7">
        <div>
            <img src="<?= asset('site/images/hero.jpeg') ?>" style="width: 100%;" />
        </div>
    </div>
</div>