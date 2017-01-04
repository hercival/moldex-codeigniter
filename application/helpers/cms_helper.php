<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * HDA helper
 * @package     hda
 * @subpackage  Helpers
 * @category    Helpers
 * @author      Hercival Aragpm
 * @version     1.0 Published on August 2016
 * @copyright   Copyright (c) 2012-2016 
 */

//Meta tags Helper
if (!function_exists('meta_generator')){
    function meta_generator($page_details = false, $com = false){
        $keywords = "condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna";
        $description = "Real Estate Investments in the Philippines | Moldex Realty Incorporated has made its mark in the real estate industry through the introduction of quality residential subdivisions and housing projects. One of the country's leading property developer engaged in both vertical and horizontal developments. It carries the brand of excellence of the Moldex Group of Companies.";
        $title = 'Home';
        $image = 'h2.jpg';
        if($com){
            
        }else{
            if(isset($page_details->metatags)){
                
                $metatags = json_decode($page_details->metatags);
                $keywords = strip_tags($metatags->keywords);
                $description = strip_tags($metatags->description);
                $title = $metatags->title;
                $image = $metatags->image;
            }
        }
        
        echo '<title>Moldex Realty Incorporated Philippines | '.$title.'</title>';
        echo '<meta name="description" content="'.$description.'">';
		echo '<meta name="keywords" content="'.$keywords.'">';
        echo '<meta name="subject" content="moldex">';
		echo '<meta name="author" content="Moldex Realty Incorporated Philippines">';
        echo '<meta name="copyright" content="Moldex Realty Incorporated Philippines">';
         
		echo '<meta property="og:title" content="Moldex Realty Incorporated Philippines | '.$title.'">';
		echo '<meta property="og:type" content="website">';
		echo '<meta property="og:image" content="'.base_url().'includes/uploads/'.$image.'">';
		echo '<meta property="og:url" content="'.current_url().'">';
		echo '<meta property="og:description" content="'.$description.'">';
		        
		echo '<meta name="twitter:card" content="photo">';
		echo '<meta name="twitter:title" content="Moldex Realty Incorporated Philippines | '.$title.'">';
		echo '<meta name="twitter:description" content="'.$description.'">';
		echo '<meta name="twitter:image:src" content="'.base_url().'includes/uploads/'.$image.'">';
    }
}

//Alias Helper
if (!function_exists('alias_generator')){
    function alias_generator(){
        $CI =& get_instance();
		$CI->load->database();
    }
}

if (!function_exists('alias_checker')){    
    function alias_checker($alias_text,$table, $id = 0){
        $CI =& get_instance();
		$CI->load->database();

		$alias_text = strtolower($alias_text);
		$alias_text = str_replace(' ', '-', $alias_text); // Replaces all spaces with hyphens.
		$alias_text = preg_replace('/[^A-Za-z0-9\-]/', '', $alias_text); // Removes special chars.
		if($id){
			$q_result = $CI->db->where('id'.' !=', $id)->where('alias', $alias_text)->get($table)->result();
		}else{
			$q_result = $CI->db->like('alias', $alias_text, 'after')->get($table)->result();
		}
		
		$return_alias = '';
		if($q_result){
			$slug_counter = intval(count($q_result)) + 1;
			$return_alias = $alias_text.'-'.$slug_counter;
			return $return_alias;
		}else{
			return $alias_text;
		}

    }
}
//end of Alias Helper

//Menu Levels
if (!function_exists('menu_levels')){
    function menu_levels($parent_id , $level){
        $CI =& get_instance();
		$CI->load->database();
        return $CI->db->order_by("menu_order", "asc")->where(array('parent' => $parent_id, 'level' => $level))->get('hda_menu')->result();
    }
}

if (!function_exists('menu_levels_checker')){
    function menu_levels_checker($parent_id ){
        $CI =& get_instance();
        $CI->load->database();
        $current_level = $CI->db->select('level')->where(array('id' => $parent_id))->get('hda_menu')->row();
        if($current_level){
            $new_level = intval($current_level->level) + 1;
        }else{
            $new_level = 0;
        }
        
        return $new_level;
    }
}

if (!function_exists('menu_listing')){
    function menu_listing($parent_id){
        $CI =& get_instance();
        $CI->load->database();
        $current_level = $CI->db->select('level')->where(array('id' => $parent_id))->get('hda_menu')->row();
        $new_level = intval($current_level->level) + 1;
        return $new_level;
    }
}

if (!function_exists('get_menu_ordering')){
    function get_menu_ordering($parent_id){
        $CI =& get_instance();
        $CI->load->database();
        $totalresult = count($CI->db->select('menu_order')->where(array('parent' => $parent_id))->get('hda_menu')->result());
        $new_order = intval($totalresult);
        return $new_order;
    }
}
//end of Menu Levels

//Module Helper
if (!function_exists('get_module_ordering')){
    function get_module_ordering($position, $page_id){
        $CI =& get_instance();
        $CI->load->database();
        $totalresult = count($CI->db->select('ordering')->where('position', $position)->where('page_visible', $page_id)->get('hda_modules')->result());
        $new_order = intval($totalresult);
        return $new_order;
    }
}
//end of Module Helper

//Checkbox helper Check
if (!function_exists('checkbox_cheker')){
    function checkbox_cheker($check_value, $json_data, $item_name){
        $jsondata = json_decode($json_data);
        $items = $jsondata->$item_name;
        $to_return = '';
        foreach($items as $item){
            if($item == $check_value){
                $to_return = 'checked';
            }
            
        }
        return $to_return;
    }
}

//Readmore Helper
if (!function_exists('readmore_cutter')){
    function readmore_cutter($string, $words_count){
        $shown_string ='';
        $word_counter = 0;
        $original_string = strip_tags($string);
        $words = explode(" ", $original_string);
        foreach($words as $word){
            if($words_count >= $word_counter){
                $shown_string = $shown_string.' '.$word;
            }
           $word_counter++; 
        }
        return $shown_string.'...';
    }
}
//end of Readmore Helper

//Select box for unit floor plans Helper
if (!function_exists('floorplan_select')){
    function floorplan_select($residences_selected =''){
        $CI =& get_instance();
        $CI->load->database();
        $residences = $CI->db->select('residences')->group_by('residences')->get('hda_units')->result();
        $select_html = '<select name="residences" class="form-control">';
        $selected_item = '';
        foreach($residences as $units){
            $select_html .= '<option value="'.$units->residences.'" '.($units->residences == $residences_selected ? 'selected="selected"' : '').'>'.$units->residences.'</option>'; 
        }
        $select_html .= '</select>';
        echo $select_html; 
    }
}
//end of unit floor plans Helper

//Select box for Building floor plans Helper
if (!function_exists('buildingplan_select')){
    function buildingplan_select($building_selected = 0){
        $CI =& get_instance();
        $CI->load->database();
        $buildings = $CI->db->get('hda_building')->result();
        $select_html = '<select name="building" class="form-control">';
        $selected_item = '';
        foreach($buildings as $building){
            $select_html .= '<option value="'.$building->id.'" '.($building->id == $building_selected ? 'selected="selected"' : '').'>'.$building->id.' - '.$building->title.'</option>'; 
        }
        $select_html .= '</select>';
        echo $select_html; 
    }
}
//end of Building floor plan Helper

/* End of file hda_helper.php */
/* Location: ./application/helpers/hda_helper.php */
