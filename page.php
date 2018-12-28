<?php
if($_GET['target'] != 'post' && $_GET['target'] != 'comments')
{ 
	echo '<!DOCTYPE html>';
	echo '<html>';
} 
get_header(); 
if($_GET['target'] != 'post' && $_GET['target'] != 'comments')
{ 
	echo '<body>';
	echo '<div class="wrap">';
	echo '<div class="header">';
	echo '<h1><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a></h1>';
	echo '<span>' . get_bloginfo( 'description' ) . '</span>';
	echo '</div>';
}
if($_GET['target'] != 'comments')
{ 
	echo '<div class="content">';
	while(have_posts())
	{
		the_post(); 
		echo '<div class="post box">';
		echo '<div class="meta">';
		echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
		echo '</div>';
		echo '<div class="post-content">';
		the_content('Read the rest of this entry &raquo;'); 
		echo '</div>';
		echo '</div>';
	} 
}
comments_template(); 
if($_GET['target'] != 'comments')
{ 
	echo '</div>';
} 
if($_GET['target'] != 'post' && $_GET['target'] != 'comments')
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
