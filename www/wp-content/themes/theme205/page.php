							<?php get_header(); ?>
							
						<?php get_sidebar(); ?>
						
						<div class="line2">&nbsp;</div>
						<div class="right">
					
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	

						
							<div class="head">
							<h3><a href="#"><?php the_title(); ?></a></h3>
</div>
								<div class="content_txt">
							<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?><br/>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

				
						
						<p class="postmetadata"><?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?></p>
						
					</div>
					
		<div style="clear:both; font-size:20px; line-height:20px"><br/></div>
	
	
		
	  <?php endwhile; endif; ?>
							
						</div>
						<div class="line3">&nbsp;</div>


				<?php get_footer(); ?>

