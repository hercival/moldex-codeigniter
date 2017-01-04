<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * House Unit Manager Controller
 * Hercival Aragon
 * Dec 19, 2016
*/
class Houseunitmanager extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
            redirect('login', 'refresh');
        }
        $this->load->model('Project_model');
        $this->load->helper('Project_helper');
    }

    public function index(){
        $data['page'] = 'houseunitmanager/list'; 
        $data['title'] = 'House Model and Units'; 
        $data['results'] = $this->Project_model->get_all_houseunit();
        $this->load->view('administrator', $data);
    }
    public function add(){
    
        $data['page'] = 'houseunitmanager/add';
        $data['title'] = 'Add House Model or Unit';
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'Model/Unit Name', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('price', 'Price Range', 'required');
            $this->form_validation->set_rules('floor_area', 'Floor Area', 'required');
            $this->form_validation->set_rules('lot_area', 'Lot Area', 'required');
            $this->form_validation->set_rules('model_type', 'Model Type', 'required');
            $this->form_validation->set_rules('video_link', 'Video Link', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('interior_details', 'Interior Details', 'required');
            $this->form_validation->set_rules('floor_plan', 'Floor Plan Image', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('project_id', 'Under Project', 'required');
            $this->form_validation->set_rules('enable', 'Publish', 'required');
            $this->form_validation->set_rules('featured_leasing', 'Featured Leasing', 'required');
            $this->form_validation->set_rules('tile', 'Featured Tile Image', 'required');

            if($this->form_validation->run() == TRUE){
                $name = $this->input->post('name');
                $alias = $this->input->post('alias');
                $price = $this->input->post('price');
                $floor_area = $this->input->post('floor_area');
                $lot_area = $this->input->post('lot_area');
                $alias = $this->input->post('alias');
                $alias = alias_checker($alias,'housemodel', FALSE);
                $model_type = $this->input->post('model_type');
                $video_link = $this->input->post('video_link');
                $desc = $this->input->post('desc');
                $interior_details = $this->input->post('interior_details');
                $floor_plan = $this->input->post('floor_plan');
                $status = $this->input->post('status');
                $enable = $this->input->post('enable');
                $tile = $this->input->post('tile');
                $project_id = $this->input->post('project_id');
                $featured_leasing = $this->input->post('featured_leasing');
                $banners = json_encode(array('item' =>$this->input->post('banners')));
                $interior_gallery = json_encode(array('item' =>$this->input->post('interior_gallery')));
                $datenow = date('Y-m-d H:i:s');
                $save_data = array(
                    'name' => $name,
                    'alias' => $alias,
                    'price' => $price,
                    'floor_area' => $floor_area,
                    'lot_area' => $lot_area,
                    'model_type' => $model_type,
                    'video_link' => $video_link,
                    'desc' => $desc,
                    'interior_details' => $interior_details,
                    'floor_plan' => $floor_plan,
                    'status' => $status,
                    'enable' => $enable,
                    'featured_leasing' => $featured_leasing,
                    'banners' => $banners,
                    'interior_gallery' => $interior_gallery,
                    'tile' => $tile
                );
 
                $save_result = $this->Project_model->save_houseunit($save_data);
                if($save_result){
                    $this->session->set_flashdata('saved', 'House Model/ Unit is successfully created.');
                    redirect('houseunitmanager', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Creating the Model/Units.');
                }
            }
        }
        
        $this->load->view('administrator', $data);
    }

    public function edit($id = ''){
        $data['page'] = 'houseunitmanager/edit';
        $data['title'] = 'Edit House Model or Unit';
        
        if($this->input->post()){
             $this->form_validation->set_rules('name', 'Model/Unit Name', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('price', 'Price Range', 'required');
            $this->form_validation->set_rules('floor_area', 'Floor Area', 'required');
            $this->form_validation->set_rules('lot_area', 'Lot Area', 'required');
            $this->form_validation->set_rules('model_type', 'Model Type', 'required');
            $this->form_validation->set_rules('video_link', 'Video Link', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('interior_details', 'Interior Details', 'required');
            $this->form_validation->set_rules('floor_plan', 'Floor Plan Image', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('project_id', 'Under Project', 'required');
            $this->form_validation->set_rules('enable', 'Publish', 'required');
            $this->form_validation->set_rules('featured_leasing', 'Featured Leasing', 'required');
            $this->form_validation->set_rules('tile', 'Featured Tile Image', 'required');
            

            if($this->form_validation->run() == TRUE){
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $alias = $this->input->post('alias');
                $price = $this->input->post('price');
                $floor_area = $this->input->post('floor_area');
                $lot_area = $this->input->post('lot_area');
                $alias = $this->input->post('alias');
                $alias = alias_checker($alias,'housemodel', $id);
                $model_type = $this->input->post('model_type');
                $video_link = $this->input->post('video_link');
                $desc = $this->input->post('desc');
                $interior_details = $this->input->post('interior_details');
                $floor_plan = $this->input->post('floor_plan');
                $status = $this->input->post('status');
                $enable = $this->input->post('enable');
                $project_id = $this->input->post('project_id');
                $featured_leasing = $this->input->post('featured_leasing');
                $banners = json_encode(array('item' =>$this->input->post('banners')));
                $interior_gallery = json_encode(array('item' =>$this->input->post('interior_gallery')));
                $tile = $this->input->post('tile');
                 $save_data = array(
                    'name' => $name,
                    'alias' => $alias,
                    'price' => $price,
                    'floor_area' => $floor_area,
                    'lot_area' => $lot_area,
                    'model_type' => $model_type,
                    'video_link' => $video_link,
                    'desc' => $desc,
                    'interior_details' => $interior_details,
                    'floor_plan' => $floor_plan,
                    'status' => $status,
                    'enable' => $enable,
                    'featured_leasing' => $featured_leasing,
                    'banners' => $banners,
                    'interior_gallery' => $interior_gallery,
                     'tile' => $tile
                );
 
                $update_result = $this->Project_model->update_houseunit($save_data, $id);
                if($update_result){
                    $this->session->set_flashdata('saved', 'House model Unit is successfully Updated.');
                    redirect('houseunitmanager', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Updating the House model Unit.');
                    redirect('houseunitmanager', 'refresh');
                }
                $get_result = $this->Project_model->get_single_houseunit($id);
                $data['results'] = $get_result;
            }
        }else{
            $id = intval($id);
            $get_result = $this->Project_model->get_single_houseunit($id);
            if($get_result){
                $data['results'] = $get_result;
            }else{
                $this->session->set_flashdata('saved', 'House model Unit not Found.');
                redirect('houseunitmanager', 'refresh');
            }
        }
        $this->load->view('administrator', $data);
    }
    
    public function delete($id){
        $del_result = $this->Project_model->delete_houseunit($id);
        
        if($del_result){
            $this->session->set_flashdata('saved', 'House Model Unit is successfully Delete.');
        }else{
            $this->session->set_flashdata('saved', 'There was a problem Deleting the House Model Unit.');
        }
        redirect('houseunitmanager', 'refresh');
    }
    //end of Page CMS
    
}

/* End of file houseunitmanager.php */
/* Location: ./application/controllers/houseunitmanager.php */