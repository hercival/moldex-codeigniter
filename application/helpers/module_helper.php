<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * HDA helper
 * @package     Module
 * @subpackage  Module Helpers
 * @author      Hercival Aragpm
 * @version     1.0 Published on August 2016
 * @copyright   Copyright (c) 2012-2016 
 */

if (!function_exists('module_position')){
    function module_position($position, $page_details){
        $CI =& get_instance();
		$CI->load->database();
        $modules = $CI->db->order_by('ordering', 'ASC')->where('publish', 1)->where('position', $position)->where('page_visible', $page_details->id)->get('modules')->result();
        
        if($modules){
            foreach($modules as $module){
                $data['mod_data'] = json_decode($module->mod_data);
                $data['module'] = $module;
                $CI->load->view('modules/'.$module->mod_type.'/layout/'.$module->layout, $data);
            }
        }
        
        
    }
}

if (!function_exists('module_latest_news')){
    function module_latest_news($limit){
        $CI =& get_instance();
		$CI->load->database();
        $latest_news = $CI->db->order_by('date_publish', 'DESC')->where('publish', 1)->limit($limit)->get('hda_news')->result();
        return $latest_news;
        
    }
}

if (!function_exists('module_career')){
    function module_career($limit){
        $CI =& get_instance();
		$CI->load->database();
        $careers = $CI->db->order_by('date_publish', 'ASC')->where('publish', 1)->limit($limit)->get('hda_career')->result();
        
        return $careers;
        
    }
}

if (!function_exists('module_menu')){
    function module_menu($group_id,$layout){
        $CI =& get_instance();
		$CI->load->database();
        $menu_data = $CI->db->where('type !=', 'hidden')->where('publish', 1)->where('group_id', $group_id)->get('menu')->result_array();
        
        $CI->multi_menu->set_items($menu_data);
        if($layout == 'topmenu'){
           $html_menu = $CI->multi_menu->render(); 
        }else{
            $html_menu = $CI->multi_menu->render_basic();
        }
        
        return $html_menu;
        
    }
}

