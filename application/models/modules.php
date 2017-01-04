<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Modules Model
 * Hercival Aragon
 * Model for Ortigas and Company
 * August 2016
 */
class Modules extends CI_Model {
    function __construct(){
       parent::__construct();
    }

    function get_all_module(){
        return $this->db->get('hda_modules')->result();
    }
    
    function get_single_module($id){
        return $this->db->where(array('id' => $id))->get('hda_modules')->row();
    }
    function get_module_by_page($page_id){
        return $this->db->where(array('page_visible' => $page_id))->get('hda_modules')->result();
    }
    
    function save_module($data){
        return $this->db->insert('hda_modules', $data); 
    }
    
    function update_module($data, $id){
        return $this->db->set($data)->where('id', $id)->update('hda_modules');
    }
    
    function delete_module($id){
        return $this->db->delete('hda_modules', array('id' => $id)); 
    }
    
    function ordering_module($page_visible, $position){
        return $this->db->order_by('ordering', 'ASC')->where('position', $position)->where('page_visible', $page_visible)->get('hda_modules')->result();
    }
    function reordering_module($page_visible, $position, $ordering, $id){

        $all_menu_parent = $this->db->where('id !=' , $id)->where('page_visible' ,$page_visible )->where('position' ,$position )->where('ordering >=', $ordering)->get('hda_modules')->result();
        foreach($all_menu_parent as $module){
            $this->update_ordering_addone($module);
        }
    }
    function update_ordering_addone($menu){
        $up_order = $menu->ordering + 1;
        $this->db->set(array('ordering' => $up_order))->where('id', $menu->id)->update('hda_modules');
    }
    
    //after reordering it will adjust the order from 0 to the number of module
    function update_clean_sort($position, $page_visible){
        $all_menu_parent = $this->db->order_by('ordering', 'ASC')->where('position' ,$position )->where('page_visible' ,$page_visible )->get('hda_modules')->result();
        $sort = 0;
        foreach($all_menu_parent as $menu){
            $this->db->flush_cache();
            $this->db->set(array('ordering' => $sort))->where('id', $menu->id)->update('hda_modules');
            $sort++;
        }
    }
    
    function update_module_data($json_data, $id){
        return $this->db->set(array('mod_data' => $json_data))->where('id', $id)->update('hda_modules');
    }
    
    function search_units($location, $development_type, $price){
        $price = explode("-", $price);
        if(count($price) > 1){
            $search_result = $this->db->where('location' ,$location )
            ->where('development_type' ,$development_type )
            ->where('price >=' ,$price[0] )
            ->where('price <=' ,$price[1] )
            ->get('hda_units')->result();
        }else{
            $search_result = $this->db->where('location' ,$location )
            ->where('development_type' ,$development_type )
            ->where('price <=' ,$price[0] )
            ->get('hda_units')->result();
        }
        return $search_result;
    }
}
?>