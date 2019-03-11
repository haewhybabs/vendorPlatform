<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	 public $login;
     public $company_id;
    
	   function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
           $this->load->library('template');
            $this->load->model(['Supplier_model','Director_model', 'Contact_model', 'Vendor_category_model', 'Supplier_document_model', 'Equipment_model', 'Audit_model','Login_model']);
           $this->login = $this->session->userdata('vendor_logged_in'); 
            $this->company_id=$this->login['company_id'];
            $this->email=$this->login['email'];
        }
    
        public function index()
        {
        $document = $this->Vendor_category_model->get_all();
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $director_list = $this->Director_model->get_by_supplier($this->company_id); 
        $contact_list = $this->Contact_model->get_by_supplier($this->company_id); 
        $equipment = $this->Equipment_model->get_all($this->company_id);
        $support_doc= $this->Supplier_document_model->get_all($this->company_id);
        $specialty=$this->Supplier_model->get_specialty($this->company_id);
        foreach($specialty as $s){
            $spe[]=$s->category;
        }


        $data = array(
            'title' => 'Profile',
            'supplier_data'=>$supplier,
            'director'=>$director_list,
            'contact'=>$contact_list,
            'equipment'=>$equipment,
            'support'=>$support_doc,
             'document'=>$document,
             'specialty'=>$spe,
        );
          $this->template->load('template', 'dashboard/profile', $data);
        
        }
    
    
     public function change_password()
        {
         $supplier= $this->Supplier_model->get_by_id($this->company_id);
       $data = array(
            'title' => 'Change Password',
            'supplier_data'=>$supplier,

        );  
           $this->template->load('template', 'users/change', $data);
        }
    
    
     public function update_action()
        {
        $this->pass_rules();
         if ($this->form_validation->run() == FALSE) {
               $this->change_password();
            } else {
             $oldpassword= $this->input->post('o_pass');
              $newpassword= $this->input->post('n_pass');
              $newpassword2= $this->input->post('n_pass2');
             if($newpassword != $newpassword2){
                  $this->session->set_flashdata('error', "New Password doesn't match, try again");
             $this->change_password();
             }else{
               $options = [
                'cost' => 11,
                ];
            $pass= password_hash($newpassword, PASSWORD_BCRYPT, $options);
               $user_data2=array(
                'password' =>$pass,
            );
            if($verify_pass=$this->Login_model->login($this->email, $oldpassword)){
            $task='Updated password'; 
            $this->audit($task);
                $this->Login_model->update($this->company_id, $user_data2);
                 $this->session->set_flashdata('message', 'Password changed successfully');
                redirect(site_url('profile/change_password')); 
                
          }else{
                 $this->session->set_flashdata('error', 'Invalid Password, try again');
              redirect(site_url('profile/change_password'));   
            }
             }
             
         }
        }
        public function update_category(){
            $category=$this->Supplier_model->get_category($this->company_id);
            $all_cat=$this->Supplier_model->get_all_cat();
            $supplier= $this->Supplier_model->get_by_id($this->company_id);
            if($supplier->status_verification==2){
                redirect('Dashboard');
            }
            $data=array(
                'my_category'=>$category,
                'all_category'=>$all_cat,
                'supplier_data'=>$supplier,
                'title'=>'Update Category'
            );

            $this->template->load('template','users/update_category',$data);
          


        }
        public function category_update(){
            if(count($this->input->post('specialty',TRUE)) < 1 || count($this->input->post('specialty',TRUE)) > 2){
                 $this->session->set_flashdata('error', 'Specialty needed and must not exceed 2 area of specialization');
                 redirect('Profile/update_category');
            }
            else{
                for ($i=0; $i <count($this->input->post('id')) ; $i++) { 
                     $id=$this->input->post('id')[$i];
                        // if($this->input->post('specialty')[$i]==false){
                        //      $x=-1;
                        // }
                        // else{
                        //     $x=$this->input->post('specialty')[$i];
                        // }
                    $data=array(
                        'cat_id'=>$this->input->post('specialty')[$i],

                    );
                    $this->Supplier_model->update_category($data,$id);
                }
                $this->session->set_flashdata('message', 'Update is successful');
                 redirect('Profile/update_category');


             }

            var_dump($this->input->post('id'));

        }
       public function audit($task){
            $user=  $this->Login_model->get_by_id($this->company_id);
            $data_audit = array(
                'user' => $user->company_name.'(vendor)',
                'action' => $task,
                'date_time' => date('Y-m-d H:i:s',time()),
		      );
            
            $this->Audit_model->insert($data_audit);
    }
    
     public function pass_rules()
    {
        $this->form_validation->set_rules('o_pass', 'Old password', 'trim|required');
        $this->form_validation->set_rules('n_pass', 'New password', 'trim|required');
        $this->form_validation->set_rules('n_pass2', 'Retype new password', 'trim|required');
    }
    
}
