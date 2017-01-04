<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config["menu_id"]               = 'id';
$config["menu_label"]            = 'title';
$config["menu_parent"]           = 'parent';
$config["menu_icon"] 			 = 'icon';
$config["menu_key"]              = 'alias';
$config["menu_order"]            = 'menu_order';

$config["nav_tag_open"]          = '<ul class="nav navbar-nav">';
$config["nav_tag_close"]         = '</ul>';
$config["item_anchor"]           = '<a href="%s">%s</a>';
$config["item_tag_open"]         = '<li>'; 
$config["item_tag_close"]        = '</li>';	
$config["parent_tag_open"]       = '<li class="dropdown menu-large">';	
$config["parent_tag_close"]      = '</li>';	
$config["parent_anchor_tag"]     = '<a href="%s">%s</a>';	
$config["children_tag_open"]     = '<ul class="dropdown-menu megamenu row" style="font-size: 12px;">';	
$config["children_tag_close"]    = '</ul>';	
$config['icon_position']		 = 'left'; // 'left' or 'right'
$config['menu_icons_list']		 = array();
// these for the future version
$config['icon_img_base_url']	 = ''; 