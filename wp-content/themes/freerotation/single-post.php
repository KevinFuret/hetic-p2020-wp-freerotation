<?php get_header(); //appel du template header.php  ?>

<div id="content">
    <div class="grid-x grid-margin-x section align-center article">
        <div class="cell small-12 medium-up-8 large-8">
            <?php
            // boucle WordPress
            if (have_posts()){
                while (have_posts()){
                    the_post();
                    ?>
                    <span class="actu__date"><?php the_time('M j Y'); ?></span>
                    <h3 class="actu__titre"><?php the_title(); ?></h3>
                    <div class="actu__image"><?php the_post_thumbnail('actu-article'); ?></div>
                    <span class="actu__extrait"><?php the_content(); ?></span>
                    <div class="center-link"><a class="button_link_right" href="<?php echo the_permalink( get_option( 'page_for_posts' ) ); ?>"><span class="arrow-grey-reverse">&#xf177;</span> BACK TO THE OVERFLOW</a></div>
        <?php
                }
            }
            else {
                ?>
                Nous n'avons pas trouvé d'article répondant à votre recherche
                <?php
            }
            ?>
        </div>
    </div> <!-- /content -->
</div>
<?php get_footer(); //appel du template footer.php ?>