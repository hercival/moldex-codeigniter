<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Project Model
 * Hercival Aragon
 * Dec 02, 2016
*/
class Project_model extends CI_Model {
    function __construct(){
       parent::__construct();
    }
    
    function get_project_by_alias($alias){
        $project = $this->db->where('enable', 1)->where('alias', $alias)->get('projects')->row();
        return $project; 
    }
    function get_projects_by_location_alias($alias){
        
        $location = $this->get_location_by_alias($alias);
        if($location){
            $project_list = $this->db->where('enable', 1)->where('location_id', $location->id)->get('projects')->result();
            return $project_list; 
        }else{
            return 0;
        }
        
    }
    function get_projects_by_location_alias_status($alias,$status){
        
        $location = $this->get_location_by_alias($alias);
        if($location){
            if($status == 'all'){
                $project_list = $this->db->where('enable', 1)->where('location_id', $location->id)->get('projects')->result();
            }else{
                $project_list = $this->db->where('enable', 1)->where('location_id', $location->id)->where('status', $status)->get('projects')->result();
            }
            
            return $project_list; 
        }else{
            return 0;
        }
        
    }
    function get_projects_by_type_alias_status($alias,$status,$type_alias){
        
        $location = $this->get_location_by_alias($alias);
        $proj_type = $this->get_projecttype_by_alias($type_alias);
        if($location && $proj_type){
            if($status == 'all'){
                $project_list = $this->db->where('enable', 1)->where('location_id', $location->id)->where('project_type', $proj_type->id)->get('projects')->result();
            }else{
                $project_list = $this->db->where('enable', 1)->where('location_id', $location->id)->where('status', $status)->where('project_type', $proj_type->id)->get('projects')->result();
            }
            
            return $project_list; 
        }else{
            return 0;
        }
        
    }
    
    function get_housemodel_alias($alias){
        if($alias){
            $housemodel = $this->db->where('enable', 1)->where('alias', $alias)->get('housemodel')->row();
            return $housemodel; 
        }else{
            return 0;
        }
        
    }
    
    function search_project($location_id, $type){
        $project = $this->db->where('enable', 1)->where('location', $location_id)->where('project_type', $type)->get('projects')->result();
        return $project; 
    }
    
    function get_location_by_alias($alias){
        $project = $this->db->where('enable', 1)->where('alias', $alias)->get('project_location')->row();
        return $project; 
    }
    function get_projecttype_by_alias($alias){
        $project = $this->db->where('enable', 1)->where('alias', $alias)->get('project_type')->row();
        return $project; 
    }
    
    function get_project_by_id($id){
        return $this->db->where(array('id' => $id))->get('projects')->row();
    }
    
    function get_all_project(){
        $query = $this->db->get('projects')->result();
        return $query;
    }
    function get_publish_project(){
        $query = $this->db->where(array('enable' => 1))->get('projects')->result();
        return $query;
    }
    
    function get_single_project($id){
        $query = $this->db->where(array('id' => $id))->get('projects')->row();
        return $query;
    }
    
    function save_project($data){
        return $this->db->insert('projects', $data); 
    }
    
    function update_project($data, $id){
        return $this->db->set($data)->where('id', $id)->update('projects');
    }
    
    function delete_project($id){
        return $this->db->delete('projects', array('id' => $id)); 
    }
    
    //House Unit
    function get_all_houseunit(){
        $query = $this->db->get('housemodel')->result();
        return $query;
    }
    function get_publish_houseunit(){
        $query = $this->db->where(array('enable' => 1))->get('housemodel')->result();
        return $query;
    }
    
    function get_single_houseunit($id){
        $query = $this->db->where(array('id' => $id))->get('housemodel')->row();
        return $query;
    }
    
    function save_houseunit($data){
        return $this->db->insert('housemodel', $data); 
    }
    
    function update_houseunit($data, $id){
        return $this->db->set($data)->where('id', $id)->update('housemodel');
    }
    
    function delete_houseunit($id){
        return $this->db->delete('housemodel', array('id' => $id)); 
    }
    
    //Category Location
    function get_all_categorylocation(){
        $query = $this->db->get('project_location')->result();
        return $query;
    }
    function get_publish_categorylocation(){
        $query = $this->db->where(array('enable' => 1))->get('project_location')->result();
        return $query;
    }
    
    function get_single_categorylocation($id){
        $query = $this->db->where(array('id' => $id))->get('project_location')->row();
        return $query;
    }
    
    function save_categorylocation($data){
        return $this->db->insert('project_location', $data); 
    }
    
    function update_categorylocation($data, $id){
        return $this->db->set($data)->where('id', $id)->update('project_location');
    }
    
    function delete_categorylocation($id){
        return $this->db->delete('project_location', array('id' => $id)); 
    }
    
    //Address Location
    function get_all_locations(){
        $query = $this->db->get('locations')->result();
        return $query;
    }
    function get_publish_locations(){
        $query = $this->db->where(array('enable' => 1))->get('locations')->result();
        return $query;
    }
    
    function get_single_locations($id){
        $query = $this->db->where(array('id' => $id))->get('locations')->row();
        return $query;
    }
    
    function save_locations($data){
        return $this->db->insert('locations', $data); 
    }
    
    function update_locations($data, $id){
        return $this->db->set($data)->where('id', $id)->update('locations');
    }
    
    function delete_locations($id){
        return $this->db->delete('locations', array('id' => $id)); 
    }
}
?>