<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <title><?php
	

	global $page, $paged;
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	?></title>
     
     <link rel="shortcut icon" href="<?php echo IMAGES_DIR ?>/favicon.ico" /> 

    <?php wp_head(); ?>
	

  </head>
  <body>