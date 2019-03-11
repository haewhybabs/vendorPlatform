<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends MY_Controller {

      public $login;
    public $company_id;
    
    function __construct() {
            parent::__construct();
             $this->load->library(['form_validation', 'upload']);
           $this->load->library('template');
            $this->load->model(['Supplier_model', 'Requisition_details_model', 'Vendor_rfq_model', 'Settings_model', 'Department_requisition_model','Quote_price_model']);
            $this->login = $this->session->userdata('vendor_logged_in'); 
            $this->company_id=$this->login['company_id'];
        }
    
     public function index()
        {
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
          $id=$this->company_id;
        $list = $this->Requisition_details_model->get_by_company_id($id);
        $data = array(
             'list' => $list,
            'supplier_data' => $supplier,
            'title' => 'Requested Quotes',
        );
           $this->template->load('template', 'quotes/list', $data);
  
          //var_dump($this->company_id);
        }
    
    public function emails(){
         $list = $this->Requisition_details_model->get_by_company_id($this->company_id);
         print_r($list);
    }
    
    
    public function download($id)
       {
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $message= $this->Vendor_rfq_model->get_by_com_id($id, $this->company_id);
       

       
        $data = array(
        'supplier_data' => $supplier,
        'message'=>$message, 
        'title' => 'Upload Quotes',
        );

        $html= $this->template->load('template', 'templates/quote_upload', $data,TRUE);
        $pdfFilePath = "Request For Quotation.pdf";
        $this->load->library('m_pdf');
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "I");

    }
    public function po_download()
    {
        $id = $this->input->post('qid');
        $vid = $this->input->post('vid');
        $quote = $this->Vendor_rfq_model->get_by_id_join($id,$vid);
        $vendor = $this->Vendor_rfq_model->get_vendor_id($vid);

       // $department_status= $this->Department_model->get_by_id($this->department_id);
      /*  if(count($quote)){
            $reqdetails =  $this->Quotes_model->get_reqdetails($quote->requisition_id);
            $vendor = $this->Supplier_model->get_by_id($quote->vendor_id);
            $selected = $this->Selectv_model->get_all();
            $select = array();
            foreach ($selected as $sel){
                array_push($select,$sel->req_id);
            }


        } */
 
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
            'supplier_data' => $supplier,
            'message'=>$message, 
            'title' => 'Upload Quotes',
        );
          $this->template->load('template', 'templates/quote_upload', $data);
          //var_dump($data['material_list']);   
        }else{
          $this->session->set_flashdata('error', 'This detail does not exist');
             redirect(site_url('quotes'));    
      
        }       
    
    }
    public function Edit($id){
       $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $message= $this->Vendor_rfq_model->get_by_com_id($id, $this->company_id);
       

       if($message){
            $data = array(
            'supplier_data' => $supplier,
            'message'=>$message,
            'title' => 'Upload Quotes',
        );
          $this->template->load('template', 'templates/quote_edit', $data);
          //var_dump($data['material_list']);   
        }else{
          $this->session->set_flashdata('error', 'This detail does not exist');
             redirect(site_url('quotes'));    
      
        }       


    }

    public function View_Sent($id){
         $supplier= $this->Supplier_model->get_by_id($this->company_id);
       $message= $this->Vendor_rfq_model->get_by_com_id($id, $this->company_id);
       $getprice=$this->Quote_price_model->getPrice($id,$this->company_id);
        if($message){
            $data = array(
            'message'=>$message,
             'getprice'=>$getprice,
             'title' => 'Edit Rfq Specification',
              'supplier_data' => $supplier,

        );
            
          $this->template->load('template', 'templates/quote_view', $data);
          //var_dump($data['material_list']);   
        }else{
          $this->session->set_flashdata('error', 'This detail does not exist');
             redirect(site_url('quotes'));    
      
        }       

    }
      public function upload_price(){
           $this->form_validation->set_rules('unit_price[]', 'Price','required');
           
           if ($this->form_validation->run()){


         
      
                $savesummary=$this->Quote_price_model->save_quote_summary();
                $rfq=$this->input->post('rfq_ID');
                $ved=$this->input->post('vendor_ID');
                $getQuote_id=$this->Quote_price_model->getQuote_ID($rfq,$ved);
                foreach ($getQuote_id as $q) {
                }
                $quote_id=$q->quote_ID;
                $save_quote_detail=$this->Quote_price_model->save_quote_detail($quote_id);
                $update_vendor_status=$this->Quote_price_model->update_vendor_status($rfq,$ved);

                //send Mail to Procurement

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
                 
            $get_depart = $this->Department_model->get_budget_email();
            
           

           
            
            
        foreach($get_depart as $dept){
             $recipientArr[]=$dept->email;

        }     
          $data3 = array(
                 'info'=>'A quote is sent by '.$get_department->company_name.'',
                'comment'=>'Urgent attention of Procurement is required to check and create the Recommendation Sheet. Thanks',
             );
             $option = array(
                 'subject'   => 'Quotation Sent',
                  'from'      => 'procure@lfcww.org',
                  'from_name' => 'LFC eProcurement',
                 'data'      => $data3,
             );
            
            
         
             $this->email->from($option['from'], $option['from_name']);
             $this->email->to($recipientArr);
             //$this->email->to('babalolaisaac@gmail.com');
             $this->email->subject($option['subject']);
             $this->email->message($this->load->view('templates/requisition_mail', $option['data'], true));
             $this->email->set_alt_message('View the mail using an html email client');
             $this->email->send(); 



                $this->session->set_flashdata('message', 'Quote is successfully sent');
                redirect(site_url('quotes'));

                


             


           }
           else{
              $this->session->set_flashdata('error', 'Please fill the necessary details');
                redirect(site_url('quotes'));
           }

       


     

        
      }

    public function upload_invoice($id)
    {
        $supplier= $this->Supplier_model->get_by_id($this->company_id);
        $message= $this->Vendor_rfq_model->get_by_com_id($id, $this->company_id);
        if($message){
            $data = array(
                'supplier_data' => $supplier,
                'message'=>$message,
                'title' => 'Upload Invoice',
            );
            $this->template->load('template', 'quotes/form1', $data);
        }else{
            $this->session->set_flashdata('error', 'This detail does not exist');
            redirect(site_url('quotes'));
        }
    }

    public function upload_invoice_action(){
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
                redirect(site_url('quotes'));
            }


    }
    
     public function upload_action(){
        // $this->document_rules();
         $message= $this->Vendor_rfq_model->get_by_com_id($this->input->post('quote_id'), $this->company_id);
         if($message->upload == ''){
             $uploadPath = './uploads/quotes/';
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
                        'upload'=>$new_name,
                        'sent_quotation' => 1, 
                         'submission_date'=>$date,
                    );
                    $this->Vendor_rfq_model->update_quote($this->input->post('quote_id'), $this->company_id, $data);
                    
                    $this->session->set_flashdata('message', 'Document uploaded successfully');
                    redirect(site_url('quotes/submit'));
            }
         }
         else{
             $this->session->set_flashdata('error', 'Quotation already uploaded and submitted');
             redirect(site_url('quotes/upload/'.$this->input->post('quote_id')));   
         }
                
        }
    
        public function submit()
        {
           $message= $this->Vendor_rfq_model->get_submit_quote($this->company_id);
           $supplier= $this->Supplier_model->get_by_id($this->company_id);
  
        $data = array(
             'message' => $message,
             'supplier_data'=>$supplier,
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
            'supplier' => $supplier,
            'title' => 'Requested Quotes',
        );
           $this->template->load('template', 'quotes/status', $data);
        }
 
     public function document_rules(){
        $this->form_validation->set_rules('document', 'Document name', 'trim|required');
        }
       
}
           