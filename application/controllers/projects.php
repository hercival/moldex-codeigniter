<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Project Front Controller
 * Hercival Aragon
 * Dec 02, 2016
*/
class Projects extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('Project_model');
        $this->load->helper('Project_helper');
	}
    
    public function index(){
        $uri_count = $this->uri->total_segments();
        $com_data = NULL;
        $location_data = NULL;
        $housemodel_data = NULL;
        $keywords = "condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna";
        if($uri_count == 0 || $uri_count == 1){
            $page_details = $this->Page_model->get_page_by_id(3);
        }else{
            $last_alias = $this->uri->segment($uri_count);
            if($uri_count == 2){
                $com_data = $this->Project_model->get_projects_by_location_alias($last_alias);
                $location_data = project_location_alias($last_alias);
                $metatags = '{"title":"'.$location_data->title.'","description":"Moldex Realty values both design of spaces and the welfare of its communities.","keywords":"'.$keywords.'","image":"'.$location_data->proj_banner.'"}';
                $page_details = $this->arrayToObject(array('page_type' => 'projects', 'com_layout' => 'property', 'metatags' => $metatags));
            }elseif($uri_count == 3){
                $location_alias = $this->uri->segment(2);
                $location_data = project_location_alias($location_alias);
                $com_data = $this->Project_model->get_projects_by_location_alias_status($location_alias,$last_alias);
                $page_details = $this->arrayToObject(array('page_type' => 'projects', 'com_layout' => 'property'));
            }elseif($uri_count == 4){
                
                $location_alias = $this->uri->segment(2);
                $status_alias = $this->uri->segment(3);
                $type_alias = $this->uri->segment(4);
                $location_data = project_location_alias($location_alias);
                $com_data = $this->Project_model->get_projects_by_type_alias_status($location_alias,$status_alias,$type_alias);
                
                $page_details = $this->arrayToObject(array('page_type' => 'projects', 'com_layout' => 'property'));
            }elseif($uri_count == 5){
                
                $location_alias = $this->uri->segment(2);
                $status_alias = $this->uri->segment(3);
                $type_alias = $this->uri->segment(4);
                $project_alias = $this->uri->segment(5);
                $location_data = project_location_alias($location_alias);
                $com_data = $this->Project_model->get_project_by_alias($project_alias);
                $metatags = '{"title":"'.$com_data->project_name.'","description":"'.$com_data->desc.'","keywords":"'.$keywords.'","image":"'.$com_data->tile.'"}';
                $page_details = $this->arrayToObject(array('page_type' => 'projects', 'com_layout' => 'innerproject','metatags' => $metatags));
            }elseif($uri_count == 6){
                
                $location_alias = $this->uri->segment(2);
                $status_alias = $this->uri->segment(3);
                $type_alias = $this->uri->segment(4);
                $project_alias = $this->uri->segment(5);
                $housemodel_alias = $this->uri->segment(6);
                $location_data = project_location_alias($location_alias);
                $com_data = $this->Project_model->get_project_by_alias($project_alias);
                $housemodel_data = $this->Project_model->get_housemodel_alias($housemodel_alias);
                $metatags = '{"title":"'.$housemodel_data->name.'","description":"'.$housemodel_data->desc.'","keywords":"'.$keywords.'","image":"'.$housemodel_data->tile.'"}';
                $page_details = $this->arrayToObject(array('page_type' => 'projects', 'com_layout' => 'housemodel','metatags' => $metatags));
            }
        }
        
        
        if(!$page_details){
            redirect('errorpage', 'refresh');
        }
        $data['location_data'] = $location_data;
        $data['com_data'] = $com_data;
        $data['housemodel_data'] = $housemodel_data;
        $data['page_details'] = $page_details;

        $this->load->view('templates/default/component', $data);
    }
    
    public function search(){
        
        if($this->input->post()){
            $typesearch = $this->input->post('typesearch');
            $locationsearch = $this->input->post('locationsearch');
            $com_data = NULL;
            $location_data = NULL;
            $housemodel_data = NULL;


            $page_details = $this->arrayToObject(array('page_type' => 'projects', 'com_layout' => 'search'));
            
            $com_data = $this->Project_model->search_project($locationsearch,$typesearch);
            

            $data['location_data'] = $location_data;
            $data['com_data'] = $com_data;
            $data['housemodel_data'] = $housemodel_data;
            $data['page_details'] = $page_details;

            $this->load->view('templates/default/component', $data);
        }else{
            redirect('projects', 'refresh');
        }
        
    }
    
    public function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }

        $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name=>$value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = $this->arrayToObject($value);
                }
            }
            return $object;
        }
        else {
            return FALSE;
        }
    }
}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */