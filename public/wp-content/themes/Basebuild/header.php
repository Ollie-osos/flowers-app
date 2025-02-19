<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 */

// Get ACF vars from options
// if($args['page_colour']){
//   $page_colour = 'page-colour_' . $args['page_colour'];
// }else{
//   $page_colour = 'page-colour_pink';
// }

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel='dns-prefetch' href='//polyfill.io' />
  <link rel='dns-prefetch' href='//fonts.googleapis.com' />
  <?php wp_head(); ?>
</head>

<body>


  <header class="header header-fixed u-unselectable <?php echo $page_colour; ?>">
    <div class="header-top">
      <div class="header-brand">
        <div class="nav-item no-hover"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.svg" alt="logo" /></a></div>
        <div class="nav-item nav-btn" id="header-btn"><span></span><span></span><span></span></div>
      </div>
      <div class="header-nav" id="header-menu">
        <?php foundationpress_main_nav(); ?>
      </div>
    </div>
  </header>