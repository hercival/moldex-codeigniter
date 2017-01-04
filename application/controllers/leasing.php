<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Leasing Front Controller
 * Hercival Aragon
 * Dec 02, 2016
*/
class Leasing extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('Leasing_model');
        $this->load->helper('leasing_helper');
        $this->load->helper('project_helper');

	}
    
    public function index(){
        $template_layout = 'inner';
        $page_details = $this->Page_model->get_page_by_id(6);
        $data['page_details'] = $page_details;

        $this->load->view('templates/default/inner', $data);
    }
    
    public function residential(){
        $uri_count = $this->uri->total_segments();
        $template_layout = 'inner';
        $com_data = NULL;
        $location_data = NULL;
        $project_data = NULL;
        if($uri_count == 3){
            $last_alias = $this->uri->segment($uri_count);
            $com_data = $this->Leasing_model->get_leasing_by_alias($last_alias);
            $location_data = project_location_alias($last_alias);
            $page_details = $this->arrayToObject(array('page_type' => 'leasing', 'com_layout' => 'residential_inner'));
        }elseif($uri_count == 4){
            $last_alias = $this->uri->segment($uri_count);
            $com_data = $this->Leasing_model->get_leasing_model_by_alias($last_alias);
            $project_alias = $this->uri->segment(3);
            $project_data = $this->Leasing_model->get_leasing_by_alias($project_alias);
            $location_data = project_location_alias($last_alias);
            $page_details = $this->arrayToObject(array('page_type' => 'leasing', 'com_layout' => 'listing'));
            
        }else{
            $com_data = $this->Leasing_model->get_leasing();
            $page_details = $this->arrayToObject(array('page_type' => 'leasing', 'com_layout' => 'residential'));
        }
        

        $data['com_data'] = $com_data;
        $data['page_details'] = $page_details;
        $data['project_data'] = $project_data;
        $data['location_data'] = $location_data;

        $this->load->view('templates/default/inner', $data);
    }
    
    public function marquetta(){
        $message = NULL;
        if($_POST){
            $this->form_validation->set_rules('g-recaptcha-response', 'recapthca', 'callback_recaptcha');
            $this->form_validation->set_rules('bname', 'Business Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Contact Number', 'required|numeric');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('message', 'Description of Business and Message', 'required');
            if($this->form_validation->run() == TRUE){
                $bname = $this->input->post('bname');
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $message = $this->input->post('message');
    
                
                $email_to = 'hercivalaragon@gmail.com';
                $email_cc = 'val_lee_eight@yahoo.com.au';
                $uid = md5(uniqid(time()));
                $separator = "==Multipart_Boundary_x{$uid}x";
                $eol = PHP_EOL;
                $subject = 'MOLDEX MARQUETTA INQUIRY';
                $message_html = '<html>
                                <head>
                                  <title>'.$subject.'</title>
                                </head>
                                <body>
                                    <p>Dear Moldex,</p>
                                    <p>Inquiry Information<br>
                                        Business Name: '.$bname.'<br>
                                        Name: '.$name.'<br>
                                        Email: '.$email.'<br>
                                        Address: '.$address.'<br>
                                        Phone Number: '.$phone.'<br>
                                    <p>Message:<br>'.$message.'</p>
                                    <p>Thank you.</p>
                                </body>
                            </html>';
                
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('noreply@moldexrealty.ph', 'MOLDEX REALTY');
                $this->email->to($email_to);
                $this->email->bcc($email_cc.', hercivalaragon@gmail.com');
                $this->email->subject($subject);
                $this->email->message($message_html);
                $mail_sent = $this->email->send();
                if($mail_sent){
                    $message = '<div class="alert alert-success" role="alert">Thank you! Your Inquiry has been submitted.</div>';
                }else{
                   $message = '<div class="alert alert-danger" role="alert">Sorry! There was a problem submitting Inquiry! Please try Again</div>'; 
                }
            }
            
        }
            
            
        $page_details = $this->arrayToObject(array('page_type' => 'leasing', 'com_layout' => 'marquetta'));
        $data['page_details'] = $page_details;
        $data['message'] = $message;
        $this->load->view('templates/default/inner', $data);
    }
    
    public function faq(){            
        $page_details = $this->arrayToObject(array('page_type' => 'leasing', 'com_layout' => 'faq'));
        $data['page_details'] = $page_details;
        $this->load->view('templates/default/inner', $data);
    }
    public function recaptcha($str)
	{
		if ($str == ""){
			$this->form_validation->set_message('recaptcha', 'Please Check "Im Not a Robot"');
			return FALSE;
		}else{
			return TRUE;
		}
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

/* End of file leasing.php */
/* Location: ./application/controllers/leasing.php */