<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8" />
 <base href="<?php bloginfo( 'url' ); ?>/" />
 <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->
<?php //if single post then add excerpt as meta description
if (is_single()) { ?>
 <title><?php wp_title('',true,'right'); ?></title>
 <meta name="Description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<?php //if homepage use standard meta description
} else if(is_home())  { ?>
 <title><?php bloginfo('name'); ?></title>
 <meta name="Description" content="<?php bloginfo('description') ?>">
<?php //if homepage use standard meta description
} else if( is_page())  { ?>
 <title><?php wp_title('',true,'right'); ?></title>
 <meta name="Description" content="<?php bloginfo('description') ?>">
<?php //if category page, use category description as meta description
} else if(is_category()) { ?>
 <title><?php wp_title('|',true,'right'); ?> <?php bloginfo('name'); ?></title>
 <meta name="Description" content="<?php $categories = get_the_category($post->ID); if($categories){echo($categories[0]->description);} ?>" />
<?php //if category page, use category description as meta description
} else { ?>
 <title><?php wp_title('|',true,'right'); ?> <?php bloginfo('name'); ?></title>
 <meta name="Description" content="<?php bloginfo('description') ?>" />
<?php } ?>
 <meta property ="og:url" content="<?php bloginfo( 'url' ); ?>/" />
 <meta property ="og:image" content="<?php echo get_template_directory_uri(); ?>/images/favicon.png"/>
 <meta property ='og:locale' content='fa_IR'/>
 <meta name ="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0 maximum-scale=1.0, user-scalable=no, minimal-ui"/>
 <!-- [if lte IE 8]><script>document.location = 'http://deadbrowser.ir';</script><![endif] -->
 <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" media="all" />
 <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" rel="shortcut icon" >
 <?php //wp_head(); ?>

 </head>

 <body>
 <header>
  <div id="header" class="animated">
   <div id="site-title">
    <h1 id="logo"><a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>/blog/"><?php bloginfo('name'); ?></a></h1>
    <nav>
     <div id="header-nav">
<?php $menuParameters = array(
 'theme_location'  => 'primary',
 'echo'            => false,
 'items_wrap'      => '%3$s',
 'depth'           => 0,
); echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );?>
     </div>
    </nav>
   </div>
  </div>
 </header>

 <!-- wrapper -->
 <div id="wrapper">