<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Administrator Model
 * Hercival Aragon
 * Nov 22, 2016
*/
class Admin_m extends CI_Model {
    function __construct(){
       parent::__construct();
    }
    
    //Page Model
    function get_all_pages(){
        $query = $this->db->get('pages')->result();
        return $query;
    }
    function get_publish_pages(){
        $query = $this->db->where(array('publish' => 1))->get('pages')->result();
        return $query;
    }
    
    function get_single_page($id){
        $query = $this->db->where(array('id' => $id))->get('pages')->row();
        return $query;
    }
    
    function save_pages($data){
        return $this->db->insert('pages', $data); 
    }
    
    function update_page($data, $id){
        return $this->db->set($data)->where('id', $id)->update('pages');
    }
    
    function delete_page($id){
        return $this->db->delete('pages', array('id' => $id)); 
    }
    //End Page Model
    
    //Menu Model 
    function get_all_menu(){
        $query = $this->db->get('menu')->result();
        return $query;
    }
    function get_all_menu_array(){
        return $this->db->get("menu")->result_array();
    }
    function get_all_top_menu(){
        $query = $this->db->where(array('level' => 0))->get('menu')->result();
        return $query;
    }
    
    function get_all_parent_menu(){
        $query = $this->db->or_where(array('level' => 0))->or_where(array('level' => 1))->get('menu')->result();
        return $query;
    }
    
    public function get_by_level_menu($parent_id , $level){
        $query = $this->db->where(array('parent' => $parent_id, 'level' => $level))->get('menu')->result();
        return $query;
    }
    
    function get_single_menu($id){
        $query = $this->db->where(array('id' => $id))->get('menu')->row();
        return $query;
    }
    
    function save_menu($data){
        return $this->db->insert('menu', $data); 
    }
    
    function update_menu($data, $id){
        return $this->db->set($data)->where('id', $id)->update('menu');
    }
    
    function delete_menu($id){
        return $this->db->delete('menu', array('id' => $id)); 
    }
    
    function ordering_menu($parent_id){
        return $this->db->order_by('menu_order', 'ASC')->where(array('parent' => $parent_id))->get('menu')->result();
    }
    function reordering_menu($parent_id, $position, $id){

        $all_menu_parent = $this->db->where('id !=' , $id)->where('parent' ,$parent_id )->where('menu_order >=', $position)->get('menu')->result();
        foreach($all_menu_parent as $menu){
            $this->update_ordering_addone($menu);
        }
    }
    
    function update_ordering_addone($menu){
        $up_order = $menu->menu_order + 1;
        $this->db->set(array('menu_order' => $up_order))->where('id', $menu->id)->update('menu');
    }
    
    //after reordering it will adjust the order from 0 to the number of menu
    function update_clean_sort($parent_id){
        $all_menu_parent = $this->db->order_by('menu_order', 'ASC')->where('parent' ,$parent_id )->get('menu')->result();
        $sort = 0;
        foreach($all_menu_parent as $menu){
            $this->db->flush_cache();
            $this->db->set(array('menu_order' => $sort))->where('id', $menu->id)->update('menu');
            $sort++;
        }
    }
    
    function get_all_groupmenu(){
         return $this->db->get("menu_group")->result();
    }
    //End Menu Model
    
    //News Model
    function get_all_news(){
        $query = $this->db->get('hda_news')->result();
        return $query;
    }
    function get_publish_news(){
        $query = $this->db->where(array('publish' => 1))->get('hda_news')->result();
        return $query;
    }
    
    function get_single_news($id){
        $query = $this->db->where(array('id' => $id))->get('hda_news')->row();
        return $query;
    }
    function get_single_by_alias($alias){
        $query = $this->db->where(array('alias' => $alias))->get('hda_news')->row();
        return $query;
    }
    
    function save_news($data){
        return $this->db->insert('hda_news', $data); 
    }
    
    function update_news($data, $id){
        return $this->db->set($data)->where('id', $id)->update('hda_news');
    }
    
    function delete_news($id){
        return $this->db->delete('hda_news', array('id' => $id)); 
    }
    //End News Model
    
    //Units Model
    function get_all_units(){
        $query = $this->db->get('hda_units')->result();
        return $query;
    }
    function get_publish_units(){
        $query = $this->db->where(array('publish' => 1))->get('hda_units')->result();
        return $query;
    }
    
    function get_single_units($id){
        $query = $this->db->where(array('id' => $id))->get('hda_units')->row();
        return $query;
    }
    function get_single_by_units($alias){
        $query = $this->db->where(array('alias' => $alias))->get('hda_units')->row();
        return $query;
    }
    
    function save_units($data){
        return $this->db->insert('hda_units', $data); 
    }
    
    function update_units($data, $id){
        return $this->db->set($data)->where('id', $id)->update('hda_units');
    }
    
    function delete_units($id){
        return $this->db->delete('hda_units', array('id' => $id)); 
    }
    //End Units Model
    
    //Career Model
    function get_all_career(){
        $query = $this->db->get('hda_career')->result();
        return $query;
    }
    function get_publish_career(){
        $query = $this->db->where(array('publish' => 1))->get('hda_career')->result();
        return $query;
    }
    
    function get_single_career($id){
        $query = $this->db->where(array('id' => $id))->get('hda_career')->row();
        return $query;
    }
    function get_single_career_by_alias($alias){
        $query = $this->db->where(array('alias' => $alias))->get('hda_career')->row();
        return $query;
    }
    
    function save_career($data){
        return $this->db->insert('hda_career', $data); 
    }
    
    function update_career($data, $id){
        return $this->db->set($data)->where('id', $id)->update('hda_career');
    }
    
    function delete_career($id){
        return $this->db->delete('hda_career', array('id' => $id)); 
    }
    //End Career Model
}
?>