<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Careers Controller
 * Hercival Aragon
 * Dec 14, 2016
*/
class Careers extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('Careers_model');

	}
    
    public function index(){
        $total_seg = $this->uri->total_segments();
        $careers_details = NULL;
        $keywords = "condominiums for sale near dlsu, condo for rent near de la salle, 3 bedrooms house and lot for sale near us embassy, bungalow house and lot for sale in bulacan, bungalow house and lot for sale in silang cavite, studio type house and lot for sale in manila, studio unit for rent near taft, studio unit for rent near de la salle university, real estate investments in the philippines, real estate in the philippines, philippine real estate investments, philippine real estate, philippine real estate company, manila real estate, real estate in the philippines  real estate brokers in the philippines, real estate in baguio, real estate investment near naia, real property investment near naia, realty investments near us embassy, real estate investment near us embassy in manila, real estate investment near us embassy in the philippines, house and lot for sale in cavite, house and lot for sale in bulacan, house and lot for sale in laguna, house and lot for sale in tagaytay, house and lot for sale in angeles pampanga, house and lot for sale in san jose del monte bulacan, house and lot for sale in silang cavite, 1 bedroom house for sale in cavite, 1 bedroom house for sale in bulacan,2 bedroom house for sale in bulacan, 2 bedroom house for sale in pampanga, 2 bedroom house and lot for sale in tagaytay, 2 bedroom house and lot for sale in laguna";
        if($total_seg == 2){
            $category = $this->uri->segment($total_seg);
            if($category == 'all'){
                $careers_details = $this->Careers_model->get_publish_careers();
            }else{
               $careers_details = $this->Careers_model->get_publish_careers_by_category($category); 
            }
             $metatags = '{"title":"'.$category.' Job Listings","description":"Moldex Realty Inc Job Listings","keywords":"'.$keywords.'","image":"careersbg.jpg"}';
            $page_details = $this->arrayToObject(array('page_type' => 'careers', 'com_layout' => 'list','metatags' => $metatags));
        }else{
            $page_details = $this->Page_model->get_page_by_id(7);
            $careers_details = $this->Careers_model->get_publish_careers();
        }
        
        $data['page_details'] = $page_details;
        $data['careers_details'] = $careers_details;
        $this->load->view('templates/default/inner', $data);
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

/* End of file main.php */
/* Location: ./application/controllers/main.php */