<?php  
    if (!defined('BASEPATH'))exit('No direct script access allowed');

    class Export extends CI_Controller {

        public function __construct() {
            parent::__construct();
			$this->load->model('site');
        }
		
        public function index(){
            $data['title'] = 'Create Excel | TechArise';
            $data['result'] = $this->site->getProduct();  
            $this->load->view('index', $data);
        }
		
		public function sendEmail() {
			
			$data['getInfo'] = $this->site->getProduct();
			$htmlContent = $this->load->view('generatepdffile', $data, TRUE);       
			
			$config = array(
				'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
				'smtp_host' => 'smtp.gmail.com', 
				'smtp_port' => 465,
				'smtp_user' => 'youremail',
				'smtp_pass' => 'password',
				'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
				'mailtype' => 'html', //plaintext 'text' mails or 'html'
				'smtp_timeout' => '20', //in seconds
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$this->load->library('email', $config);
			
			$from = 'fromemail';
			$to = 'toemail';
			$subject = 'test msg';
			$message = 'hello this is test message';

			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($htmlContent);

			if ($this->email->send()) {
				echo 'Your Email has successfully been sent.';
			} else {
				show_error($this->email->print_debugger());
			}
         }
        
    }
?>