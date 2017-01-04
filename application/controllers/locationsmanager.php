<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Locations Manager Controller
 * Hercival Aragon
 * Dec 20, 2016
*/
class Locationsmanager extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
            redirect('login', 'refresh');
        }
        $this->load->model('Project_model');
        $this->load->helper('Project_helper');
    }

    public function index()
    {
        $data['page'] = 'locationsmanager/list'; 
        $data['title'] = 'Address Location'; 
        $data['results'] = $this->Project_model->get_all_locations();
        $this->load->view('administrator', $data);
    }

    public function add(){
        $data['page'] = 'locationsmanager/add';
        $data['title'] = 'Add Location Address';
        if($this->input->post()){
            $this->form_validation->set_rules('location_add', 'Location Address', 'required');

            if($this->form_validation->run() == TRUE){
                $location_add = $this->input->post('location_add');
                $enable = $this->input->post('enable');
                $datenow = date('Y-m-d H:i:s');

                $save_data = array(
                    'location_add' => $location_add ,
                    'date_created' => $datenow,
                    'enable' => $enable
                );
 
                $save_result = $this->Project_model->save_locations($save_data);
                if($save_result){
                    $this->session->set_flashdata('saved', 'Address Location is successfully created.');
                    redirect('locationsmanager/index', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Creating the Address Location.');
                }
            }
        }

        $this->load->view('administrator', $data);
    }

    public function edit($id = ''){
        $data['page'] = 'locationsmanager/edit';
        $data['title'] = 'Edit Location Address';
        
        if($this->input->post() && $this->input->post('id')){
            $this->form_validation->set_rules('location_add', 'Location Address', 'required');

            if($this->form_validation->run() == TRUE){
                $id = $this->input->post('id');
                $location_add = $this->input->post('location_add');
                $enable = $this->input->post('enable');
                $datenow = date('Y-m-d H:i:s');

                $save_data = array(
                    'location_add' => $location_add ,
                    'enable' => $enable
                );
                
                $update_result = $this->Project_model->update_locations($save_data, $id);
                if($update_result){
                    $get_result = $this->Project_model->get_single_locations($id);
                $data['results'] = $get_result;
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Updating the Address Location.');
                    redirect('locationsmanager/index', 'refresh');
                }
                
            }
        }else{
            $id = intval($id);
            $get_result = $this->Project_model->get_single_locations($id);
            if($get_result){
                $data['results'] = $get_result;
            }else{
                $this->session->set_flashdata('saved', 'Address Location not Found.');
                redirect('locationsmanager/index', 'refresh');
            }
        }
        $this->load->view('administrator', $data);
    }
    
    public function delete($id){
        $del_result = $this->Project_model->delete_locations($id);
        
        if($del_result){
            $this->session->set_flashdata('saved', 'Address Location is successfully Delete.');
        }else{
            $this->session->set_flashdata('saved', 'There was a problem Deleting the Address Location.');
        }
        redirect('locationsmanager/index', 'refresh');
    }
    //end of address location CMS
}

/* End of file locationsmanager.php */
/* Location: ./application/controllers/locationsmanager.php */