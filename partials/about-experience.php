<ul class="about-experience">
	<?php while (have_rows('about_experience')) {
		the_row(); ?>
		<li><?php the_sub_field('experience'); ?></li>
	<?php	} ?>
</ul>