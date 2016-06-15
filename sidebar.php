<div id="aside">
	<?php $heading_tag = (is_home() || is_front_page()) ? 'h1' : 'div'; ?>
	<<?php echo $heading_tag; ?> class="logo">
		<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home"><?php bloginfo('name'); ?></a>
	</<?php echo $heading_tag; ?>>
	
	<p class="status"><span>Hello!</span> <?php echo get_bloginfo('description'); ?></p>
	
	<p class="title">Works</p>
	<ul>
		<?php query_posts("category_name=works"); ?>
		<?php while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; wp_reset_query(); ?>
	</ul>

	<p class="title">Info</p>
	<ul>
		<li><a href="javascript:void(0)" class="about">About me</a></li>
		<?php #<li><a href="javascript:void(0)">Blog</a></li> ?>
		<li><a href="/author/admin">Contact</a></li>
	</ul>
</div>