<?php
register_sidebars(2);

function unregister_categories(){unregister_widget('WP_Widget_Categories');}  
add_action('widgets_init','unregister_categories');
function unregister_recent_comments(){unregister_widget('WP_Widget_Recent_Comments');}  
add_action('widgets_init','unregister_recent_comments');

require(dirname(__FILE__).'/widgets/WP_Widget_Categories_Modify.php');
register_widget('WP_Widget_Categories_Modify');
require(dirname(__FILE__).'/widgets/WP_Widget_Recent_Comments_Modify.php');
register_widget('WP_Widget_Recent_Comments_Modify');

require(dirname(__FILE__).'/options.php');

//wordpress 4.4 fix
function recover_comment_fields($comment_fields){
    $comment = array_shift($comment_fields);
    $comment_fields =  array_merge($comment_fields ,array('comment' => $comment));
    return $comment_fields;
}
add_filter('comment_form_fields','recover_comment_fields');
?>
