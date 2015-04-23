<?php
global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<!-- main stylesheet, favicon,  -->
<link rel="icon" type="image/png" href="<?php echo $xs_favicon; ?>" /><link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<!-- custom Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<!-- wp head -->
<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head();
?>

<script>
$( document ).ready(function() {
	$(".basadon").click(function(){
		$('html, body').animate({ scrollTop: 0 }, 'slow');
	})
	$(this).find("section.anasayfa a figure figcaption").css("top","80%");
	$("section.anasayfa a").mouseenter(function(){
	$(this).find("figure figcaption").css("top","80%");
		$(this).find("figure figcaption").fadeIn("400");
		$(this).find("figure figcaption").css("top","40%");
	})
	$("section.anasayfa a").mouseleave(function(){
	$(this).find("figure figcaption").css("top","40%");
		$(this).find("figure figcaption").fadeOut("400");
		$(this).find("figure figcaption").css("top","80%");
	})
});

$(window).scroll(function () {
if($(window).innerWidth() <= 767) {
	if ($(document).scrollTop() > 350)
	{
			$(".serit").addClass("fixed");
		}
		if ($(document).scrollTop() < 350)
		{
			$(".serit").removeClass("fixed");
		}	
} else {
if ($(document).scrollTop() > 130)
  {
			$(".serit").addClass("fixed");
		}
		if ($(document).scrollTop() < 130)
		{
			$(".serit").removeClass("fixed");
		}
}
})

</script>

<?php echo stripslashes($xs_ga_code); ?>

</head>
<body>
<header class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="/" title="Colors of Other Lands" class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="" /></a>
			</div>
			<div class="col-md-4 text-center">
				<a href="/" title="" class="headerorta"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/headerorta.png" alt="" /></a>
			</div>
			<div class="col-md-4">
				<div class="sosyalmedia">
					<a href="http://www.twitter.com/toprakuzunhan" title="Twitter" rel="nofollow" class="twitter"></a>
					<a href="https://www.facebook.com/ColorsOfOtherLands" rel="nofollow" title="Facebook" class="facebook"></a>
					
					<form method="get" class="searchform_top" action="<?php bloginfo('url'); ?>/">
					<input type="submit" class="gosearch" />
					<input type="text" name="s" class="searchform_top_text" />
					</form>
					
					<div class="clearfix"></div>
				</div>
				<nav>
					<ul>
						<li><a href="/" title="">Main Page<small>Ana Sayfa</small></a></li>
						<li><a href="/sample-page/" title="">About Me<small>Hakkımda</small></a></li>
						<li><a href="/ne-yapmaliyim-what-to-do/" title="">What to Do?<small>Ne Yapmalıyım?</small></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="row serit">
	</div>
</header>