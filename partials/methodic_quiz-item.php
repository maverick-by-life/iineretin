<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<li class="methodic-item">
			<?php the_post_thumbnail() ?>
			<div class="wrapper">
				<h2><?php echo get_the_title($post) ?></h2>
				<?php the_content() ?>
				<a class="btn ml" href="<?php the_permalink(); ?>">Подробнее</a>
			</div>
		</li>
	<?php endwhile;
else : ?>
	<h3>Записи отсутствуют</h3>
<?php endif;
?>