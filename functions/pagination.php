<?php
function pagination($pages = '', $range = 4)
{
echo "<div class='container'>\n";
$showitems = ($range * 2)+1; 
global $paged;
if(empty($paged)) $paged = 1;
if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}  
if(1 != $pages)
{
echo "<hr/><div class=\"row ilerigeri\">\n";
//if($paged > 1 && $showitems < $pages) echo "<div class='col-xs-6 col-md-4 sol'><a href='".get_pagenum_link($paged - 1)."'><span class='icon-book'><</span> <div class='text'>önceki sayfa</div></a></div>";
echo "<div class='hidden-xs hidden-sm col-md-12 orta'><ul>";
for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
echo ($paged == $i)? "<li><a class='active' href=''>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
}
}
echo "</ul></div>";
//if ($paged < $pages && $showitems < $pages) echo "<div class='col-xs-6 col-md-4 sol'><a href='".get_pagenum_link($paged + 1)."'><span class='icon-book'>></span> <div class='text'>sonraki sayfa</div></a></div>";
echo "</div>\n";
}
echo "</div>\n";
}
?>