<?php /* Template Name: Maintenence */ ?>

<?php get_header(); ?>
<?php if (is_user_logged_in()) : ?>
	<?php get_sidebar(); ?>
<?php else: ?>
	<div id="maintenence">
		<img src="<?php bloginfo('template_directory'); ?>/img/maintenence.png" />
	</div>
<?php endif; ?>
<?php get_footer(); ?>