<?php
$themename = "Toprak Options";
$shortname = "xs";

// Get Post Categories
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");


// Theme Options
$options = array (
array( "name" => "Favicon",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Custom Favicon",
	"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => get_bloginfo('url') ."/favicon.ico"),
	
array( "type" => "close"),
array( "name" => "Custom Logo",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Logo Image URL",
	"desc" => "Enter a URL to an image to replace default theme title and description",
	"id" => $shortname."_logo",
	"type" => "text",
	"std" => ""),
	
array( "type" => "close"),
array( "name" => "Social",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Disable Social Buttons",
	"desc" => "Check to disable the social buttons on your theme",
	"id" => $shortname."_disable_social",
	"type" => "checkbox",
	"std" => "false"),
	
array( "name" => "Facebook Page URL",
	"desc" => "Enter your facebook page url",
	"id" => $shortname."_facebook",
	"type" => "text",
	"std" => "http://www.facebook.com/WPExplorerThemes"),

array( "name" => "Twitter Username",
	"desc" => "Enter your twitter username",
	"id" => $shortname."_twitter",
	"type" => "text",
	"std" => "wpexplorer"),
	
array( "name" => "RSS URL",
	"desc" => "Enter your RSS page URL",
	"id" => $shortname."_rss",
	"type" => "text",
	"std" => get_bloginfo('url') ."/feed"),

array( "type" => "close"),
array( "name" => "Analytics",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the header of your site",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => ""),
	
array( "type" => "close")
);

 
function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: admin.php?page=function_options.php&saved=true");
                die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}
            header("Location: themes.php?page=function_options.php&reset=true");
            die;
        }
    }
add_menu_page("Toprak Options", "Toprak Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
}
function mytheme_admin() {
global $themename, $shortname, $options;   
?>

<div id="wrap">

<div id="mssg">
<?php
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
</div><!-- /mssg -->

<h2>Colors Of Other Lands Options</h2>

<div id="social">

<form method="post">

<?php
foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?>

<table width="100%" border="0">

<?php break; case "close": ?>

</table><div class="single-space"></div>

<?php break; case "break": ?>
<tr><td colspan="2">&nbsp;</td></tr>

<?php break; case "section": ?>

<div class="section-title">
<h3><?php echo $value['name']; ?></h3>
</div><!-- /section-title -->


<?php break; case 'text': ?>

<tr><td width="20%" rowspan="2" valign="top" class="section-left"><?php echo $value['name']; ?></td><td width="80%" class="section-right"><input style="width:400px;" name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>
<td class="section-description"><small><?php echo $value['desc']; ?></small></td>


<?php break; case 'textarea': ?>


<tr><td width="20%" rowspan="2" valign="top" class="section-left"><?php echo $value['name']; ?></td><td width="80%" class="section-right"><textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes (get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>
</tr>
<td class="section-description"><small><?php echo $value['desc']; ?></small></td>

<?php break; case 'select': ?>

<tr><td width="20%" rowspan="2" valign="top" class="section-left"><?php echo $value['name']; ?></td><td width="80%" class="section-right"><select style="width:240px;" name="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>
<td class="section-description"><small><?php echo $value['desc']; ?></small></td>


<?php break; case "checkbox": ?>


<tr><td width="20%" rowspan="2" valign="top" class="section-left"><?php echo $value['name']; ?></td><td width="80%" class="section-right"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /></td>
</tr>
<td class="section-description"><small><?php echo $value['desc']; ?></small></td>


<?php break; } } ?>

<p class="submit save">
<input class="button-primary" name="save" type="submit" value="Save Changes" />
<input type="hidden" name="action" value="save" />
</p>

</form>
<form method="post">

<p class="submit reset">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>

</form>

</div><!-- /wrp -->

<?php } ?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>