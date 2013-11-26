							<?php get_header(); ?>
							
						<?php get_sidebar(); ?>
						
						<div class="line2">&nbsp;</div>
						<div class="right">
							
							
							<?php if (have_posts()) : ?>
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
							<?php else : ?>
<div class="content_txt" style="padding-top:0px;">
<h3 id="respond">Not Found</h3><br/>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<div id="search"><?php include (TEMPLATEPATH . "/searchform.php"); ?></div>

</div>
	<?php endif; ?>	
							
							
							
						</div>
						<div class="line3">&nbsp;</div>


				<?php get_footer(); ?>

