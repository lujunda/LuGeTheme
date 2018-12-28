<?php
echo '<div class="footer">';
echo 'Copyright © 2014 ';
echo '<a class="authorLink" href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
echo '. All rights reserved.<br />';
echo 'MEMORY PEAK : ' . memory_get_peak_usage(true)/1024 . ' KB - ';
echo '<a href="' . esc_url(site_url('/')) . 'wp-admin/" target="_blank">Administrator</a>';
echo ' - Theme powered by <a href="http://lujunda.cn/">LuJunda</a>.';
echo '</div>';
if(get_option('loadPlugins')=='YES')
{
	wp_footer();
}
?>
