<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="https://freerotation.ovh/wp-content/themes/freerotation/manifest.json">
    <meta name="theme-color" content="#0ee6d0">

    <!-- Appel du fichier style.css de notre thème -->

    <!--
            Tout le contenu de la partie head de mon site
         -->

    <!-- Execution de la fonction wp_head() obligatoire ! -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
        $theurl = get_field('background_image_header', 'options');
    ?>
    <header id="header" style="background: url(<?php echo $theurl; ?>); background-size: cover;">
        <div class="logo cell">
            <h1 class="">
                <a href="<?php echo home_url() ?>" class="">
			        <?php

			        $image = get_field('logo_du_site','option');
			        $size = 'full'; // (thumbnail, medium, large, full or custom size)

			        if( $image ) {

				        echo wp_get_attachment_image( $image, $size );

			        }

			        ?>
                </a>
            </h1>
           <span class="date">

               <?php

               if( have_rows('date_du_festival', 'options') ):

               while( have_rows('date_du_festival', 'options') ): the_row();

               $date_de_debut = get_sub_field('date_de_debut');
               $date_de_fin = get_sub_field('date_de_fin_du_festival'); ?>

	           <?php echo $date_de_debut; ?><span class="arrow-white"> &#xf178; </span><?php echo $date_de_fin; ?></span>
	        <?php endwhile; ?>
	        <?php endif; ?>
        </div>
        <nav class="nav" role="navigation">
            <div class="nav__container">
                <div class="nav__title">
                    <?php
                    $url = home_url( '/', 'https' );
                    ?>
                    <a href="<?php echo $url; ?>" class="nav__title-link">
		                <?php

		                $image = get_field('logo_du_site','option');
		                $size = 'full'; // (thumbnail, medium, large, full or custom size)

		                if( $image ) {

			                echo wp_get_attachment_image( $image, $size );

		                }

		                ?>
                    </a>
                </div>
                <?php // SYNTAXE : wp_nav_menu( array $args = array() )
                $args=array(
                    'theme_location' => 'header', // nom du slug
                    'menu' => 'header_fr', // nom à donner cette occurence du menu
                    'menu_class' => 'menu_header', // class à attribuer au menu
                    'menu_id' => 'menu_id' // id à attribuer au menu
                    // voir les autres arguments possibles sur le codex
                );
                wp_nav_menu($args);?>
                <a href="#" class="nav__burger"></a>
            </div>
        </nav>
        <nav class="navtop" role="navigation">
            <div class="navtop__container">
			    <?php // SYNTAXE : wp_nav_menu( array $args = array() )
			    $args=array(
				    'theme_location' => 'header', // nom du slug
				    'menu' => 'header_fr', // nom à donner cette occurence du menu
				    'menu_class' => 'menu_header', // class à attribuer au menu
				    'menu_id' => 'menu_id' // id à attribuer au menu
				    // voir les autres arguments possibles sur le codex
			    );
			    wp_nav_menu($args);?>
            </div>
        </nav>
    </header>