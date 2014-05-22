<?php
/**
Plugin Name: Current Author's Posts
Plugin URI: https://github.com/enishant
Description: Display posts of current author only (authors other than admin role).
Tags: current author,author,posts,admin
Version: 1.0
Author: Nishant Vaity
Author URI: https://github.com/enishant
License: GPL2
*/

function display_posts_for_current_author_only($query) 
{
	if(!current_user_can('administrator')) 
	{
		if(current_user_can('shop_manager')) 
		{
			global $user_ID;
			$query->set('author',  $user_ID);
		}
	}
	return $query;
}

function restrict_admin()
{
	add_filter('pre_get_posts', 'display_posts_for_current_author_only');
}
add_action( 'admin_init', 'restrict_admin', 1 );
?>
