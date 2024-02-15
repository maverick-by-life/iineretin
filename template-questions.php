<?php
/*Template name:  Шаблон страницы вопрос-ответ*/
get_header(); ?>

<main class="questions">
	<div class="content">
		<h1 class="page-title"><?php the_title() ?></h1>
		<ul class="questions__list">
			<?php
			if (have_rows('questions')) {
				while (have_rows('questions')) {
					the_row(); ?>
					<li class="questions__item">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/question_icon.png" alt="вопрос">
						<h2><?php the_sub_field('question'); ?></h2>
						<span class="questions__icon">+</span>
						<p class="questions__content-box"><?php the_sub_field('response'); ?></p>
					</li>
			<?php	}
			}
			?>
		</ul>
	</div>
</main>
<?php get_footer(); ?>