<?php get_header(); //appel du template header.php  ?>

	<div id="content">
        <div class="grid-x grid-margin-x">
            <div class="small-12 cell h1">
                <h1><?php the_title() ?></h1>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            <div class="large-4 show-for-large show-for-xlarge cell liste-artistes ">
	            <?php
	            $args = array(
		            'post_type' => 'artiste',
		            'posts_per_page'	=> -1,
		            'orderby' => 'title',
		            'order' => 'ASC',
	            );

	            // The Query
	            $the_query = new WP_Query( $args );

	            // The Loop
	            if ( $the_query->have_posts() ) { ?>
		            <?php
		            while ( $the_query->have_posts() ) {
			            $the_query->the_post();
			            ?>
                            <a href="#<?php the_ID();?>" class="liste-artistes__artiste">
                                <h4 class=""><?php the_title(); ?></h4>
                            </a>
		            <?php }
		            /* Restore original Post Data */
		            wp_reset_postdata();
		            } else {
			            // no posts found
		            }
		            //TODO Mettre ce truc en sticky
		            ?>

            </div>
            <div class="medium-12 large-8 cell bloc-artistes-et-filtres">
                <div class="filters">
                    <div class="filters__button">
                        <a class="button_link_right" href="<?php echo get_home_url()?>/timetable">Timetable <span class="arrow-grey"> &#xf178;</span></a>
                    </div>
                    <div class="filters__jours">
                        <h6>Day</h6>
                        <?php  $terms = get_terms( 'jour' );
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        echo '<ul class="filters__taxo">';
                            foreach ( $terms as $term ) {
                            echo '<li class="filters__unetaxo" data-post-id="'.$term->name.'"><a href="#">' . $term->name . '</li></a>';
                            }
                            echo '</ul>';
                        } ?>
                    </div>
                </div>
                <div class="artistes">
	                <?php
	                $args = array(
		                'post_type' => 'artiste',
		                'posts_per_page'	=> -1,
		                'orderby' => 'title',
	                    'order' => 'ASC',
	                );

	                // The Query
	                $the_query = new WP_Query( $args );

	                // The Loop
	                if ( $the_query->have_posts() ) { ?>
		                <?php
		                while ( $the_query->have_posts() ) {
			                $the_query->the_post();
                            get_template_part( 'artistes' );
		                } ?>
		                <?php
		                /* Restore original Post Data */
		                wp_reset_postdata();
		                } else {
			                // no posts found
		                }
		                ?>
                        <div class='bloc-artiste cell small-12 medium-6 large-6 ajax-filters'>

                        </div>
                </div>
            </div>
        </div>
	</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>