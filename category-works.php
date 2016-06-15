<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
	<?php include("about.php"); ?>
	<ul class="work_list">
		<?php get_template_part("loop"); ?>
	</ul>
</div>
<?php get_footer(); ?>