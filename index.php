<?php
if($_GET['target'] != 'post')
{ 
	echo '<!DOCTYPE html>';
	echo '<html>';
} 
get_header(); 
if($_GET['target'] != 'post')
{ 
	echo '<body>';
	echo '<div class="wrap">';
	echo '<div class="header">';
	echo '<h1><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></h1>';
	echo '<span>' . get_bloginfo( 'description' ) . '</span>';
	echo '</div>';
} 
echo '<div class="content">';
while(have_posts())
{
	the_post(); 
	echo '<div class="post box">';
	echo '<div class="meta">';
	echo '<h2><a href="' . get_permalink() . '">' . get_the_title() .'</a></h2>';
	echo '<span class="info-post">';
	the_time('Y m/d D');
	echo ' - ';
	comments_popup_link('No Comments', '1 Comment', '% Comments');
	echo '<br />';
	the_tags('Tags: ', ', ', '<br />');
	echo 'Posted in ';
	the_category(', ');
	echo '</span>';
	echo '</div>';
	echo '<div class="post-content">';
	the_content('Read More...'); 
	echo '</div>';
	echo '</div>';
}
$link_next_page = get_next_posts_link(__('Load More'));
if(!empty($link_next_page))
{
	echo '<div class="loading" id="load_posts"><div class="link-load">' . $link_next_page . '</div></div>';
} 
echo '</div>';
if($_GET['target'] != 'post')
{ 
	echo '<div class="area_sidebar">';
	get_sidebar(); 
	get_sidebar( '2' ); 
	echo '</div>';
	get_footer(); 
	echo '</div>';
	echo '</body>';
	echo '</html>';
} 
?>
