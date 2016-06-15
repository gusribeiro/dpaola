<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title>
			<?php
				/*
				 * Print the <title> tag based on what is being viewed.
				 */
				global $page, $paged;
			
				wp_title( '-', true, 'right' );
			
				// Add the blog name.
				bloginfo( 'name' );
			
				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 )
					echo ' - ' . sprintf( __( 'Page %s', 'dpaola' ), max( $paged, $page ) );
			?>
		</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/default.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php
			/* We add some JavaScript to pages with the comment form
			 * to support sites with threaded comments (when in use).
			 */
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
		
			/* Always have wp_head() just before the closing </head>
			 * tag of your theme, or you will break many plugins, which
			 * generally use this hook to add elements to <head> such
			 * as styles, scripts, and meta tags.
			 */
			wp_head();
		?>
	</head>
	<body <?php body_class(); ?>>
		<div id="wrap">