
				<h1>Executive Board</h1>
<?php

$boardQuery = array('post_type' => 'exec-board', 'posts_per_page' => -1, 'orderby' => 'leader-form-order', 'order' => 'ASC');
$boardLoop = new WP_Query($boardQuery);

while ($boardLoop->have_posts()) {

	$boardLoop->the_post();

	$name = get_the_title();
	$bio = get_the_content();
	$position = get_post_meta($post->ID, 'leader-form-position', true);
	$email = get_post_meta($post->ID, 'leader-form-email', true);
	$picture = get_the_post_thumbnail($post->ID, 'thumbnail');
	$slug = $post->post_name;
?>

				<article>
					<?php echo $picture; ?>
					<h2><?php echo $name; ?></h2>
					<h3><?php echo $position; ?></h3>
					<a href="mailto:<?php echo $email; ?>" class="email">E-Mail</a> - 
					<a href="#bio-<?php echo $slug; ?>" class="fancybox">See Bio</a>
					<p id="bio-<?php echo $slug; ?>" class="bio"><?php echo $bio; ?></p>
				</article>

<?php
}
?>