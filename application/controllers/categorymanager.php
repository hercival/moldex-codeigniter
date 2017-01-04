<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Category Location Manager Controller
 * Hercival Aragon
 * Dec 20, 2016
*/
class Categorymanager extends CI_Controller {

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
        $data['page'] = 'categorymanager/list'; 
        $data['title'] = 'Location Category'; 
        $data['results'] = $this->Project_model->get_all_categorylocation();
        $this->load->view('administrator', $data);
    }

    public function add(){
        $data['page'] = 'categorymanager/add';
        $data['title'] = 'Add Location Category';
        if($this->input->post()){
            $this->form_validation->set_rules('proj_banner', 'Location Banner', 'required');
            $this->form_validation->set_rules('title', 'Location Category Name', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');

            if($this->form_validation->run() == TRUE){
                $proj_banner = $this->input->post('proj_banner');
                $title = $this->input->post('title');
                $alias = $this->input->post('alias');
                $alias = alias_checker($alias,'project_location', FALSE);
                $orderby = $this->input->post('orderby');
                $enable = $this->input->post('enable');
                $datenow = date('Y-m-d H:i:s');

                $save_data = array(
                    'title' => $title ,
                    'proj_banner' => $proj_banner ,
                    'alias' => $alias,
                    'date_created' => $datenow,
                    'orderby' => $orderby,
                    'enable' => $enable,
                    'date_created' => $datenow
                );
 
                $save_result = $this->Project_model->save_categorylocation($save_data);
                if($save_result){
                    $this->session->set_flashdata('saved', 'Category Location is successfully created.');
                    redirect('categorymanager/index', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Creating the Category Location.');
                }
            }
        }

        $this->load->view('administrator', $data);
    }

    public function edit($id = ''){
        $data['page'] = 'categorymanager/edit';
        $data['title'] = 'Edit Location Category';
        
        if($this->input->post() && $this->input->post('id')){
             $this->form_validation->set_rules('proj_banner', 'Location Banner', 'required');
            $this->form_validation->set_rules('title', 'Location Category Name', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');

            if($this->form_validation->run() == TRUE){
                $id = $this->input->post('id');
                $proj_banner = $this->input->post('proj_banner');
                $title = $this->input->post('title');
                $alias = $this->input->post('alias');
                $alias = alias_checker($alias,'project_location', $id);
                $orderby = $this->input->post('orderby');
                $enable = $this->input->post('enable');
                $datenow = date('Y-m-d H:i:s');

                $save_data = array(
                    'title' => $title ,
                    'proj_banner' => $proj_banner ,
                    'alias' => $alias,
                    'date_created' => $datenow,
                    'orderby' => $orderby,
                    'enable' => $enable,
                    'date_created' => $datenow
                );
                
                $update_result = $this->Project_model->update_categorylocation($save_data, $id);
                if($update_result){
                    $get_result = $this->Project_model->get_single_categorylocation($id);
                $data['results'] = $get_result;
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Updating the Category Location.');
                    redirect('categorymanager/index', 'refresh');
                }
                
            }
        }else{
            $id = intval($id);
            $get_result = $this->Project_model->get_single_categorylocation($id);
            if($get_result){
                $data['results'] = $get_result;
            }else{
                $this->session->set_flashdata('saved', 'Category Location not Found.');
                redirect('categorymanager/index', 'refresh');
            }
        }
        $this->load->view('administrator', $data);
    }
    
    public function delete($id){
        $del_result = $this->Project_model->delete_categorylocation($id);
        
        if($del_result){
            $this->session->set_flashdata('saved', 'Category Location is successfully Delete.');
        }else{
            $this->session->set_flashdata('saved', 'There was a problem Deleting the Category Location.');
        }
        redirect('categorymanager/index', 'refresh');
    }
    //end of Category Location CMS
}

/* End of file categorymanager.php */
/* Location: ./application/controllers/categorymanager.php */