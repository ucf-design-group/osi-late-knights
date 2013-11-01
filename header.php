<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
		<script type="text/javascript" src="http://use.typekit.net/tkc8rlv.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>
<?php
	global $post;
	if ($post->post_type == "page")
		$body_class = 'class="page-' . $post->post_name . '"';
	else if ($post->post_type != "")
		$body_class = ($post->post_type != 'post') ? 'class="post-' . $post->post_type . '"' : 'class="post-default"';
	else
		$body_class = "";
?>
	<body <?php echo $body_class; ?>>
		<div class="page">
			<header>
				<nav class="main-menu full">
					<div class="cityscape"></div>
					<div class="screen-reader-text skip-link"><a href="#feature" title="Skip to content">Skip to content</a></div>
					<div class="compact-menu">
						<a href="#" class="menu-toggle">Menu</a>
					</div>
					<ul>
<?php
							$current_ID = $post->ID;

							$navQuery = array('post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => -1, 'meta_key' => 'page-form-order', 'orderby' => 'meta_value', 'order' => 'ASC');
							$navLoop = new WP_Query($navQuery);

							while ($navLoop->have_posts()) {

								$navLoop->the_post();

								$name = get_the_title();
								$link = "#" . $post->post_name;
								$nav_li_class = (get_the_ID() == $current_ID) ? ' class="current" ' : '';

								if (get_post_meta($post->ID, 'page-form-visible', true) == 'show') {
							
?>
						<li<?php echo $nav_li_class; ?>><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
<?php 							}
							} ?>
					</ul>
				</nav>
			</header>
<!-- HEADER END -->
