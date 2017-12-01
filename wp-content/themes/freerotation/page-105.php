<?php get_header(); //appel du template header.php  ?>

	<div id="content">
		<h1><?php echo the_title()?></h1>
		<?php  $terms = get_terms( 'jour' );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $term ) {
				$tableau = array();
				$tableau[] = $term->name;
				//echo var_dump($tableau[0]);
				// TODO code à revoir
			}
		} ?>
		<div class="grid-x timetable section">
            <div class="cell small-12 filters">
                <div class="filters__button">
                    <a class="button_link_right" href="<?php echo get_home_url()?>/line-up"><span class="arrow-grey-reverse"> &#xf177;</span> Line Up</a>
                </div>
            </div>
			<div class="cell small-12 medium-4 timetable__jour">
				<div class="timetable__groupejour text-center">
                    <span class="timetable__nomjour">Friday</span><span class="timetable__numérojour">5</span>
				</div>
				<div>
                    <table>
	                    <?php

	                    // query
	                    $the_query = new WP_Query(array(
		                    'post_type'			=> 'artiste',
		                    'posts_per_page'	=> -1,
		                    'meta_key'			=> 'date_et_heure_de_passage',
		                    'orderby'			=> 'meta_value',
		                    'order'				=> 'ASC',
		                    'tax_query' => array(
			                    array(
				                    'taxonomy' => 'jour',
				                    'field'    => 'slug',
				                    'terms'    => 'friday',
			                    ),
		                    ),
	                    ));

	                    ?>
	                    <?php if( $the_query->have_posts() ): ?>
                            <ul>
			                    <?php while( $the_query->have_posts() ) : $the_query->the_post();

				                    $class = get_field('date_et_heure_de_passage') ? 'class="date_et_heure_de_passage"' : '';
				                    $heureDeDébut = get_field('date_et_heure_de_passage', false, false);
				                    $heureDeDébut = new DateTime($heureDeDébut);
				                    $heureDeFin = get_field('date_et_heure_de_fin');
				                    ?>
                                    <tr>
                                        <td style="background: url('<?php the_post_thumbnail_url("artiste-timeline") ?>');background-size: cover;
                                                background-position: 1000px 1000px; background-repeat: no-repeat;" class="<?php echo $class; ?>">
                                            <span class="timetable__débutdate"><?php echo $heureDeDébut->format('H:i');?></span><h4 class="absolute-centered-text"><?php the_title() ?></h4><span class="timetable__findate"><?php echo $heureDeFin?></span>
                                        </td>
                                    </tr>
			                    <?php endwhile; ?>
                            </ul>
	                    <?php endif; ?>

	                    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
                    </table>
				</div>
			</div>
			<div class="cell small-12 medium-4 timetable__jour">
				<div class="timetable__groupejour text-center">
                    <span class="timetable__nomjour">Saturday</span><span class="timetable__numérojour">6</span>
				</div>
				<div>
					<table>
						<?php

						// query
						$the_query = new WP_Query(array(
							'post_type'			=> 'artiste',
							'posts_per_page'	=> -1,
							'meta_key'			=> 'date_et_heure_de_passage',
							'orderby'			=> 'meta_value',
							'order'				=> 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'jour',
									'field'    => 'slug',
									'terms'    => 'saturday',
								),
							),
						));

						?>
						<?php if( $the_query->have_posts() ): ?>
                            <ul>
								<?php while( $the_query->have_posts() ) : $the_query->the_post();

									$class = get_field('date_et_heure_de_passage') ? 'class="date_et_heure_de_passage"' : '';
									$heureDeDébut = get_field('date_et_heure_de_passage', false, false);
									$heureDeDébut = new DateTime($heureDeDébut);
									$heureDeFin = get_field('date_et_heure_de_fin');
									?>
                                    <tr>
                                        <td style="background: url('<?php the_post_thumbnail_url("artiste-timeline") ?>');background-size: cover;
                                                background-position: 1000px 1000px; background-repeat: no-repeat;" class="<?php echo $class; ?>">
                                            <span class="timetable__débutdate"><?php echo $heureDeDébut->format('H:i');?></span><h4 class="absolute-centered-text"><?php the_title() ?></h4><span class="timetable__findate"><?php echo $heureDeFin?></span>
                                        </td>
                                    </tr>
								<?php endwhile; ?>
                            </ul>
						<?php endif; ?>

						<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
					</table>
				</div>
			</div>
			<div class="cell small-12 medium-4 timetable__jour">
				<div class="timetable__groupejour text-center">
					<span class="timetable__nomjour">Sunday</span><span class="timetable__numérojour">7</span>
				</div>
				<div>
					<table>
						<?php

						// query
						$the_query = new WP_Query(array(
							'post_type'			=> 'artiste',
							'posts_per_page'	=> -1,
							'meta_key'			=> 'date_et_heure_de_passage',
							'orderby'			=> 'meta_value',
							'order'				=> 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'jour',
									'field'    => 'slug',
									'terms'    => 'sunday',
								),
							),
						));

						?>
						<?php if( $the_query->have_posts() ): ?>
                            <ul>
								<?php while( $the_query->have_posts() ) : $the_query->the_post();

									$class = get_field('date_et_heure_de_passage') ? 'class="date_et_heure_de_passage"' : '';
									$heureDeDébut = get_field('date_et_heure_de_passage', false, false);
									$heureDeDébut = new DateTime($heureDeDébut);
									$heureDeFin = get_field('date_et_heure_de_fin');
									?>
                                    <tr>
                                        <td style="background: url('<?php the_post_thumbnail_url("artiste-timeline") ?>');background-size: cover;
                                                background-position: 1000px 1000px; background-repeat: no-repeat;" class="<?php echo $class; ?>">
                                            <span class="timetable__débutdate"><?php echo $heureDeDébut->format('H:i');?></span><h4 class="absolute-centered-text"><?php the_title() ?></h4><span class="timetable__findate"><?php echo $heureDeFin?></span>
                                        </td>
                                    </tr>
								<?php endwhile; ?>
                            </ul>
						<?php endif; ?>

						<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
					</table>
				</div>
			</div>
		</div>
	</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>