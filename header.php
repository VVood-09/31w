<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header id="masthead" class="site__header">
			<div class="header__first_div">
				<?= get_custom_logo(); ?>
				<?php
				// affichage du menu principal
				wp_nav_menu(array(
				"menu" => "principal",
				"container" => "nav",
				"container_class" => "menu__principal"
				)); ?>
				<?php wp_head(); ?>
			</div>
			<div class="site__branding">
				<div class="header_title_box">
					<h1 class="site__title">
							<!-- <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						</a> -->
						<?php bloginfo('name'); ?>
					</h1>

					<?php
					$under_description = get_bloginfo('description', 'display');
					if ($under_description || is_customize_preview()) :
						?>
						<p class="site__description"><?php echo $under_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped	
														?></p>
					<?php endif; ?>
				</div>
				<div class="header__sidebar">
					<div><?php get_sidebar('header-recherche'); ?></div>
					<div><?php get_sidebar('header-sociaux'); ?></div>
				</div>
			</div>
		</header><!-- #masthead -->
		<aside class="site__menu">
			<input type="checkbox" name="chk-burger" id="chk-burger" class="chk-burger">
			<label for="chk-burger" class="burger">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 259">
					<path stroke-linecap="round" stroke-width="49.3" d="M30 230h250M30 130h250M30 30h250"/>
				</svg>
			</label>
			<nav class="menu__aside">
				<h2>Menu secondaire</h2>
			<?php wp_nav_menu(array(
				"menu" => "aside",
				"container" => "",
				"container_class" => "",
			));	?>
			</nav>
		</aside>
		<aside class="site__sidebar">
			<div><?php get_sidebar('aside-1'); ?></div>
			<div><?php get_sidebar('aside-2'); ?></div>
		</aside>