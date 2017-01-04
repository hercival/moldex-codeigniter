<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Page Manager Controller
 * Hercival Aragon
 * Nov 28, 2016
*/
class Pagemanager extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
            redirect('login', 'refresh');
        }
        $this->load->model('admin_m');
        $this->load->model('modules');
    }

    public function index(){
        $data['page'] = 'pagemanager/list'; 
        $data['title'] = 'Pages'; 
        $data['results'] = $this->admin_m->get_all_pages();
        $this->load->view('administrator', $data);
    }
    public function add(){
        $data['page'] = 'pagemanager/add';
        $data['title'] = 'Add Page';
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'Page Title', 'required');
            $this->form_validation->set_rules('template', 'Template', 'required');
            $this->form_validation->set_rules('meta_title', 'SEO Meta Title', '');
            $this->form_validation->set_rules('meta_description', 'SEO Meta Desciption', '');
            $this->form_validation->set_rules('meta_keywords', 'SEO Meta Keywords', '');
            $this->form_validation->set_rules('image', 'SEO Meta Image', '');
            $this->form_validation->set_rules('publish', 'Publish', 'required');
            $this->form_validation->set_rules('page_type', 'Page Type', 'required');
            $this->form_validation->set_rules('com_layout', 'Component Layout', 'required');

            if($this->form_validation->run() == TRUE){
                $title = $this->input->post('title');
                $template = $this->input->post('template');
                $meta_title = $this->input->post('meta_title');
                $meta_description = $this->input->post('meta_description');
                $meta_keywords = $this->input->post('meta_keywords');
                $meta_image = $this->input->post('image');
                $publish = $this->input->post('publish');
                $page_type = $this->input->post('page_type');
                $com_layout = $this->input->post('com_layout');
                $com_option = $this->input->post('com_option');
                $metatags = json_encode(array('title' => $meta_title, 'description' => $meta_description, 'keywords' => $meta_keywords, 'image' => $meta_image));
                $options = json_encode($com_option);
                $datenow = date('Y-m-d H:i:s');
                $save_data = array(
                    'title' => $title ,
                    'template' => $template ,
                    'metatags' => $metatags,
                    'date' => $datenow,
                    'publish' => $publish,
                    'page_type' => $page_type,
                    'com_layout' => $com_layout,
                    'options' => $options
                );
 
                $save_result = $this->admin_m->save_pages($save_data);
                if($save_result){
                    $this->session->set_flashdata('saved', 'Page is successfully created.');
                    redirect('pagemanager/index', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Creating the page.');
                }
            }
        }

        $this->load->view('administrator', $data);
    }

    public function edit($id = ''){
        $data['page'] = 'pagemanager/edit';
        $data['title'] = 'Edit Page';
        
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'Page Title', 'required');
            $this->form_validation->set_rules('template', 'Template', 'required');
            $this->form_validation->set_rules('meta_title', 'SEO Meta Title', '');
            $this->form_validation->set_rules('meta_description', 'SEO Meta Desciption', '');
            $this->form_validation->set_rules('meta_keywords', 'SEO Meta Keywords', '');
            $this->form_validation->set_rules('image', 'SEO Meta Image', '');
            $this->form_validation->set_rules('publish', 'Publish', 'required');
            $this->form_validation->set_rules('page_type', 'Page Type', 'required');
            $this->form_validation->set_rules('com_layout', 'Component Layout', 'required');
            

            if($this->form_validation->run() == TRUE){
                $title = $this->input->post('title');
                $template = $this->input->post('template');
                $meta_title = $this->input->post('meta_title');
                $meta_description = $this->input->post('meta_description');
                $meta_keywords = $this->input->post('meta_keywords');
                $meta_image = $this->input->post('image');
                $publish = $this->input->post('publish');
                $id = $this->input->post('id');
                $page_type = $this->input->post('page_type');
                $com_layout = $this->input->post('com_layout');
                $com_option = $this->input->post('com_option');
                $options = json_encode($com_option);
                $metatags = json_encode(array('title' => $meta_title, 'description' => $meta_description, 'keywords' => $meta_keywords, 'image' => $meta_image));
                $datenow = date('Y-m-d H:i:s');
                $save_data = array(
                    'title' => $title ,
                    'template' => $template ,
                    'metatags' => $metatags,
                    'date' => $datenow,
                    'publish' => $publish,
                    'page_type' => $page_type,
                    'com_layout' => $com_layout,
                    'options' => $options
                );
 
                $update_result = $this->admin_m->update_page($save_data, $id);
                if($update_result){
                    $this->session->set_flashdata('saved', 'Page is successfully Updated.');
                    redirect('pagemanager/index', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Updating the page.');
                    redirect('pagemanager/index', 'refresh');
                }
                $get_result = $this->admin_m->get_single_page($id);
                $data['results'] = $get_result;
            }
        }else{
            $id = intval($id);
            $get_result = $this->admin_m->get_single_page($id);
            if($get_result){
                $data['results'] = $get_result;
            }else{
                $this->session->set_flashdata('saved', 'Page not Found.');
                redirect('pagemanager/index', 'refresh');
            }
        }
        $this->load->view('administrator', $data);
    }
    
    public function delete($id){
        $del_result = $this->admin_m->delete_page($id);
        
        if($del_result){
            $this->session->set_flashdata('saved', 'Page is successfully Delete.');
        }else{
            $this->session->set_flashdata('saved', 'There was a problem Deleting the page.');
        }
        redirect('pagemanager/index', 'refresh');
    }
    //end of Page CMS
    
}

/* End of file pagemanager.php */
/* Location: ./application/controllers/pagemanager.php */