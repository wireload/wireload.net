<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
<div id="news-details">
	<div id="nd-head">
		<a href="#comms" class="comms"><?php echo get_comments_number(); ?></a>
		<span class="info"><strong class="entry-date"><?php the_time('Y.m.d'); ?></strong> /
	  <span class='author vcard'><a class="url fn n" href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename); ?>" title="<?php printf(__('View all posts by %s', 'wireload-02' ), $authordata->display_name); ?>"><?php the_author(); ?></a>
	  </span>/
	  <span><?php the_time('G:i'); ?></span>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permalink to %s', 'wireload-02'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></h2>
		<a href="/news" id="lnk-back">Back to List of News</a>
	</div>
	<div id="nd-body" class='post-content'>
		<?php the_content(__('Read more &raquo;', 'wireload-02')); ?>
	  <div class="tags"><?php the_tags('<span class="tag-links">', ", ", "</span>") ?></div>
	</div>
	<div id='nd-comments'>
    <?php comments_template('', true); ?>
  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
