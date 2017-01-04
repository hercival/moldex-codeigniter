<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Project Manager Controller
 * Hercival Aragon
 * Dec 02, 2016
*/
class Projectmanager extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
            redirect('login', 'refresh');
        }
        $this->load->model('Project_model');
        $this->load->helper('Project_helper');
    }

    public function index(){
        $data['page'] = 'projectmanager/list'; 
        $data['title'] = 'Projects'; 
        $data['results'] = $this->Project_model->get_all_project();
        $this->load->view('administrator', $data);
    }
    public function add(){
    
        $data['page'] = 'projectmanager/add';
        $data['title'] = 'Add Project';
        if($this->input->post()){
            $this->form_validation->set_rules('site_dev_plan', 'Site Development plan', 'required');
            $this->form_validation->set_rules('floor_dev_plan', 'Floor Development plan', 'required');
            $this->form_validation->set_rules('logo', 'Project Logo', 'required');
            $this->form_validation->set_rules('tile', 'Featured Tile Image', 'required');
            $this->form_validation->set_rules('project_name', 'Project name', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('size', 'Development Size', 'required');
            $this->form_validation->set_rules('number', 'LS Number', 'required');
            $this->form_validation->set_rules('long_lat', 'Map Location', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('location_desc', 'Location Description', 'required');
            $this->form_validation->set_rules('amen_fea_desc', 'Featured and Amenities Description', 'required');
            $this->form_validation->set_rules('location_id', 'Category Location', 'required');
            $this->form_validation->set_rules('location', 'Address Location', 'required');
            $this->form_validation->set_rules('project_type', 'Project Type', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('enable', 'Publish', 'required');


            if($this->form_validation->run() == TRUE){
                $site_dev_plan = $this->input->post('site_dev_plan');
                $floor_dev_plan = $this->input->post('floor_dev_plan');
                $logo = $this->input->post('logo');
                $tile = $this->input->post('tile');
                $project_name = $this->input->post('project_name');
                $alias = $this->input->post('alias');
                $alias = alias_checker($alias,'projects', FALSE);
                $size = $this->input->post('size');
                $number = $this->input->post('number');
                $long_lat = $this->input->post('long_lat');
                $desc = $this->input->post('desc');
                $location_desc = $this->input->post('location_desc');
                $amen_fea_desc = $this->input->post('amen_fea_desc');
                $location_id = $this->input->post('location_id');
                $location = $this->input->post('location');
                $project_type = $this->input->post('project_type');
                $status = $this->input->post('status');
                $enable = $this->input->post('enable');
                $leasing = $this->input->post('leasing');
                $banners = json_encode(array('item' =>$this->input->post('banners')));
                $datenow = date('Y-m-d H:i:s');
                $save_data = array(
                    'site_dev_plan' => $site_dev_plan ,
                    'floor_dev_plan' => $floor_dev_plan ,
                    'logo' => $logo,
                    'tile' => $tile,
                    'project_name' => $project_name,
                    'alias' => $alias,
                    'size' => $size,
                    'number' => $number,
                    'long_lat' => $long_lat,
                    'desc' => $desc,
                    'location_desc' => $location_desc,
                    'location_id' => $location_id,
                    'location' => $location,
                    'project_type' => $project_type,
                    'status' => $status,
                    'enable' => $enable,
                    'banners' => $banners,
                    'amen_fea_desc' => $amen_fea_desc,
                    'leasing' => $leasing,
                    'date_created' => $datenow
                );
 
                $save_result = $this->Project_model->save_project($save_data);
                if($save_result){
                    $this->session->set_flashdata('saved', 'Project is successfully created.');
                    redirect('projectmanager', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Creating the Project.');
                }
            }
        }
        
        $this->load->view('administrator', $data);
    }

    public function edit($id = ''){
        $data['page'] = 'projectmanager/edit';
        $data['title'] = 'Edit Project';
        
        if($this->input->post()){
            $this->form_validation->set_rules('site_dev_plan', 'Site Development plan', 'required');
            $this->form_validation->set_rules('floor_dev_plan', 'Floor Development plan', 'required');
            $this->form_validation->set_rules('logo', 'Project Logo', 'required');
            $this->form_validation->set_rules('tile', 'Featured Tile Image', 'required');
            $this->form_validation->set_rules('project_name', 'Project name', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('size', 'Development Size', 'required');
            $this->form_validation->set_rules('number', 'LS Number', 'required');
            $this->form_validation->set_rules('long_lat', 'Map Location', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('location_desc', 'Location Description', 'required');
            $this->form_validation->set_rules('amen_fea_desc', 'Featured and Amenities Description', 'required');
            $this->form_validation->set_rules('location_id', 'Category Location', 'required');
            $this->form_validation->set_rules('location', 'Address Location', 'required');
            $this->form_validation->set_rules('project_type', 'Project Type', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('enable', 'Publish', 'required');
            

            if($this->form_validation->run() == TRUE){
                $id = $this->input->post('id');
                $site_dev_plan = $this->input->post('site_dev_plan');
                $floor_dev_plan = $this->input->post('floor_dev_plan');
                $logo = $this->input->post('logo');
                $tile = $this->input->post('tile');
                $project_name = $this->input->post('project_name');
                $alias = $this->input->post('alias');
                $alias = alias_checker($alias,'projects', $id);
                $size = $this->input->post('size');
                $number = $this->input->post('number');
                $long_lat = $this->input->post('long_lat');
                $desc = $this->input->post('desc');
                $location_desc = $this->input->post('location_desc');
                $amen_fea_desc = $this->input->post('amen_fea_desc');
                $location_id = $this->input->post('location_id');
                $location = $this->input->post('location');
                $project_type = $this->input->post('project_type');
                $status = $this->input->post('status');
                $enable = $this->input->post('enable');
                $leasing = $this->input->post('leasing');
                $banners = json_encode(array('item' =>$this->input->post('banners')));
                $save_data = array(
                    'site_dev_plan' => $site_dev_plan ,
                    'floor_dev_plan' => $floor_dev_plan ,
                    'logo' => $logo,
                    'tile' => $tile,
                    'project_name' => $project_name,
                    'alias' => $alias,
                    'size' => $size,
                    'number' => $number,
                    'long_lat' => $long_lat,
                    'desc' => $desc,
                    'location_desc' => $location_desc,
                    'location_id' => $location_id,
                    'location' => $location,
                    'project_type' => $project_type,
                    'status' => $status,
                    'enable' => $enable,
                    'banners' => $banners,
                    'amen_fea_desc' => $amen_fea_desc,
                    'leasing' => $leasing
                );
 
                $update_result = $this->Project_model->update_project($save_data, $id);
                if($update_result){
                    $this->session->set_flashdata('saved', 'Project is successfully Updated.');
                    redirect('projectmanager', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Updating the Project.');
                    redirect('projectmanager', 'refresh');
                }
                $get_result = $this->Project_model->get_single_project($id);
                $data['results'] = $get_result;
            }
        }else{
            $id = intval($id);
            $get_result = $this->Project_model->get_single_project($id);
            if($get_result){
                $data['results'] = $get_result;
            }else{
                $this->session->set_flashdata('saved', 'Project not Found.');
                redirect('projectmanager', 'refresh');
            }
        }
        $this->load->view('administrator', $data);
    }
    
    public function delete($id){
        $del_result = $this->Project_model->delete_project($id);
        
        if($del_result){
            $this->session->set_flashdata('saved', 'Project is successfully Delete.');
        }else{
            $this->session->set_flashdata('saved', 'There was a problem Deleting the Project.');
        }
        redirect('projectmanager', 'refresh');
    }
    //end of Page CMS
    
}

/* End of file pagemanager.php */
/* Location: ./application/controllers/pagemanager.php */