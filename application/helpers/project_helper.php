<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Project helper
 * @package     Module
 * @subpackage  Module Helpers
 * @author      Hercival Aragpm
 * @version     1.0 Published on Dec 2016
 * @copyright   Copyright (c) 2012-2016 
 */

if (!function_exists('project_location_id')){
    function project_location_id($location_id){
        $CI =& get_instance();
		$CI->load->database();
        $location = $CI->db->where('id', $location_id)->get('project_location')->row();
        
        if($location){
            return $location;
        }else{
            return 0;
        }  
    }
}

if (!function_exists('project_location_alias')){
    function project_location_alias($location_alias){
        $CI =& get_instance();
		$CI->load->database();
        $location = $CI->db->where('alias', $location_alias)->get('project_location')->row();
        
        if($location){
            return $location;
        }else{
            return 0;
        }  
    }
}

if (!function_exists('project_type_id_to_alias')){
    function project_type_id_to_alias($type_id){
        $CI =& get_instance();
		$CI->load->database();
        $project_type = $CI->db->where('id', $type_id)->get('project_type')->row();
        
        if($project_type){
            return $project_type;
        }else{
            return 0;
        }  
    }
}

if (!function_exists('project_by_status')){
    function project_by_status($status, $location_id){
        $CI =& get_instance();
		$CI->load->database();
        $project_list = NULL;
        if($status == 'all'){
            $project_list = $CI->db->where('enable', 1)->where('location_id', $location_id)->get('projects')->result();
        }else{
            $project_list = $CI->db->where('enable', 1)->where('location_id', $location_id)->where('status', $status)->get('projects')->result();
        }
        return $project_list;
    }
}

if (!function_exists('project_location_data')){
    function project_location_data($location_id){
        $CI =& get_instance();
		$CI->load->database();
        $locations = $CI->db->where('id', $location_id)->get('locations')->row();
        
        if($locations){
            return $locations;
        }else{
            return 0;
        }  
    }
}

if (!function_exists('housemodel_by_project_id')){
    function housemodel_by_project_id($project_id){
        $CI =& get_instance();
		$CI->load->database();
        $housemodel= $CI->db->where('project_id', $project_id)->get('housemodel')->result();
        return $housemodel;

    }
}

if (!function_exists('get_projectname_by_project_id')){
    function get_projectname_by_project_id($project_id){
        $CI =& get_instance();
		$CI->load->database();
        $projects = $CI->db->where('id', $project_id)->get('projects')->row();
        
        if($projects){
            return $projects->project_name;
        }else{
            return 0;
        } 

    }
}

if (!function_exists('project_location_category_name')){
    function project_location_category_name($location_id){
        $CI =& get_instance();
		$CI->load->database();
        $project_type = $CI->db->where('id', $location_id)->get('project_location')->row();
        
        if($project_type){
            return $project_type->title;
        }else{
            return 0;
        }  
    }
}
if (!function_exists('project_location_address')){
    function project_location_address($location_id){
        $CI =& get_instance();
		$CI->load->database();
        $project_type = $CI->db->where('id', $location_id)->get('locations')->row();
        
        if($project_type){
            return $project_type->location_add;
        }else{
            return 0;
        }  
    }
}

if (!function_exists('select_location_category')){
    function select_location_category($value=''){
        $CI =& get_instance();
		$CI->load->database();
        $location_category = $CI->db->where('enable', 1)->get('project_location')->result();
        $option_html = '';
        if($location_category){
            foreach($location_category as $list):
                if($value == $list->id){
                    $option_html .= '<option value="'.$list->id.'" selected="selected">'.$list->title.'</option>';
                }else{
                    $option_html .= '<option value="'.$list->id.'">'.$list->title.'</option>';
                }
            endforeach;
            return $option_html;
        }else{
            return '';
        }  
    }
}

if (!function_exists('select_location_address')){
    function select_location_address($value=''){
        $CI =& get_instance();
		$CI->load->database();
        $location_address = $CI->db->where('enable', 1)->get('locations')->result();
        $option_html = '';
        if($location_address){
            foreach($location_address as $list):
                if($value == $list->id){
                    $option_html .= '<option value="'.$list->id.'" selected="selected">'.$list->location_add.'</option>';
                }else{
                    $option_html .= '<option value="'.$list->id.'">'.$list->location_add.'</option>';
                }
            endforeach;
            return $option_html;
        }else{
            return '';
        }  
    }
}

if (!function_exists('select_project_type')){
    function select_project_type($value=''){
        $CI =& get_instance();
		$CI->load->database();
        $project_type = $CI->db->where('enable', 1)->get('project_type')->result();
        $option_html = '';
        if($project_type){
            foreach($project_type as $list):
                if($value == $list->id){
                    $option_html .= '<option value="'.$list->id.'" selected="selected">'.$list->title.'</option>';
                }else{
                    $option_html .= '<option value="'.$list->id.'">'.$list->title.'</option>';
                }
            endforeach;
            return $option_html;
        }else{
            return '';
        }  
    }
}

if (!function_exists('select_project')){
    function select_project($value=''){
        $CI =& get_instance();
		$CI->load->database();
        $project_type = $CI->db->where('enable', 1)->get('projects')->result();
        $option_html = '';
        if($project_type){
            foreach($project_type as $list):
                if($value == $list->id){
                    $option_html .= '<option value="'.$list->id.'" selected="selected">'.$list->project_name.'</option>';
                }else{
                    $option_html .= '<option value="'.$list->id.'">'.$list->project_name.'</option>';
                }
            endforeach;
            return $option_html;
        }else{
            return '';
        }  
    }
}
