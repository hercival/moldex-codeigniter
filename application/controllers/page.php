<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('page_model');
        $this->load->model('admin_m');
        $this->load->helper('module_helper');
	}
    
    public function index(){
        $last = $this->uri->total_segments();
        $menu_alias = $this->uri->segment($last);
        $selected_menu = $this->page_model->get_menu_by_alias($menu_alias);
        $page_details = $this->page_model->get_page_by_id($selected_menu->page_id);
        if($last == 0){
            $page_details = $this->page_model->get_page_by_id(5);
        }
        if(!$page_details){
            redirect('errorpage', 'refresh');
        }
        $data['page_details'] = $page_details;
        if($page_details->page_type == 'default'){
            $this->load->view('templates/'.$page_details->template.'/index', $data);
        }else if($page_details->page_type == 'careers'){
            $career_details = $this->admin_m->get_publish_career();
            $data['details'] = $career_details;
            $data['layout'] = 'default';
            $data['components'] = 'career';
            $this->load->view('templates/default/component', $data);
        }else if($page_details->page_type == 'news'){
            $news_details = $this->admin_m->get_publish_news();
            $data['details'] = $news_details;
            $data['layout'] = 'default';
            $data['components'] = 'news';
            $this->load->view('templates/default/component', $data);
        }else if($page_details->page_type == 'careers'){
            $career_details = $this->admin_m->get_publish_career();
            $data['details'] = $career_details;
            $data['layout'] = 'default';
            $data['components'] = 'career';
            $this->load->view('templates/default/component', $data);
        }else{
            $this->load->view('templates/'.$page_details->template.'/index', $data);
        }
    }
    
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */