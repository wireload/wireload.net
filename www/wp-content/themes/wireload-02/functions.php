<?php

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain('wireload-02', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);

// Get the page number
function get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __( 'Page ' , 'wireload-02') . get_query_var('paged');
    }
} // end get_page_number

function echo_images_uri() {
  echo get_template_directory_uri() . '/images';
}

function act_if($page_name)
{
  if (($page_name == 'home' && is_front_page()) || is_page($page_name) || ($page_name == 'news' && is_home()))
    echo "class='act'";
}

function page_bodyclass() {  // add class to <body> tag
	global $wp_query;
	$page = '';
	if (is_front_page()) {
    $page = 'home';
	} elseif (is_page()) {
    $page = $wp_query->query_vars["pagename"];
	}
  // Make product pages take on the 'product' class.
	if (is_page('quiet') || is_page('blotter'))
	  $page .= ' product';

	if ($page)
		echo 'class= "'. $page . ' ' . implode(' ', get_body_class()) . '"';
}

/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );

remove_filter('comments_number', 'dsq_comments_number');