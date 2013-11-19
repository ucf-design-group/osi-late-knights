<?php

$eventQuery = array('post_type' => 'osi-events', 'posts_per_page' => 1, 'orderby' => 'meta_value', 'order' => 'DESC', 'meta_key' => 'oe-form-start', 'category_name' => 'feature');
$eventLoop = new WP_Query($eventQuery);

if ($eventLoop->have_posts()) {

	$eventLoop->the_post();

	$name = get_the_title();
	$start = get_post_meta($post->ID, 'oe-form-start', true);
	$end = get_post_meta($post->ID, 'oe-form-end', true);
	$location = get_post_meta($post->ID, 'oe-form-loc', true);
	$description = get_the_content();
	$poster = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
	$url = get_post_meta($post->ID, 'oe-form-url', true);

	if ($end == "none" && date("i", $start) == "00")
		$datetime = date("F jS, ga", $start);
	else if ($end == "none")
		$datetime = date("F jS, g:ia", $start);
	else if (date("i", $start) == "00" && date("i", $end) == "00")
		$datetime = "<span>" . date("F jS", $start) . ",</span> <span>" . date("ga", $start) . " - " . date("ga", $end) . "</span>";
	else
		$datetime = date("F jS, g:ia", $start) . " - " . date("g:ia", $end);


	if ($poster) {
?>
				<article class="poster" style="background-image: url(<?php echo $poster; ?>); filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $poster; ?>', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $poster; ?>', sizingMethod='scale')""></article>
<?php
}
?>
				<article class="info">
					<h1><span>Late Knights</span></h1>
					<h2>presents...</h2>
					<div class="name"><?php echo $name; ?></div>
					<div class="datetime"><?php echo $datetime; ?>,</div>
					<div class="location"><?php echo $location; ?></div>
					<div class="description"><?php echo $description; ?></div>
<?php
	if ($url) {
?>
					<div class="link"><a href="<?php echo $url; ?>">Learn More</a></div>
<?php
	}
?>
					<div class="posterlink"><a href="<?php echo $poster; ?>" class="fancybox">See Poster</a></div>
				</article>
<?php
}
?>