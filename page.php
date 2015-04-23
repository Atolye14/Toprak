<?php get_header(); ?>

<section class="container neyapmaliyim">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!--<h1 id="page-title"><?php the_title(); ?></h1>-->
<?php the_content(); ?>

<?php edit_post_link( $link, '<p id="post-admin"><span>', '</span></p>', $id ); ?>
<div class="clear"></div>
</section><!-- /post -->
<?php endwhile;?>
<?php endif; ?>

</div><!-- /main -->

<iframe scrolling=”no” frameborder=”0″ src=”http://www.facebook.com/connect/connect.php?id=100002893347239&amp;connections=10&amp;logobar=1&amp;stream=0&amp;css=PATH_TO_STYLE_SHEET&amp;locale=your_LOCALE” style=”border: none; width: 300px; height: 280px; “></iframe>
<?php get_footer(); ?>