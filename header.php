<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @since Grey Opaque 1.0.0
 */
?>
<!DOCTYPE html>
<html class="<?php echo greyopaque_browser::css(); ?>" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php
	/**
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title('|', true, 'right');

	// Add the blog name.
	bloginfo('name');

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if($site_description && (is_home() || is_front_page())) {
		echo " | $site_description";
	}

	// Add a page number if necessary:
	if($paged >= 2 || $page >= 2) {
		echo ' | ' . sprintf(__('Page %s', 'grey-opaque'), max($paged, $page));
	}

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php //bloginfo('stylesheet_url'); ?>" /> -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
	/**
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if(is_singular() && get_option( 'thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	/**
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<?php do_action('greyopaque_header'); ?>
		</div><!-- #masthead -->
	</div><!-- #header -->

	<?php
	if(function_exists('bcn_display')) {
		echo '<div id="breadcrumb">';
		echo '<p>';
		echo '<span id="breadcrumb-you-are-here">' . __('You are here:', 'grey-opaque') . '</span>';
		echo '<span id="breadcrumb-path">';
		bcn_display();
		echo '</span>';
		echo '</p>';
		echo '</div>';
	} else {
		echo '<div id="before-content"><p>&nbsp;</p></div>';
	}
	?>

	<div id="main">