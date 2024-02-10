<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="description" content="Иван Неретин Учитель истории и обществознания в гимназии №1 г.Воронеж" />
	<title>
		<?php is_archive() ? post_type_archive_title() : the_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body>
	<?php
	if (!is_404()) { ?>
		<header class="header">
			<aside class="sidebar">
				<nav class="menu">
					<?php
					wp_nav_menu([
						'theme_location' => 'main-menu',
						'menu_class' => 'menu-list',
						'container' => 'ul'
					])
					?>
				</nav>
				<ul class="socials">
					<?php
					if (have_rows('socials', 7)) {
						while (have_rows('socials', 7)) {
							the_row(); ?>
							<li class="socials__item">
								<a href="<?php the_sub_field('socials_link'); ?>" target="_blank" rel="noopener noreferrer">
									<img src="<?php the_sub_field('socials_icon'); ?>" alt="<?php the_sub_field('socials_title'); ?>" />
								</a>
								<span><?php the_sub_field('socials_title'); ?></span>
							</li>
					<?php	}
					}
					?>
				</ul>
			</aside>
			<button class="show-menu-btn" type="button">
				<img class="burger" src="<?php bloginfo('template_url') ?>/assets/img/burger.svg" alt="">
				<img class="close" src="<?php bloginfo('template_url') ?>/assets/img/close.svg" alt="">
			</button>
		</header>
	<?php	} ?>