<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Moldex Realty
 * Inquiry Front Controller
 * Hercival Aragon
 * Dec 14, 2016
*/
class Inquiry extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('Inquiry_model');
        $this->load->model('Project_model');

	}
    
    public function index(){
        $message = NULL;
        
        if($_POST){
            $this->form_validation->set_rules('g-recaptcha-response', 'recapthca', 'callback_recaptcha');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Contact Number', 'required|numeric');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('message', 'Description of Business and Message', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('project', 'Project Location', 'required');
            $this->form_validation->set_rules('findus', 'Where did you find us', 'required');
            if($this->form_validation->run() == TRUE){
                $bname = $this->input->post('bname');
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $message = $this->input->post('message');
                $subject = $this->input->post('subject');
                $project = $this->input->post('project');
                $findus = $this->input->post('findus');
    
                
                $email_to = 'hercivalaragon@gmail.com';
                $email_cc = 'val_lee_eight@yahoo.com.au';
                $uid = md5(uniqid(time()));
                $separator = "==Multipart_Boundary_x{$uid}x";
                $eol = PHP_EOL;
                $subject = 'MOLDEX INQUIRY('.$subject.')';
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
                                        Subject: '.$subject.'<br>
                                        Project Location: '.$project.'<br>
                                        Where you find us: '.$findus.'<br>
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
        $data['page_details'] = $this->Page_model->get_page_by_id(8);
        $data['projects'] =  $this->Project_model->get_publish_project();
        $data['message'] = $message;
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

/* End of file inquiry.php */
/* Location: ./application/controllers/inquiry.php */