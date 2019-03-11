<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct() {
            parent::__construct();
            $this->load->library(['form_validation', 'template']);
        
            $this->load->model(['Settings_model','Login_model', 'Anouncement_model', 'Supplier_model']);
        }

	public function index()
	{
        if ($this->session->userdata('vendor_logged_in')) {
                redirect('dashboard');
            }else{
                $data['title']= "Living Faith Vendors' Login";
                $data['news']= $this->Anouncement_model->get_all();
         //$this->template->load('template', 'users/login2');
		$this->load->view('users/login2', $data);
        }
	}
    
   public function login() {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
               $this->index();
            } else {
                $email = $this->input->post('email', TRUE);
               // $rows = $this->Supplier_model->get_by_email($email);
                $password = $this->input->post('password', TRUE);
                $row = $this->Login_model->login($email, $password);

                if ($row){
                    if($row->status_verification >= 1){
                    $sess_array = array(
                        'company_id' => $row->supplier_id,
                        'email' => $row->email,
                        'company_name'=>$row->company_name,
                    );
                    $this->session->set_userdata('vendor_logged_in', $sess_array);
                   // $this->_checkUser();
                    redirect(site_url('dashboard'));
                    }else{
                     $this->session->set_flashdata('error', 'Account not yet activated, Kindly check email to activate account');
                     redirect(site_url('home')); 
                    }
                }else {
                    $this->session->set_flashdata('error', 'Invalid Email or Password');
                    redirect(site_url('home'));
                }
            }
        }

        public function logout() {
            $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity' && $key != 'firstname' && $key != 'roleID') {
                    $this->session->unset_userdata($key);
                }
            }
            $this->session->sess_destroy();
            redirect('home');
        }
        
       // public function _checkUser(){
      //      if (!$this->session->userdata('vendor_logged_in')) {
      //          redirect('welcome/logout');
      //     }
      //  }
    
    
    public function password(){
        $this->_prules();
         if ($this->form_validation->run() == FALSE) {
               $this->index();
            } else {
              $email = $this->input->post('remail', TRUE); 
             $det = $this->Supplier_model->get_by_email($email);
             if($det){
                 
                  //Load email library
            $this->load->library('email');
             $host=$this->Settings_model->get_all();
            //SMTP & mail configuration
            $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => $host->server,
            'smtp_port' =>  4500,
            'smtp_user' => $host->username,
            'smtp_pass' => $host->password,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'smtp_crypto'=>'tls'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
             
        //Insert Vendor Details into database 
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $passcode = substr(str_shuffle($chars),0,8);
         $options = [
            'cost' => 11,
            ];
        $pass= password_hash($passcode, PASSWORD_BCRYPT, $options);
        
         $data3 = array(

                        'email' => $this->input->post('remail',TRUE),
                        'password' => $passcode,
                         );
             
                    $option = array(
                        'subject'   => 'Vendor Password renewal',
                        'from'      => 'procure@lfcww.org',
                        'from_name' => 'LFC eProcurement',
                        'to'        => $this->input->post('remail',TRUE),
                        'data'      => $data3,
                    );
                    
                    $this->email->from($option['from'], $option['from_name']);
                    $this->email->to($option['to']);
                    $this->email->subject($option['subject']);
                    $this->email->message($this->load->view('templates/password', $option['data'], true));
                    $this->email->set_alt_message('View the mail using an html email client');
                    if($this->email->send()){
                      
                        //Insert Vendors Login
                         $data_login = array(
                            'password' =>$pass,
                        );
                         $this->Login_model->update($det->supplier_id, $data_login); 
                         $this->session->set_flashdata('message', 'Password successfully reset and sent to your email'); 
                         redirect(site_url('home'));
                    }else{
                    $this->session->set_flashdata('error', 'Reset of passwod failed, try again later'); 
                         redirect(site_url('home'));
        }
                 
             }else{
                 $this->session->set_flashdata('error', 'Email does not exist');
                 redirect(site_url('home')); 
             }
         }
    }
    
     public function _rules() {
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
        }
    
     public function _prules() {
            $this->form_validation->set_rules('remail', 'email', 'trim|required|valid_email');
        }
        
}
