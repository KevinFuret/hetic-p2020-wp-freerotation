<?php get_header(); //appel du template header.php  ?>

    <div id="content">
        <div class="grid-x grid-margin-x">
            <div class="small-12 cell h1">
                <h1>News</h1>
            </div>
        </div>
        <div class="grid-x grid-margin-x section align-center">

            <div class="small-12 medium-10 large-8 cell">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'order' => 'DESC',
                );

                // The Query
                $the_query = new WP_Query( $args );

                // The Loop
                if ( $the_query->have_posts() ) {
                    echo '<div class="grid-x align-center">';
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        echo '<div class="cell actu small-12 medium-10 large-6 news">';
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
                        echo '<a class="button_link_right" href="'.get_permalink().'">Read<span class="arrow-grey"> &#xf178;</span></a>';
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
            </div>

        </div>
    </div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>