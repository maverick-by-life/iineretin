<?php get_header(); ?>
<main class="archive">
	<div class="content">
		<h1 class="page-title"><?php post_type_archive_title() ?></h1>
		<ul class="posts-list">
			<?php if (is_post_type_archive('novelty')) {
				get_template_part('partials/news-item');
			} else {
				get_template_part('partials/methodic_quiz-item');
			} ?>
		</ul>
		<?php get_template_part('partials/pagination'); ?>
	</div>
</main>
<?php get_footer(); ?>