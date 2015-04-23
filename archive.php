<?php get_header(); ?>

<?php if (have_posts()) : ?>

<ul class="gallery-list">
<?php get_template_part( 'post' , 'entry') ?>
</ul>    

<?php endif; ?>
 
<?php if (function_exists("pagination")) { pagination($additional_loop- max_num_pages); } ?>
<?php get_footer(); ?>