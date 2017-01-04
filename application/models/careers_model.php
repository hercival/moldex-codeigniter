<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Careers Model
 * Hercival Aragon
 * Dec 14, 2016
*/
class Careers_model extends CI_Model {
    function __construct(){
       parent::__construct();
    }

    function get_all_careers(){
        $query = $this->db->order_by('date_publish','DESC')->get('careers')->result();
        return $query;
    }
    function get_publish_careers(){
        $query = $this->db->where(array('published' => 1))->order_by('date_publish','DESC')->get('careers')->result();
        return $query;
    }
     function get_publish_careers_by_category($category){
        $query = $this->db->where(array('published' => 1, 'category' => $category))->order_by('date_publish','DESC')->get('careers')->result();
        return $query;
    }
    
    function get_single_careers($id){
        $query = $this->db->where(array('id' => $id))->get('careers')->row();
        return $query;
    }
    function get_single_careers_by_alias($alias){
        $query = $this->db->where(array('alias' => $alias))->get('careers')->row();
        return $query;
    }
    
    function save_careers($data){
        return $this->db->insert('careers', $data); 
    }
    
    function update_careers($data, $id){
        return $this->db->set($data)->where('id', $id)->update('careers');
    }
    
    function delete_news($id){
        return $this->db->delete('careers', array('id' => $id)); 
    }   
}
?>