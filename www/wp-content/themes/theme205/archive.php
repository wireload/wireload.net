							<?php get_header(); ?>
							
						<?php get_sidebar(); ?>
						
						<div class="line2">&nbsp;</div>
						<div class="right">
											
											
		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h3 class="pagetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</h3>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h3>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h3>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3 class="pagetitle">Archive for <?php the_time('Y'); ?></h3>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h3 class="pagetitle">Search Results</h3>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h3 class="pagetitle">Author Archive</h3>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h3 class="pagetitle">Blog Archives</h3>

		<?php } ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
<?php while (have_posts()) : the_post(); ?>
							<div class="head">
								<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
							</div>
							<div class="content_txt">
								<?php the_content('Read the rest of this entry &raquo;'); ?>
							</div>
							<div class="author">
								<div class="table1">
									<div class="table_row1">
										<div class="left1">posted by <?php the_author() ?> <?php the_time('M d, Y') ?> &nbsp;<?php the_time('h:m A') ?></div>
										<div class="right1"><a href="<?php comments_link(); ?>">read</a> <span>(<?php comments_number('0', '1', '%', 'number'); ?> comments)</span></div>
									</div>
								</div>
							</div>
														<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
	<?php else : ?>
		<h3 id="respond">Not Found</h3>
		<div id="search"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
	<?php endif; ?>
											
						</div>
						<div class="line3">&nbsp;</div>


				<?php get_footer(); ?>

