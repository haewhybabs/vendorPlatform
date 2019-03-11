<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends MY_Controller {

      public $login;
    public $company_id;
    
    function __construct() {
            parent::__construct();
             $this->load->library(['form_validation', 'upload']);
           $this->load->library('template');
            $this->load->model(['Supplier_model', 'Requisition_details_model', 'Vendor_rfq_model', 'Settings_model', 'Department_requisition_model', 'Selectv_model']);
            $this->login = $this->session->userdata('vendor_logged_in'); 
            $this->company_id=$this->login['company_id'];
        }
    
     public function index()
        {
      //  $supplier= $this->Supplier_model->get_by_id($this->company_id);
         //$list = $this->Selectv_model->get_by_company_id($this->company_id);
         $get_company_purchase=$this->Supplier_model->get_company_purchase($this->company_id);
         $supplier= $this->Supplier_model->get_by_id($this->company_id);
         $data = array(
              
             'purchase' => $get_company_purchase,
             'supplier_data'=>$supplier,
             'title' => 'Requested Quotes',
         );
            $this->template->load('template', 'purchase/list', $data);
            //$get_company_purchase=$this->Supplier_model->get_company_purchase($this->company_id);
           // var_dump($get_company_purchase);
        }
    
    public function emails(){
         $list = $this->Requisition_details_model->get_by_company_id($this->company_id);
        print_r($list);
    }
    

    public function download()
    {
        $id = $this->input->post('qid');
        $vid = $this->input->post('vid');
       // $quote = $this->Vendor_rfq_model->get_by_id_join($id, $vid);
        $material_list = $this->Selectv_model->get_by_req_id($this->input->post('vid'), $this->input->post('qid'));
        $vendor = $this->Vendor_rfq_model->get_vendor_id($vid);
        
       // print_r($material_list);

        $data = array(
            'reqdetails' => $material_list,
            'vendor' => $vendor
        );

        $html = $this->load->view('templates/po_download',$data,TRUE);
        $pdfFilePath = "PURCHASE_ORDER.pdf";
        $this->load->library('m_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "I");
    }
    

    public function upload($id)
    {
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $message= $this->Vendor_rfq_model->get_by_com_id($id, $this->company_id);
        if($message){
            $data = array(
                
                'supplier_data'=> $supplier,
                'message'=>$message,
                'title' => 'Upload Invoice',
            );
            $this->template->load('template', 'quotes/form1', $data);
        }else{
            $this->session->set_flashdata('error', 'This detail does not exist');
            redirect(site_url('purchase_order'));
        }
    }

    public function upload_action(){
        // $this->document_rules();
        $message= $this->Vendor_rfq_model->get_by_com_id($this->input->post('quote_id'), $this->company_id);

            $uploadPath = './uploads/invoice/';
            $ext = substr( strrchr($_FILES['document_file']['name'], '.'), 1);
            $new_name = date('Ymd').time().".".$ext;
            $config['file_name']            = $new_name;
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'doc|docx|pdf';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('document_file'))
            {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->document();
            }
            else
            {
                $date=date('Y-m-d');
                $data = array(
                    'invoice'=>$new_name,
                    'vrfq_id' => $this->input->post('quote_id'),
                    'vend_id' => $this->input->post('vid'),
                    'submission_date'=>$date,
                );
                $data1 = array(
                    'sent_invoice'=>"1",

                );



                $this->Vendor_rfq_model->insert_invoice( $data);
                $this->Vendor_rfq_model->update_quote($this->input->post('quote_id'), $this->company_id, $data1);

                $this->session->set_flashdata('message', 'Invoice uploaded successfully');
                redirect(site_url('purchase_order'));
            }


    }
    
    
        public function submit()
        {
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $list = $this->Requisition_details_model->get_by_company_id($this->company_id);
        $data = array(
             'list' => $list,
            'supplier_data' => $supplier,
            'title' => 'Requested Quotes',
        );
           $this->template->load('template', 'quotes/submitted', $data);
        }
    
        public function status()
        {
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $list = $this->Requisition_details_model->get_by_company_id($this->company_id);
        $data = array(
             'list' => $list,
           'supplier_data' => $supplier,
            'title' => 'Requested Quotes',
        );
           $this->template->load('template', 'quotes/status', $data);
        }
 
     public function document_rules(){
        $this->form_validation->set_rules('document', 'Document name', 'trim|required');
        }

        public function View_Purchase(){
       
            $rfq=$this->input->post('rfq');
             $supplier= $this->Supplier_model->get_by_id($this->company_id);
            $get_purchase=$this->Supplier_model->getSupplier_sheet($this->company_id,$rfq);
         //   var_dump($get_purchase);
            $data=array(
               'purchase'=>$get_purchase,
               'title'=>'Approved Quotes',
                'supplier_data'=>$supplier,
                );
             $this->template->load('template', 'purchase/Approvedlist', $data);

        }


       
}
           