<div class="bloc-artiste cell small-12 medium-6 large-6">
    <a href="<?php get_permalink(); ?>" class="artiste" data-post-id="<?php echo get_the_ID()?>">
        <div class="artiste__box bloc-image-zoom">
            <img class="image-zoom" src="<?php the_post_thumbnail_url('artiste'); ?>"/>
            <h4 class="artiste__nom"><?php the_title(); ?></h4>
        </div>
    </a>
    <div class="parent-content-ajax">
        <div class="grid-x grid-margin-x content_ajax">
        </div>
    </div>
</div>