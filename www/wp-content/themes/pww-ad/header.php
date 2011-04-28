<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?><?php if ( is_single() ) { ?><?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>
<div id="menu">
  <div id="rssbuttons">
    <a href="http://feeds.feedburner.com/PlayingWithWire" title="Subscribe to my feed, Playing With Wire" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="" style="border:0"/></a>
    <a href="http://fusion.google.com/add?feedurl=http://feeds.feedburner.com/PlayingWithWire"><img src="http://buttons.googlesyndication.com/fusion/add.gif" width="104" height="17" style="border:0" alt="Add to Google"/></a>
    <!--<a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url=http://www.playingwithwire.com/rss">
      <img src="images/newsgator.gif" width="91" height="17" border="0" align="middle" alt="Add to newsgator"/>
    </a>  
    <a href=" http://us.rd.yahoo.com/my/atm/PlayingWithWire.com/Playing%20With%20Wire%20-%20The%20Story%20of%20an%20Internet%20Startup/*http://add.my.yahoo.com/rss?url=http%3A//playingwithwire.com/atom.xml"><img src=" http://us.i1.yimg.com/us.yimg.com/i/us/my/addtomyyahoo4.gif" width="91" height="17" border="0" align="middle" alt="Add to My Yahoo!"></a>-->
  </div>
</div>
<div id="masthead"><a href="<?php echo get_option('home'); ?>"></a></div>

<div id="content">
