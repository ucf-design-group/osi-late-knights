
				<h1>Event Listing</h1>

<?php

$eventQuery = array('post_type' => 'osi-events', 'posts_per_page' => -1, 'orderby' => 'meta_value', 'order' => 'DESC', 'meta_key' => 'oe-form-start', 'meta_value' => time(), 'meta_compare' => '>=');
$eventLoop = new WP_Query($eventQuery);
$counter = 0;

while ($eventLoop->have_posts()) {

	$eventLoop->the_post();
	$counter++;

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

?>
				<article>
					<h2><?php echo $name; ?></h2>
					<div class="datetime"><?php echo $datetime; ?><?php if ($location) echo ","; ?></div>
					<div class="location"><?php echo $location; ?></div>
					<div class="description"><?php echo $description; ?></div>
<?php
	if ($url) {
?>
					<div class="link"><a href="<?php echo $url; ?>">Learn More</a></div>
<?php
}
?>
				</article>
<?php
}

if ($counter == 0) {
?>

				<article>
					<p>There aren't any events to show at the moment.</p>
				</article>

<?php
}
?>