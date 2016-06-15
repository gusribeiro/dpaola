<?php #Paginação ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
	</div>
<?php endif; ?>

<?php #Não há posts ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h2 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h2>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php endif; ?>

<?php if (is_home() || is_category("works")) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<li>
			<?php if (has_post_thumbnail()) : the_post_thumbnail(); else: ?>
				<img src="<?php bloginfo('template_url') ?>/img/no_image.gif" alt="no image" />
			<?php endif; ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php echo get_post_meta($post->ID, 'skills', true) ?>&nbsp;</p>
			<cite><?php the_time('F, Y') ?></cite>
			<?php is_new(); ?>
		</li>
	<?php endwhile; ?>
<?php endif; ?>

<?php if (is_single() && in_category("works")) : ?>
	<?php the_post(); ?>
		<div id="works">
			<p class="back"><a href="./">All works</a></p>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php if (get_post_meta($post->ID, 'url', true) != "") echo "<a href='".get_post_meta($post->ID, 'url', true)."' target='_new' class='view_online'>View online</a>"; ?>
			<div class="post"><?php the_content(); ?></div>
		</div>
<?php endif; ?>

<?php if (is_single() && in_category("blog")) : ?>
	<?php the_post(); ?>
		<div id="works">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="post"><?php the_content(__("Continue reading <span class='meta-nav'>&rarr;</span>")); ?></div>
		</div>
<?php endif; ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
	</div>
<?php endif; ?>
