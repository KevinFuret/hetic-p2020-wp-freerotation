<?php

if( function_exists('acf_add_options_page') ) {

acf_add_options_page(array(
'page_title' 	=> 'Réglages généraux du thème',
'menu_title'	=> 'Réglages du thème',
'menu_slug' 	=> 'theme-general-settings',
'capability'	=> 'edit_posts',
'redirect'		=> false
));

acf_add_options_sub_page(array(
'page_title' 	=> 'Réglages du header',
'menu_title'	=> 'Header',
'parent_slug'	=> 'theme-general-settings',
));

acf_add_options_sub_page(array(
'page_title' 	=> 'Réglages du footer',
'menu_title'	=> 'Footer',
'parent_slug'	=> 'theme-general-settings',
));

}