<?php

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => __('Left sidebar','theme205'),
		'before_widget' => '<div id="%1$s" class="widget_style">', 
		'after_widget' => '</div>', 
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

// Links

function widget_links_with_style() {
   global $wpdb;
  $order = strtolower($order);
	if (substr($order,0,1) == '_') {
		$direction = ' DESC';
		$order = substr($order,1);
	}
	$cat_order = ('name' == $order) ? 'cat_name' : 'cat_id';
	if (!isset($direction)) $direction = '';
	$cats = $wpdb->get_results("
		SELECT DISTINCT link_category, cat_name, show_images, 
			show_description, show_rating, show_updated, sort_order, 
			sort_desc, list_limit
		FROM `$wpdb->links` 
		LEFT JOIN `$wpdb->linkcategories` ON (link_category = cat_id)
		WHERE link_visible =  'Y'
			AND list_limit <> 0
		ORDER BY $cat_order $direction ", ARRAY_A);
	if ($cats) {
		foreach ($cats as $cat) {
			$orderby = $cat['sort_order'];
			$orderby = (bool_from_yn($cat['sort_desc'])? '_':'') . $orderby;
			?>
			<div class="widget_style" id="links_with_style">
								<ul>
									<?php get_links_list(); ?>
								</ul>
							</div>
			<?php
		}
	}
	?>

   <?php
   }
   if ( function_exists('register_sidebar_widget') )
   register_sidebar_widget(__(' Links With Style'), 'widget_links_with_style');

// Search 	
	function widget_theme205_search() {
?>
						<div class="widget_style" id="search"><?php include (TEMPLATEPATH . "/searchform.php"); ?></div>
					
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_theme205_search');

   
   