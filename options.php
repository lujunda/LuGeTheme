<?php

if(isset($_POST['themeUrl']))
{
	update_option('themeUrl',$_POST['themeUrl']);
}
if(isset($_POST['loadPlugins']))
{
	update_option('loadPlugins',$_POST['loadPlugins']);
}


function OptionsFunc(){
?>

<h2>
	LuGe Options
</h2>
<h3>
	CDN
</h3>
<p>
	Input the theme url:
</p>
<form method="post">
	<input name="themeUrl" size="40" value="<?php echo get_option('themeUrl'); ?>" placeholder="http://www.example.com/LuGeTheme/" />
	<input type="submit" value="SAVE" />
</form>
<h3>
	Support Front plugins
</h3>
<p>
    Do you want to load plugins' js/css file:
</p>
<form method="post">
    <input type="submit" name="loadPlugins" value="<?php echo get_option('loadPlugins')=='YES'?'NO':'YES'; ?>" />
</form>

<?php
}

function addOptionsPage(){   
    add_theme_page( 'LuGe Options', 'LuGe Options', 'administrator', 'LuGeThemeOptions','OptionsFunc');   
}

add_action('admin_menu', 'addOptionsPage');

?>