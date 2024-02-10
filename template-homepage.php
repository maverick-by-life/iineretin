<?php
/*Template name: Шаблон домашней страницы*/
get_header(); ?>

<main class="home">
	<div class="home__content">
		<?php the_content() ?>
		<div class="home__bg-animation">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
</main>
<?php get_footer(); ?>