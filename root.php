<?php require_once('../../../wp-config.php');?>
<?php header('Content-Type: application/rss+xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>' . "\n"; ?> 
<rss version="2.0">
  <channel>
    <title><?php bloginfo('name'); ?></title> 
    <link><?php bloginfo('wpurl'); ?></link> 
    <description><?php bloginfo('description'); ?></description> 
    <language>en</language>
<?php
global $post;
$myposts = get_posts('numberposts=20&orderby=Date&order=DESC');
foreach($myposts as $post) :
setup_postdata($post);
?>
    <item>
      <title><?php the_title_rss(); ?></title> 
      <link><?php the_permalink(); ?></link> 
      <description><?php the_content_rss('', TRUE, '', 38); ?></description> 
      <author><?php the_author(); ?></author> 
      <pubDate><?php the_date(); ?></pubDate>
    </item>
<?php endforeach; ?>
  </channel>
</rss>