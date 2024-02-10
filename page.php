<?php
get_header(); ?>

<main class="page">
	<div class="content">
		<h1 class="page-title"><?php the_title() ?></h1>
		<?php
		if (!is_page(3)) { ?>
			<div class="flex__wrapper">
				<div class="flex__image">
					<?php the_post_thumbnail() ?>
				</div>
				<div class="page__info">
					<?php the_content() ?>
				</div>
			</div>
			<?php
			if (have_rows('about_experience')) { ?>
				<?php get_template_part('partials/about-experience'); ?>
			<?php
			} else { ?>
				<?php get_template_part('partials/contacts'); ?>
			<?php
			}
			?>
		<?php } else {
			the_content();
		}
		?>
	</div>
</main>

<?php get_footer(); ?>