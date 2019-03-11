<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	 public $login;
     public $company_id;
    
	   function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
           $this->load->library('template');
            $this->load->model(['Supplier_model']);
           $this->login = $this->session->userdata('vendor_logged_in'); 
            $this->company_id=$this->login['company_id'];
        }
    
        public function index()
        {
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $int_data= $this->Supplier_model->get_interview($this->company_id);
        $category_rating=$this->Supplier_model->get_rating($this->company_id);
        foreach($category_rating as $rt){
            $rating[]=$rt->capability_rating;
        }
        $rt_sum=array_sum($rating);
        $data = array(
            'title' => 'Dashboard',
            'supplier_data'=>$supplier,
            'int_data'=> $int_data,
            'rating'=>$rt_sum,
        );
           $this->template->load('template', 'dashboard/dash', $data);
         
        }
}
