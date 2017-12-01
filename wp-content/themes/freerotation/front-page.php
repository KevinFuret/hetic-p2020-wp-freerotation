<?php get_header(); //appel du template header.php  ?>
<div id="content">
    <!-- /content -->
    <div class="grid-x grid-margin-x section">
        <div class="dernieres-actus actus cell small-12 medium-12 large-8">
            <?php
            $args = array(
	            'post_type' => 'post',
                'posts_per_page' => 2,
                'order' => 'DESC',
	            'tax_query' => array(
		            array(
			            'taxonomy' => 'visibilite',
			            'field'    => 'slug',
			            'terms'    => 'a_la_une',
                    ),
	            ),
            );

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
	            echo '<h2>News</h2>';
                echo '<div class="grid-x">';
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    echo '<div class="cell actu small-12 medium-6 large-6">';
	                echo '<div class="actu__image">';
                    the_post_thumbnail('actu-accueil');

	                $terms = get_the_terms( $post->ID, 'categorie' );
	                $term = array_pop($terms);
	                echo '<span class="actu__categorie">';
	                echo $term->name;
	                echo '</span>';
	                echo '</div>';
	                echo '<div class="actu__description">';
	                echo '<span class="actu__date">';
	                the_time('M j Y');
	                echo '</span>';
                    echo '<h3 class="actu__titre">'. get_the_title() .'</h3>';
	                echo '<span class="actu__extrait">';
	                the_excerpt();
	                echo '</span>';
	                echo '<a class="button_link_right" href="'.get_permalink().'">Read more<span class="arrow-grey"> &#xf178;</span></a>';
                    echo '</div></div>';
                }
                echo '</div>';
                // TODO Soigner le code de cette partie
                /* Restore original Post Data */
                wp_reset_postdata();
            } else {
                // no posts found
            }
            ?>
        </div>
        <div class="embed-spotify cell small-12 large-4">
            <h2>Spotify Playlist</h2>
            <iframe class="embed-spotify__player" src="https://open.spotify.com/embed?uri=spotify:user:spotify:playlist:<?php the_field('playlist_spotify');?>&theme=white" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
            <!-- TODO Mettre le code ACF -->
        </div>
    </div>
    <div class="grid-x grid-margin-x section">
        <div class="derniers-artistes cell small-12">
	        <?php
	        $args = array(
		        'post_type' => 'artiste',
		        'post_per_page' => 4,
		        'tax_query' => array(
			        array(
				        'taxonomy' => 'emplacement',
				        'field'    => 'slug',
				        'terms'    => 'a_la_une',
			        ),
		        ),
	        );

	        // The Query
	        $the_query = new WP_Query( $args );

	        // The Loop
	        if ( $the_query->have_posts() ) { ?>
		        <h2>Some artists</h2>
		        <div class="grid-x">
                    <?php
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                        <div class="bloc-artiste cell small-12 medium-6 large-6 ">
                            <a href="<?php echo get_home_url()?>/line-up" class="artiste">
                                <div class="artiste__box bloc-image-zoom ">
                                    <img class="image-zoom" src="<?php the_post_thumbnail_url('artiste-accueil'); ?>"/>
                                    <h4 class="artiste__nom"><?php the_title(); ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="center-link">
                        <a class="button_link_right" href="<?php echo get_home_url()?>/line-up">Line Up<span class="arrow-grey">  &#xf178;</span></a>
                    </div>
                    <?php
                    /* Restore original Post Data */
                    wp_reset_postdata();
                    } else {
                        // no posts found
                    }
                    ?>
                </div>
        </div>
    </div>
    <div class="grid-x grid-margin-x section homelinks">
        <?php $y = 0; ?>
	    <?php while( have_rows('liens_home')): the_row();

		    // vars

		    $image = get_sub_field('image');
		    $size = 'liens-home';
		    $link = get_sub_field('page');
		    $titre = get_sub_field('nom');

		    ?>
            <?php if ($y == 0) {
                echo '<div class="timetable cell small-12 medium-4 large-4">';
            } else if ($y == 1){
	            echo '<div class="tickets cell small-12 medium-4 large-4">';
	        } else if ($y == 2) {
	            echo '<div class="pratical-information cell small-12 medium-4 large-4">';
            } ?>

                <a class="homelink bloc-image-zoom" href="<?php echo $link; ?>">
                    <?php echo remove_width_and_height_attribute(wp_get_attachment_image( $image, $size, false, 'class=" homelink__img image-zoom "' )); ?>
                    <h5 class="absolute-centered-text homelink__title"><?php echo $titre; ?></h5>
                </a>
            </div>
		    <?php $y++; ?>

	    <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); //appel du template footer.php ?>
