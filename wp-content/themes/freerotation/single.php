<?php get_header(); //appel du template header.php  ?>

<div class="grid-x grid-margin-x">
    <div class="small-12 large-6 cell">
        <?php
        // boucle WordPress
        if (have_posts()){
            while (have_posts()){
                the_post();
        ?>
                <h2>Posté le <?php the_time('F jS, Y') ?></h2>
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
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
    <div class="small-12 large-6 cell">
    <?php
    // boucle WordPress
    if (have_posts()){
        while (have_posts()){
            the_post();
            ?>
            <h2>Posté le <?php the_time('F jS, Y') ?></h2>
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
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

<?php get_footer(); //appel du template footer.php ?>
