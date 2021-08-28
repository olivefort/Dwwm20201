<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
	<header class="main-header">
		<div class="container">
			<div class="logo">
				<a href="<?php echo home_url(); ?>#">DWWM</a>
			</div>
			<nav class="main-nav">
				<button aria-expanded="false" aria-controls="main-menu">Menu</button>
				<?php 
				wp_nav_menu(
					array(
					'theme_location'=>'menu-du-header',
					'items_wrap'    => '<ul id="main-menu" class="menu" hidden>%3$s</ul>',
					)
				);?>
			</nav>
		</div>
	</header>
	