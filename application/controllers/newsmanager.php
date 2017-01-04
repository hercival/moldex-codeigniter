<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * News Manager Controller
 * Hercival Aragon
 * Nov 22, 2016
*/
class Newsmanager extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
            redirect('login', 'refresh');
        }
        $this->load->model('News_model');
    }

    public function index()
    {
        $data['page'] = 'newsmanager/list'; 
        $data['title'] = 'News and Events'; 
        $data['results'] = $this->News_model->get_all_news();
        $this->load->view('administrator', $data);
    }

    public function add(){
        $data['page'] = 'newsmanager/add';
        $data['title'] = 'Add News and Events';
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'News Title', 'required');
            $this->form_validation->set_rules('content', 'News Content', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('date_published', 'Date Publish', 'required');
            $this->form_validation->set_rules('image', 'Image', 'required');

            if($this->form_validation->run() == TRUE){
                 $title = $this->input->post('title');
                $id = $this->input->post('id');
                $content = $this->input->post('content');
                $alias = $this->input->post('alias');
                $date_published = $this->input->post('date_published');
                $image = $this->input->post('image');
                $published = $this->input->post('published');
                $datenow = date('Y-m-d H:i:s');
                $alias = alias_checker($alias,'news_events', FALSE);
                $date_published = date('Y-m-d', strtotime($date_published));
                $save_data = array(
                    'title' => $title ,
                    'content' => $content ,
                    'alias' => $alias,
                    'date_published' => $date_published,
                    'image' => $image,
                    'published' => $published,
                    'date_created' => $datenow
                );
 
                $save_result = $this->News_model->save_news($save_data);
                if($save_result){
                    $this->session->set_flashdata('saved', 'News is successfully created.');
                    redirect('newsmanager/index', 'refresh');
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Creating the News.');
                }
            }
        }

        $this->load->view('administrator', $data);
    }

    public function edit($id = ''){
        $data['page'] = 'newsmanager/edit';
        $data['title'] = 'Edit News and Events';
        
        if($this->input->post() && $this->input->post('id')){
            $this->form_validation->set_rules('title', 'News Title', 'required');
            $this->form_validation->set_rules('content', 'News Content', 'required');
            $this->form_validation->set_rules('alias', 'Alias', 'required');
            $this->form_validation->set_rules('date_published', 'Date Publish', 'required');
            $this->form_validation->set_rules('image', 'Image', 'required');

            if($this->form_validation->run() == TRUE){
                $title = $this->input->post('title');
                $id = $this->input->post('id');
                $content = $this->input->post('content');
                $alias = $this->input->post('alias');
                $date_published = $this->input->post('date_published');
                $image = $this->input->post('image');
                $published = $this->input->post('published');
                $datenow = date('Y-m-d H:i:s');
                $alias = alias_checker($alias,'news_events', $id);
                $date_published = date('Y-m-d', strtotime($date_published));
                $save_data = array(
                    'title' => $title ,
                    'content' => $content ,
                    'alias' => $alias,
                    'date_published' => $date_published,
                    'image' => $image,
                    'published' => $published
                );
                
                $update_result = $this->News_model->update_news($save_data, $id);
                if($update_result){
                    $get_result = $this->News_model->get_single_news($id);
                $data['results'] = $get_result;
                }else{
                    $this->session->set_flashdata('saved', 'There was a problem Updating the News.');
                    redirect('newmanager/index', 'refresh');
                }
                
            }
        }else{
            $id = intval($id);
            $get_result = $this->News_model->get_single_news($id);
            if($get_result){
                $data['results'] = $get_result;
            }else{
                $this->session->set_flashdata('saved', 'Page not Found.');
                redirect('newsmanager/index', 'refresh');
            }
        }
        $this->load->view('administrator', $data);
    }
    
    public function delete($id){
        $del_result = $this->News_model->delete_news($id);
        
        if($del_result){
            $this->session->set_flashdata('saved', 'News is successfully Delete.');
        }else{
            $this->session->set_flashdata('saved', 'There was a problem Deleting the News.');
        }
        redirect('newsmanager/index', 'refresh');
    }
    //end of News CMS
}

/* End of file newsmanager.php */
/* Location: ./application/controllers/newsmanager.php */