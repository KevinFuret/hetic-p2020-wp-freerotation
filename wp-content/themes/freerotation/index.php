<?php get_header(); //appel du template header.php  ?>

    <div id="content">
        <h1><?php echo the_title(); ?></h1>
		<?php
		// boucle WordPress
		if (have_posts()){
			while (have_posts()){
				the_post();
				?>
                <div class="section"><?php the_content(); ?></div>
				<?php
			}
		}
		else {
			?>
            Nous n'avons pas trouvé d'article répondant à votre recherche
			<?php
		}
		?>
    </div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>