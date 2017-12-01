<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage freerotation
 * @since bikerLover@1.0.0
 */

get_header(); ?>

		<div class="grid-x page-404">
			<div class="cell small-12">
				<?php

					$image = get_field('image404', 'options');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)

					if( $image ) {

						echo wp_get_attachment_image( $image, $size );

					}

					?>
				<h2><?php the_field("texte404", "options") ?></h2>
                <a class="button_link_right" href="<?php echo get_home_url()?>"><span class="arrow-grey-reverse"> &#xf177;</span> Back to the Homepage</a>
			</div>
		</div><!-- 404 -->

<?php get_footer(); ?>