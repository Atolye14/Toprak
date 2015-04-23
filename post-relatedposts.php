<div class="hrgonder"></div>
	<h2>Diğer &quot;<?php $category = get_the_category(); echo $category[0]->cat_name; ?> &quot;</h2>
	<hr class="koyu"/>
	<div class="row">
<?php
    $category = get_the_category(); //get first current category ID
    $this_post = $post->ID; // get ID of current post
    $posts = get_posts('numberposts=4&orderby=rand&category=' . $category[0]->cat_ID . '&exclude=' . $this_post);
?>
<?php
foreach($posts as $post) {
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'related-posts'); ?>
<?php if ( has_post_thumbnail() ) {  ?>
<div class="col-md-3">
<figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $thumbnail[0]; ?>"  alt="<?php the_title(); ?>" class="thumbnail" style="width:100%;" /></a></figure>
</div>
<? } ?>
<?php } wp_reset_postdata(); ?>
</ul>
<div class="clear"></div>