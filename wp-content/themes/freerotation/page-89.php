<?php get_header(); //appel du template header.php  ?>

	<div id="content">
		<h1><? the_title()?></h1>
        <div class="grid-x contact">
            <div class="cell small-12">
                <?php echo do_shortcode('[contact-form-7 id="177" title="Contact form 1"]'); ?>
            </div>
        </div>
	</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>