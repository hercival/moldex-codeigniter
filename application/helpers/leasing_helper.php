<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Leasing helper
 * @package     Module
 * @subpackage  Module Helpers
 * @author      Hercival Aragpm
 * @version     1.0 Published on Dec 2016
 * @copyright   Copyright (c) 2012-2016 
 */

if (!function_exists('featured_leasing')){
    function featured_leasing(){
        $CI =& get_instance();
		$CI->load->database();
        $featured = $CI->db->where('featured_leasing', 1)->get('housemodel')->result();
        return $featured;
    }
}

if (!function_exists('get_leasing_property_alias')){
    function get_leasing_property_alias($project_id){
        $CI =& get_instance();
		$CI->load->database();
        $property = $CI->db->where('id', $project_id)->get('projects')->row();
        return $property;
    }
}
