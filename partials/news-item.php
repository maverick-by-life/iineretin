<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<li class="news-item">
			<div class="flex__wrapper">
				<div class="flex__image">
					<?php the_post_thumbnail() ?>
				</div>
				<div class="page__info">
					<h2><?php echo get_the_title() ?></h2>
					<?php the_content() ?>
					<span> <?php the_date('j F Y'); ?> г.</span>
				</div>
			</div>
		</li>
	<?php endwhile;
else : ?>
	<h3>Записи отсутствуют</h3>
<?php endif;
?>