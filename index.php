<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
	<?php include("about.php"); ?>
	<?php get_template_part("loop"); ?>
</div>
<?php get_footer(); ?>