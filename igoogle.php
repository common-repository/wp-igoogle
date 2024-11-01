<?php require_once('../../../wp-config.php');
$size=60;
$user_info = get_userdata(1);
$email = $user_info->user_email;
$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5($email) . "&amp;size=" . $size;
$thumbnail= $grav_url;
$screenshot= $grav_url;
$wp_igoogle_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
$source_url = $wp_igoogle_plugin_url . '/root.php?t=.xml';
?>
<?php header('Content-Type: application/rss+xml; charset=UTF-8'); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'."\n"; ?>
<Module>
<ModulePrefs title="<?php bloginfo('name'); ?>" title_url="<?php bloginfo('wpurl'); ?>" description="<?php bloginfo('description'); ?>" author="Roya Khosravi" author_affiliation="royakhosravi.com" author_link="http://www.royakhosravi.com" author_email="me@royakhosravi.com" scaling="true" screenshot="<?php echo $screenshot; ?>" thumbnail="<?php echo $thumbnail; ?>" scrolling="true" /> 
<UserPref name="num_entries" display_name="Number of Entries:" />
<Content type="html">
<![CDATA[ 
<style>
<!--
#content_div {font:13px arial,helvetica,clean,sans-serif;}
#content_div {
text-align:left;
color:#333;
direction:ltr;
}
#content_div {line-height:1.22em;}
#content_div{background:#fff;}
#content_div a{color:#16387c;}
#content_div a:link{text-decoration:none;}
#content_div a:active{text-decoration:none;}
#content_div a:hover{text-decoration:underline;}
#content_div a:visited{text-decoration:none;}
.more{
font:normal 77% verdana;
padding:2px 0 2px 2px;
}
-->
</style>
<img align=left alt="<?php bloginfo('name'); ?>" src="<?php echo $grav_url; ?>" title="<?php bloginfo('name'); ?>">
<div id="content_div"></div>
<script type="text/javascript"> 
// Get userprefs
var prefs = new _IG_Prefs(__MODULE_ID__);
var showdate = false;
var summary = true;
var entries = prefs.getInt("num_entries");
if (entries > 20)
{
alert("You cannot display more than 20 entries.");
entries = 20;
}
_IG_FetchFeedAsJSON(
"<?php echo $source_url; ?>",
function(feed) { 
if (feed == null){ 
alert("There is no data.");
return;
}
var html = "";
html += "<a target='_blank' href='" + feed.Entry[0].Link + "'>"
+ feed.Entry[0].Title
+ "</a><br> ";
html += feed.Entry[0].Summary + "<br>";
if (feed.Entry) {
for (var i = 1; i < feed.Entry.length; i++) {
html += "<a class='more' target='_blank' href='" + feed.Entry[i].Link + "'>&raquo; "
+ feed.Entry[i].Title
+ "</a><br> ";
}
}
_gel("content_div").innerHTML = html;
}, entries, summary);

</script>
]]> 
</Content>
</Module>