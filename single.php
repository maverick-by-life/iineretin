<?php get_header(); ?>

<main class="single">
	<div class="content">
		<?php
		while (have_posts()) :
			the_post(); ?>
			<h1 class="page-title"><?php the_title() ?></h1>
			<a class="btn ml" href="<?php echo get_post_type_archive_link('quiz') ?>" rel="noopener noreferrer">← назад</a>
			<?php the_content();  ?>
	</div>
<?php endwhile;
?>
</div>
</main>

<?php get_footer() ?>;