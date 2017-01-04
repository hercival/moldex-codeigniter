<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Leasing Model
 * Hercival Aragon
 * Dec 02, 2016
*/
class Leasing_model extends CI_Model {
    function __construct(){
       parent::__construct();
    }

    function get_leasing(){
        $project_list = $this->db->where('enable', 1)->where('leasing', 1)->get('projects')->result();
        return $project_list; 
        
    } 
    function get_leasing_by_alias($alias){
        $project_list = $this->db->where('enable', 1)->where('alias', $alias)->get('projects')->row();
        return $project_list; 
        
    } 
    function get_leasing_model_by_alias($alias){
        $project_list = $this->db->where('enable', 1)->where('alias', $alias)->get('housemodel')->row();
        return $project_list; 
        
    } 
}
?>