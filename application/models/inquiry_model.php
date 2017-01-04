<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Inquiry Model
 * Hercival Aragon
 * Dec 14, 2016
*/
class Inquiry_model extends CI_Model {
    function __construct(){
       parent::__construct();
    }

    function get_all_inquiry(){
        $query = $this->db->get('inquiry')->result();
        return $query;
    }
    function get_publish_inquiry(){
        $query = $this->db->where(array('published' => 1))->order_by('date_published','DESC')->get('inquiry')->result();
        return $query;
    }
    
    function get_single_inquiry($id){
        $query = $this->db->where(array('id' => $id))->get('inquiry')->row();
        return $query;
    }
    
    function save_inquiry($data){
        return $this->db->insert('news_events', $data); 
    }
    
    function update_inquiry($data, $id){
        return $this->db->set($data)->where('id', $id)->update('inquiry');
    }
    
    function delete_inquiry($id){
        return $this->db->delete('inquiry', array('id' => $id)); 
    }   
}
?>