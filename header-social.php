<?php
global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
}
?>

<ul id="header-social">

<li><a href="<?php echo $xs_facebook ?>" title="Facebook" target="_blank"><img src="<?php bloginfo( 'template_url' ) ?>/images/fb-icon.png" alt="Facebook" width="24" height="25"  /></a></li>

<li><a href="http://www.twitter.com/<?php echo $xs_twitter ?>" title="Twitter" target="_blank"><img src="<?php bloginfo( 'template_url' ) ?>/images/twit-icon.png" alt="Twitter" width="24" height="25"  /></a></li>

<li><a href="<?php echo $xs_rss ?>" title="RSS Feed" target="_blank"><img src="<?php bloginfo( 'template_url' ) ?>/images/rss-icon.png" alt="RSS Feed" width="24" height="25"  /></a></li>

</ul><!-- /nav-social -->