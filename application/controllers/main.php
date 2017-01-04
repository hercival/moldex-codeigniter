<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Administrator Main Controller
 * Hercival Aragon
 * Nov 22, 2016
*/
class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
    
    public function index(){
        $last = $this->uri->total_segments();
        
        if($last == 0){
            $page_details = $this->Page_model->get_page_by_id(1);
        }else{
            $menu_alias = $this->uri->segment($last);
            $selected_menu = $this->Page_model->get_menu_by_alias($menu_alias);
            $page_details = $this->Page_model->get_page_by_id($selected_menu->page_id);
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
    
    public function aboutus(){
        $page_details = $this->Page_model->get_page_by_id(4);
        $data['page_details'] = $page_details;
        $this->load->view('templates/'.$page_details->template.'/inner', $data);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */