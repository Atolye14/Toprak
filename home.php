<?php get_header(); ?>

<?php if (have_posts()) : ?>

<section class="container anasayfa"><div class="row">

<?php get_template_part( 'post' , 'entry') ?>

</div></section>

<?php endif; ?>

<?php if (function_exists("pagination")) { pagination($additional_loop- max_num_pages); } ?>

<?php get_footer(); ?>