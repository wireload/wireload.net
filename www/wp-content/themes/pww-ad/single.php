<?php get_header(); ?>

<div id="main"> 
	<div id="main2">
	
	<?php 
$first = true;
if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="date-header"><?php the_time('l, F jS, Y') ?> <!-- by <?php the_author() ?> --></h2>

		<h3 class="post-title">
			<a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
		</h3> 
<div class="post-body"> 
			<?php the_content('Read the rest of this entry &raquo;'); ?> 
		</div>

		<p class="post-footer">Posted by <em><?php the_author() ?></em>in <?php the_category(', ') ?>.
<?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Both Comments and Pings are open ?>
You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.

<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Only Pings are Open ?>
Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.

<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Comments are open, Pings are not ?>
You can skip to the end and leave a response. Pinging is currently not allowed.

<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Neither Comments, nor Pings are open ?>
Both comments and pings are currently closed.

<?php } edit_post_link('Edit this entry.','',''); ?>

		</p>
		<br/>
		<div class="navigation">
			<div><?php previous_post_link('&laquo; %link') ?></div>
			<div><?php next_post_link('%link &raquo;') ?></div>
		</div>
		
	</div>

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
<?php $first = false; endif; ?>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<h2 class="center">Not Found</h2> 
		<p class="center">Sorry, but you are looking for something that isn't here.</p> <?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php endif; ?>
	</div> 
</div>

<?php get_sidebar(); ?>
		
<?php get_footer(); ?>
