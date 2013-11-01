<?php /* Template Name: Main */

get_header();

$pageQuery = array('post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => -1, 'meta_key' => 'page-form-order', 'orderby' => 'meta_value', 'order' => 'ASC');
$pageLoop = new WP_Query($pageQuery);

while ($pageLoop->have_posts()) {

	$pageLoop->the_post();

?>

			<section>
				<div class="wrap" id="<?php echo $post->post_name; ?>">
<?php

					get_template_part('content', $post->post_name);

?>
				</div>
			</section>

<?php
}
?>

			<div class="stars">
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
				<div class="star">.</div>
			</div>

<?php get_footer(); ?>