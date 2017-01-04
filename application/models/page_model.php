<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Page Model
 * Hercival Aragon
 * Dec 01, 2016
*/
class Page_model extends CI_Model {
    function __construct(){
       parent::__construct();
    }
    
    function get_menu_by_alias($alias){
        return $this->db->where(array('alias' => $alias))->get('menu')->row();
    }
    
    function get_page_by_id($id){
        return $this->db->where(array('id' => $id))->get('pages')->row();
    }
    
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
}
?>