<div class="small-12 medium-6 cell">
	<div class="artiste__date"><?php

		$date = get_field('date_et_heure_de_passage');
		$pieces = explode(" ", $date);
		// name of day ->  $pieces[0];
		// numero of day -> $pieces[1];
		// month -> $pieces[2]
		// hour -> $pieces[3]
		echo $pieces[0].' '.$pieces[1].' '.$pieces[2].' '.'<span class="arrow-grey">  &#xf178;</span>'.' '.$pieces[3];

		?></div>
	<div class="artiste__bio">
		<h6>BIO</h6>
		<?php the_content() ?>
	</div>
</div>
<div class="small-12 medium-6 cell">
	<div class="artiste__playlist"><?php the_field('mix_soundcloud')?></div>
</div>
