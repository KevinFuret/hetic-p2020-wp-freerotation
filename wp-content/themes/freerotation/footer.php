        <footer id="footer">
            <div class="grid-x footer">
                <div class="small-12 medium-4 large-4 footer__rs cell">
                    <?php while( have_rows('rs', 'options')): the_row();

                        // vars
                        $image = get_sub_field('logo_rs');
                        $link = get_sub_field('lien_rs');
	                    $size = "logo-rs-footer";

                        ?>
                        <div class="footer__unrs">

                            <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
                                <?php endif; ?>

                                <?php echo remove_width_and_height_attribute(wp_get_attachment_image( $image, $size)); ?>

                                <?php if( $link ): ?>
                            </a>
                        <?php endif; ?>

                        </div>

                    <?php endwhile; ?>
                </div>
                <div class="small-12 medium-4 large-4 footer__plan">

                    <?php
                    $args=array(
	                    'theme_location' => 'footer', // nom du slug
	                    'menu' => 'footer_nav', // nom à donner cette occurence du menu
	                    'menu_class' => 'menu_footer' // class à attribuer au menu
	                    // voir les autres arguments possibles sur le codex
                    );
                    wp_nav_menu($args);?>
                </div>
                <div class="small-12 medium-4 large-4 footer__partenaires">
                    <?php $i = 0; ?>
	                <?php while( have_rows('liste_des_partenaires', 'options')): the_row();

		                // vars

		                $image = get_sub_field('logo_partenaire');
		                $link = get_sub_field('lien_partenaire');
		                $size = "logo-rs-footer";

		                ?>
                        <?php if($i%2==0) {
                            echo '<div class="footer__groupepartenaire">';
		                } ?>

                        <div class="footer__unpartenaire">

			                <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
				                <?php endif; ?>

	                            <?php echo remove_width_and_height_attribute(wp_get_attachment_image( $image, $size)); ?>


                                <?php if( $link ): ?>
                            </a>
		                <?php endif; ?>

                        </div>
		                <?php if($i%2==1) {
			                echo '</div>';
		                } ?>
                        <?php $i++; ?>

	                <?php endwhile; ?>
                </div>
            </div>
            <div class="subfooter small-12">
                <p>©2017 Freerotation</p>
                <!-- TODO ACF Code -->
            </div>
        </footer>

        <!-- Execution de la fonction wp_footer() obligatoire ! -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php wp_footer();  ?>
    </body>
</html>