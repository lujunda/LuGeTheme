<?php
if($_GET['target'] != 'post' && $_GET['target'] != 'comments')
{
	echo '<head>';
	echo '<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=0.8">';
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	if(is_home() || is_front_page())
	{
		$description = get_bloginfo( 'description' , false);
		echo '<meta name="description" content="' . $description . '" />';
	}
	else if(is_category())
	{
		$description = sprintf( __( '目录 %s 下的文章列表'), single_cat_title('', false));
		echo '<meta name="description" content="' . $description . '" />';
	}
	else if(is_tag())
	{
		$description = sprintf( __( '与标签 %s 相关联的文章列表'), single_tag_title('', false));
		echo '<meta name="description" content="' . $description . '" />';
	}
	else if(is_single())
	{
		$tags = wp_get_post_tags($post->ID);
		foreach($tags as $tag)
		{
			$keywords = isset($keywords) ? $keywords . ',' . $tag->name : $tag->name;
		}
		echo '<meta name="keywords" content="' . $keywords . '" />';
	}
	else if(is_page())
	{
	}
} 

/*
 * Print the <title> tag based on what is being viewed.
 */
echo '<title>';
global $page, $paged;
wp_title('|', true, 'right');
bloginfo('name');
$site_description = get_bloginfo('description', 'display');
if($site_description && (is_home() || is_front_page()))
{
	echo ' | ' . $site_description;
}
if($paged >= 2 || $page >= 2 )
{
	echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
}
echo '</title>';

if($_GET['target'] != 'post' && $_GET['target'] != 'comments')
{ 
	$themeUrl = get_option('themeUrl');
	if(empty($themeUrl))
	{
		$themeUrl = esc_url(site_url('/')).'wp-content/themes/LuGeTheme/';
	}
	echo '<link rel="stylesheet" type="text/css" href="' . $themeUrl . 'style.css" />';
	echo '<link rel="shortcut icon" href="' . $themeUrl . 'favicon.png" />';
	echo '<script type="text/javascript" src="' . $themeUrl . 'jquery.min.js"></script>';
	if(get_option('loadPlugins') == 'YES')
	{
		wp_head(); 
	}
	echo '</head>';
} 
?>