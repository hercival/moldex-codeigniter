<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Careers Manager Controller
 * Hercival Aragon
 * Dec 15, 2016
*/
class Careersmanager extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
            redirect('login', 'refresh');
        }
        $this->load->model('Careers_model');
    }

    public function index()
    {
        $data['page'] = 'careersmanager/list'; 
        $data['title'] = 'Careers'; 
        $data['results'] = $this->Careers_model->get_all_careers();
        $this->load->view('administrator', $data);
    }

    public function add(){
        $data['page'] = 'careersmanager/add';
        $data['title'] = 'Add Career';
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'Job Title', 'required');
            $this->form_validation->set_rules('desc', 'Job Description', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('date_publish', 'Date Publish', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('published', 'Published Status', 'required');

            if($this->form_validation->run() == TRUE){
                $title = $this->input->post('title');
                $content = $this->input->post('desc');
                $alias = $this->input->post('alias');
                $date_publish = $this->input->post('date_publish');
                $category = $this->input->post('category');
                $published = $this->input->post('published');
                $datenow = date('Y-m-d H:i:s');
                $alias = alias_checker($alias,'careers', FALSE);
                $date_publish = date('Y-m-d', strtotime($date_publish));
                $save_data = array(
                    'title' => $title ,
                    'desc' => $content ,
                    'alias' => $alias,
                    'date_publish' => $date_publish,
                    'category' => $category,
                    'date_created' => $datenow,
                    'published' => $published
                );
 
                $save_result = $this->Careers_model->save_careers($save_data);
                if($save_result){
                    $this->session->set_flashdata('saved', 'Career is successfully created.');
                    redirect('careersmanager/index', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Creating the Career.');
                }
            }
        }

        $this->load->view('administrator', $data);
    }

    public function edit($id = ''){
        $data['page'] = 'careersmanager/edit';
        $data['title'] = 'Edit Career';
        
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'Job Title', 'required');
            $this->form_validation->set_rules('desc', 'Job Description', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('date_publish', 'Date Publish', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('published', 'Published Status', 'required');

            if($this->form_validation->run() == TRUE){
                $id = $this->input->post('id');
                $title = $this->input->post('title');
                $content = $this->input->post('desc');
                $alias = $this->input->post('alias');
                $date_publish = $this->input->post('date_publish');
                $category = $this->input->post('category');
                $published = $this->input->post('published');
                $alias = alias_checker($alias,'careers', $id);
                $date_publish = date('Y-m-d', strtotime($date_publish));
                $save_data = array(
                    'title' => $title ,
                    'desc' => $content ,
                    'alias' => $alias,
                    'date_publish' => $date_publish,
                    'category' => $category,
                    'published' => $published
                );
                
                $update_result = $this->Careers_model->update_careers($save_data, $id);
                if($update_result){
                    $this->session->set_flashdata('saved', 'Career is successfully Updated.');
                    $get_result = $this->Careers_model->get_single_careers($id);
                    $data['results'] = $get_result;
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Updating the Career.');
                    redirect('careersmanager/career', 'refresh');
                }
                
            }
        }else{
            $id = intval($id);
            $get_result = $this->Careers_model->get_single_careers($id);
            if($get_result){
                $data['results'] = $get_result;
            }else{
                $this->session->set_flashdata('saved', 'Career not Found.');
                redirect('careersmanager/career', 'refresh');
            }
        }
        $this->load->view('administrator', $data);
    }
    
    public function delete($id){
        $del_result = $this->admin_m->delete_career($id);
        
        if($del_result){
            $this->session->set_flashdata('saved', 'Career is successfully Delete.');
        }else{
            $this->session->set_flashdata('saved', 'There was a problem Deleting the Career.');
        }
        redirect('administrator/career', 'refresh');
    }

}

/* End of file careersmanager.php */
/* Location: ./application/controllers/careersmanager.php */