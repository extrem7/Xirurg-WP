<!--item-->
<div class="col-xl-3 col-lg-4 col-sm-6">
    <a class="card-item <?= get_post_type() == 'video' ? 'card-item-play' : '' ?> d-flex flex-column"
       href="<? the_permalink() ?>">
        <div class="card-item-image d-flex flex-column justify-content-end">
            <div class="card-item-img"
                 style="background-image: url('<? the_post_thumbnail_url() ?>')"></div>
            <div class="card-item-title d-flex flex-column justify-content-center"><? the_title() ?></div>
        </div>
        <div class="card-item-text"><? the_excerpt() ?></div>
    </a>
</div>