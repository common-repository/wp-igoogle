<?php
/*
Plugin Name: WP-iGoogle
Plugin URI: http://www.royakhosravi.com/?p=477
Description:  Create a dynamic Google gadget for your Blog. People can add your gadget to iGoogle or to their other pages across the web. When users add your gadget to their iGoogle homepage, they'll see your content each time they visit Google.

Author: Roya Khosravi
Version: 1.4
Author URI: http://www.royakhosravi.com/

Updates:
-none

To-Doo: 
-none
*/

$igoogle_localversion="1.4";
$wp_igoogle_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
 // Admin Panel   
function igoogle_add_pages()
{
	add_options_page('WP-iGoogle options', 'WP-iGoogle', 8, __FILE__, 'igoogle_options_page');            
}
// Options Page
function igoogle_options_page()
{ 
global $igoogle_localversion;
global $wp_igoogle_plugin_url;
    // Plugin Page
    echo <<<END
<div class="wrap" style="max-width:950px !important;">
	<h2>WP-iGoogle $igoogle_localversion</h2>
	<div id="poststuff" style="margin-top:10px;">
	<div id="sideblock" style="float:right;width:220px;margin-left:10px;"> 
		 <h3>Related</h3>
<div id="dbx-content" style="text-decoration:none;">
<ul>
<li><a style="text-decoration:none;" href="http://www.royakhosravi.com/">WP-iGoogle</a></li>
</ul><br />
</div>
 	</div>
	
	 <div id="mainblock" style="width:710px">
	 
		<div class="dbx-content">
						<h3>About</h3>                         
<p>Create a dynamic Google gadget for your Blog. People can add your gadget to iGoogle or to their other pages across the web. When users add your gadget to their iGoogle homepage, they'll see your content each time they visit Google. Your Google gadget will show your latest posts sorted by date and an avatar image (your Gravatar).
						<h3>Code</h3>
copy and paste the following code into your posts/pages/sidebar,... 
<TEXTAREA rows="10" cols="80">
<a target="_blank" href="http://fusion.google.com/add?source=atgs&moduleurl=$wp_igoogle_plugin_url/igoogle.php?t=.xml"><img src="http://gmodules.com/ig/images/plus_google.gif" border="0" alt="Add to Google"></a>
</TEXTAREA>
<h3>&nbsp;</h3>
To submit your gadget to <a target="_blank" href="http://www.google.com/ig/submit">Google Gadget directory</a> use this link:
<TEXTAREA rows="3" cols="80">
$wp_igoogle_plugin_url/igoogle.php?t=.xml
</TEXTAREA>

<h3>&nbsp;</h3>
To invite your visitors to add your gadget to their webpages copy and paste the following code into your posts/pages/sidebar,...:
<TEXTAREA rows="5" cols="80">
<a target="_blank" href="http://www.gmodules.com/ig/creator?synd=open&hl=en&url=$wp_igoogle_plugin_url/igoogle.php?t=.xml">Add this gadget to your webpage</a>
</TEXTAREA>


<h3>&nbsp;</h3>
						<h3>Usage</h3>
<p>To add my gadget to your iGoogle page, click the Google button below.<br><br>
<a target="_blank" href="http://fusion.google.com/add?source=atgs&moduleurl=$wp_igoogle_plugin_url/igoogle.php?t=.xml"><img src="http://gmodules.com/ig/images/plus_google.gif" border="0" alt="Add to iGoogle"></a>
</p>

<p>
<a target="_blank" href="http://www.gmodules.com/ig/creator?synd=open&hl=en&url=$wp_igoogle_plugin_url/igoogle.php?t=.xml">Add this gadget to your webpage</a>
</p>

		</div>
					
		<br/><br/><h3>&nbsp;</h3>	
	 </div>

	</div>
<h5>WP-iGoogle plugin by <a href="http://www.royakhosravi.com/">Roya Khosravi</a></h5>
</div>
END;
}
// Add Options Page
add_action('admin_menu', 'igoogle_add_pages');
?>
