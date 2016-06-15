<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
	<?php include("about.php"); ?>
	<div id="author">
		<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
		<h1>Contact</h1>
		<ul>
			<li>Email: <a href="mailto:<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a></li>
			<li>Twitter: <a href="http://twitter.com/<?php echo $curauth->yim; ?>">@<?php echo $curauth->yim; ?></a></li>
			<li>Dribble: <a href="http://dribbble.com/<?php echo $curauth->googleplus; ?>"><?php echo $curauth->googleplus; ?></a></li>
			<li>Phone: <?php echo $curauth->aim; ?></li>
		</ul>
	</div>
</div>
<?php get_footer(); ?>