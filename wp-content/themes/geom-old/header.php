<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--[if lte IE 7]><script>document.location = '<?php bloginfo('template_directory'); ?>/oldbrowser.html';</script><![endif]-->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'صفحه %s', '_s' ), max( $paged, $page ) );

	//if (wp_title('')) wp_title(''); else bloginfo( 'name' );
	?>
 </title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Lato:400,900,700' rel='stylesheet' type='text/css'>
<link type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" rel="shortcut icon" />
<meta name="description" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel='stylesheet' href="<?php bloginfo('template_directory'); ?>/style.css" media="Screen,print">
<link rel="author" href="https://plus.google.com/+JavadEvazzadeh?rel=author"/>
<link rel="publisher" href="https://plus.google.com/+JavadEvazzadeh?rel=author"/>
<link rel="profile" href="http://microformats.org/profile/hcard">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="logo">
				<h1><a href="<?php bloginfo('siteurl'); ?>/blog/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo-header.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo('description'); ?>"></a></h1>
				<h2><?php bloginfo('description'); ?></h2>
		</div>
	</header><!-- #masthead .site-header -->
	<div id="main">