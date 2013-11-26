<?php get_header(); ?>

<ul id="news-list">
  <?php while (have_posts()) : the_post() ?>
  <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  	<div class="left">
  		<a href="#" class="comms"><?php echo get_comments_number(); ?></a>
  		<span class="info">
  		  <strong class="entry-date"><?php the_time('Y.m.d'); ?></strong> /
  		  <span class='author vcard'><a class="url fn n" href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename); ?>" title="<?php printf(__('View all posts by %s', 'wireload-02' ), $authordata->display_name); ?>"><?php the_author(); ?></a>
  		  </span>/
  		  <span><?php the_time('G:i'); ?></span>
  		</span>
  		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permalink to %s', 'wireload-02'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
  	</div>
  	<div class="right post-content nd-body">
  		<?php the_content(__('Read more &raquo;', 'wireload-02')); ?>
  	</div>
  	<div class="tags"><?php the_tags('<span class="tag-links">', ", ", "</span>") ?></div>
  </li>
  <?php endwhile; ?>
</ul>

<?php wp_paging(); ?>

<?php get_footer(); ?>