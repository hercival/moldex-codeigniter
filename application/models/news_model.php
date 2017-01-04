<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * News Model
 * Hercival Aragon
 * Dec 01, 2016
*/
class News_model extends CI_Model {
    function __construct(){
       parent::__construct();
    }

    function get_all_news(){
        $query = $this->db->get('news_events')->result();
        return $query;
    }
    function get_publish_news(){
        $query = $this->db->where(array('published' => 1))->order_by('date_published','DESC')->get('news_events')->result();
        return $query;
    }
    
    function get_single_news($id){
        $query = $this->db->where(array('id' => $id))->get('news_events')->row();
        return $query;
    }
    function get_single_by_alias($alias){
        $query = $this->db->where(array('alias' => $alias))->get('news_events')->row();
        return $query;
    }
    
    function save_news($data){
        return $this->db->insert('news_events', $data); 
    }
    
    function update_news($data, $id){
        return $this->db->set($data)->where('id', $id)->update('news_events');
    }
    
    function delete_news($id){
        return $this->db->delete('news', array('id' => $id)); 
    }   
}
?>