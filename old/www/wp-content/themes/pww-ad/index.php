<?php get_header(); ?>

<div id="main"> 
	<div id="main2">
	<?php $first = true;
if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="date-header"><?php the_time('l, F jS, Y') ?> <!-- by <?php the_author() ?> --></h2>

				<h3 class="post-title">
					<a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
				</h3> 
				<div class="post-body"> 

					<?php the_content('Read the rest of this entry &raquo;'); ?> 
				</div>

				<p class="post-footer">
					Posted by <em><?php the_author() ?></em>in <?php the_category(', ') ?>.
					<?php edit_post_link('Edit', '', ' | '); ?> 
					<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;');?>
				</p>

<?php if($first): ?>
<div style="width: 336px; margin: 1em; margin-left: auto; margin-right: auto;">
<script type="text/javascript"><!--
google_ad_client = "pub-0314992211133593";
google_ad_width = 336;
google_ad_height = 280;
google_ad_format = "336x280_as";
google_ad_type = "text_image";
//2007-02-01: PWW General
google_ad_channel = "1854905299";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "0000FF";
google_color_text = "000000";
google_color_url = "008000";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<?php $first = false; endif;?>

		</div>
	<?php endwhile; else: ?>

		<h2 class="center">Not Found</h2> 
		<p class="center">Sorry, but you are looking for something that isn't here.</p> <?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php endif; ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next  Entries &raquo;') ?></div>
		</div>


	</div> 
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
