<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <title><?php
    if ( is_single() ) { single_post_title(); }
    elseif (is_home() || is_front_page()) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
    elseif (is_page()) { single_post_title(''); }
    elseif (is_search()) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
    elseif (is_404()) { bloginfo('name'); print ' | Not Found'; }
    else { bloginfo('name'); wp_title('|'); get_page_number(); }
  ?></title>

  <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf(__('%s latest posts', 'wireload-02'), wp_specialchars(get_bloginfo('name'), 1)); ?>" />
  <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf(__('%s latest comments', 'wireload-02'), wp_specialchars(get_bloginfo('name'), 1)); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/styles/main.css" />
</head>

<body <?php page_bodyclass(); ?>>
	<div id="page">
