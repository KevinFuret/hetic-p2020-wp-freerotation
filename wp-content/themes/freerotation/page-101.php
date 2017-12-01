<?php get_header(); //appel du template header.php  ?>

    <div id="content">
        <h1><?php the_title();?></h1>
        <div class="grid-x grid-margin-x ">

            <div class="cell small-12 large-6">
                <h2>About us</h2>
				<p><?php the_field('about_us') ?></p>
            </div>
            <div class="cell small-12 large-6">
                <h2>Location</h2>
				<p><?php the_field('location') ?></p>
            </div>
			<?php echo do_shortcode( '[wpgmza id="1"]' ); ?>
            <div class="cell small-12">
                <h2>Our ethics</h2>
				<?php if( have_rows('our_ethics') ):

					while( have_rows('our_ethics') ): the_row();
						$subtitle = get_sub_field('subtitle');
						?>


                        <p><span class="colored-text"><?php echo $subtitle;?></span></p>

						<?php
						if( have_rows('paragraph') ):

							// loop through the rows of data
							echo '<ul class="list grid-x ">';
							while ( have_rows('paragraph') ) : the_row();
								?>

                                <li class="small-12 medium-6 large-4"><?php the_sub_field('text_paragraph');?></li>

							<?php endwhile;

						else :

							// no rows found

						endif;

						?>
					<?php endwhile; ?>

				<?php endif; ?>
                </ul>
            </div>
            <div class="cell small-12">
                <h2>FAQ</h2>
                <ul class="accordion grid-x" data-accordion data-multi-expand="true" data-allow-all-closed="true">
	                <?php if( have_rows('faq') ): ?>

			                <?php while( have_rows('faq') ): the_row();

				                // vars
				                $question = get_sub_field('question');
				                $answer = get_sub_field('answer');

				                ?>

                                <li class="accordion-item small-12" data-accordion-item>
                                    <!-- Accordion tab title -->
                                    <a href="#" class="accordion-title"><?php echo $question;?></a>

                                    <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                                    <div class="accordion-content" data-tab-content>
                                        <p><?php echo $answer;?></p>
                                    </div>
                                </li>
                                    </a>

                                </li>

			                <?php endwhile; ?>

	                <?php endif; ?>
                </ul>
            </div>
        </div>
    </div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>