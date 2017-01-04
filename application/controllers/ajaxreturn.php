<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Ajax Return Controller
 * Hercival Aragon
 * Dec 01, 2016
*/
class Ajaxreturn extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
            return false;
        }
    }
    
    function index(){
        echo 'Sorry! Not Allow to go here!';
    }
    function component_list($selected = ''){
        $this->load->helper('directory');
        $components_folder = directory_map('./application/views/components/');
        $html_return = '';
        foreach($components_folder as $key => $value){
            if($selected == $key){
                $html_return .= '<option value="'.$key.'" selected="selected">'.$key.'</option>';
            }else{
                $html_return .= '<option value="'.$key.'">'.$key.'</option>';
            }
            
        }
        echo $html_return;
        
    }
    
    function component_layout($component_name = '', $selected = ''){
        $this->load->helper('directory');
        $components_folder = directory_map('./application/views/components/'.$component_name.'/layout/');
        $html_return = '';
        if($components_folder){
            foreach($components_folder as $key => $value){
                $temp_val = explode('.', $value);
                if(!preg_match('/_option/', $temp_val[0])){
                   if($selected == $temp_val[0]){
                        $html_return .= '<option value="'.$temp_val[0].'" selected="selected">'.$temp_val[0].'</option>';
                    }else{
                        $html_return .= '<option value="'.$temp_val[0].'">'.$temp_val[0].'</option>';
                    } 
                }
                
                
            }
        }
        echo $html_return;
    }
    
    function component_option($component = '', $layout = ''){
        $this->load->view('components/'.$component.'/layout/'.$layout."_option");
    }
}
/* End of file ajaxreturn.php */
/* Location: ./application/controllers/ajaxreturn.php */