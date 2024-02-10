<?php get_header(); ?>

<main class="single">
	<div class="content">
		<?php
		while (have_posts()) :
			the_post(); ?>
			<h1 class="page-title"><?php the_title() ?></h1>
			<?php the_content();  ?>
			<a class="btn ml" href="<?php the_field('cloud_link') ?>/" target="_blank" rel="noopener noreferrer">Перейти и скачать</a>
			<a class="btn" href="<?php echo get_post_type_archive_link('methodical') ?>" rel="noopener noreferrer">← назад</a>
	</div>
<?php endwhile;
?>
</div>
</main>

<?php get_footer() ?>;