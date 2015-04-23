<?php get_header(); ?>

<section class="container kartsayfasi">
<div id="main">
<div id="post">
<?php if (have_posts()) : while (have_posts()) : the_post();
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
?>

<div class="row ilerigeri">
		<div class="col-xs-4 sol">
			<?php previous_post_link('%link', '', TRUE); ?>
			<span class="icon-book"><</span>
			<div class="text"><small>önceki karpostal</small><!--Korea / Kore--></div>
			
			</a>
		</div>
		<div class="col-xs-4 orta">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="col-xs-4 sag">
			<?php next_post_link('%link', '', TRUE); ?>
			<span class="icon-book">></span> 
			<div class="text"><small>sonraki karpostal</small><!--Yeniyıl / New Year--></div>
			
			</a>
		</div>
	</div>
	<hr/>
			
<?php the_content(); ?>
<div class="clear"></div>

<?php edit_post_link( $link, '<p id="post-admin">', '</p>', $id ); ?>
<div class="clear"></div>
</div><!-- /post -->

<?php get_template_part( 'post' , 'relatedposts') ?>
<?php //comments_template(); ?>

</div><!-- /main -->
</section>	
<?php endwhile; endif; ?>
<?php get_footer(); ?>