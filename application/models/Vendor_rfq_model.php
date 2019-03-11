<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_rfq_model extends CI_Model
{

    public $table = 'vendor_rfq';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

  
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
     // get data by id
    function get_by_id($id)
    {
       $this->db->select('vendor_rfq.*');
       $this->db->where('vendor_rfq.id', $id);
        return $this->db->get($this->table)->row();
    }
    function get_vendor_id($id)
    {
        $this->db->select('*');
        $this->db->where('e_vendor.supplier_id', $id);
        return $this->db->get('e_vendor')->result();
    }
    function get_by_id_join($id,$vid)
    {
        $this->db->select('*');
        $this->db->where('rfq_id', $id);
        $this->db->where('vendor_rfq.vendor_id', $vid );
       // $this->db->where('selected_vendors.vendor_id', $vid );

        $this->db->join('dept_requisition', 'dept_requisition.id = selected_vendors.req_id');
        $this->db->join('vendor_rfq', 'vendor_rfq.id = selected_vendors.rfq_id');

        return $this->db->get('selected_vendors')->result();
    }
    
    // get data by id
   /* function get_by_com_id($id, $com)
    {
        $this->db->select('rfq_vendors.*,rfq_summary.*,requisition_summary.*,requisition_new_details.*,rfq_detail.*,company_category.category,products.name');
        $this->db->join('rfq_summary', 'rfq_summary.req_ID = requisition_summary.req_ID');
        $this->db->join('rfq_vendors', 'rfq_vendors.rfq_ID = rfq_summary.rfq_ID');
        $this->db->join('rfq_detail', 'rfq_summary.rfq_ID= rfq_detail.rfq_ID');
        $this->db->join('requisition_new_details', 'requisition_new_details.req_ID= requisition_summary.req_ID');
        $this->db->join('products', 'requisition_new_details.product_ID =products.product_id');  
        $this->db->join('company_category', 'company_category.id = requisition_summary.category_ID');
        $this->db->where('rfq_vendors.rfq_ID',$id);
        return $this->db->get('requisition_summary')->result();



*/
    
  public function get_by_com_id($id, $com){
     $this->db->select('requisition_summary.*, company_category.category, requisition_new_details.*, departments.dept_name,products.*,rfq_summary.*,rfq_vendors.*');
     $this->db->join('requisition_new_details', 'requisition_new_details.req_ID = requisition_summary.req_ID');
     $this->db->join('rfq_summary', 'rfq_summary.req_ID = requisition_summary.req_ID');
     $this->db->join('rfq_vendors', 'rfq_vendors.rfq_ID = rfq_summary.rfq_ID');
    $this->db->join('departments', 'departments.id = requisition_summary.department_ID');
    $this->db->join('company_category', 'company_category.id = requisition_summary.category_ID');
    $this->db->join('products', 'requisition_new_details.product_ID = products.product_ID');
    $this->db->where('rfq_summary.rfq_ID', $id);
    $this->db->where('rfq_vendors.vendor_ID',$com);
    $this->db->where('store_status','0');
    $this->db->order_by('requisition_summary.req_ID','DESC');
     $query=$this->db->get('requisition_summary');
      if ($query->num_rows()>0){
 
         return $query->result();

         }
      else{
        return false;
      }


  }
  public function get_submit_quote($id){
   
        $this->db->select('rfq_vendors.*,quote_summary.*,rfq_summary.*');
        $this->db->join('quote_summary', 'rfq_summary.rfq_ID = quote_summary.rfq_ID');
        $this->db->join('rfq_vendors', 'rfq_vendors.rfq_ID = rfq_summary.rfq_ID');
      //  $this->db->join('quote_summary','rfq_vendors.rfq_ID=quote_summary.rfq_ID');

        $this->db->where('quote_summary.vendor_ID',$id);
        $this->db->where('rfq_vendors.quote_sent','1');
        $this->db->order_by('quote_summary.quote_ID','DESC');
        return $this->db->get('rfq_summary')->result();


  }
       // $this->db->select('rfq_vendors.*,quote_summary.*, rfq_summary.*,requisition_summary.*,');
       //  $this->db->join('rfq_summary', 'rfq_summary.req_ID = requisition_summary.req_ID');
       // $this->db->join('rfq_vendors', 'rfq_vendors.rfq_ID = rfq_summary.rfq_ID');
           // $this->db->join('rfq_summary','rfq_summary.rfq_ID=quote_summary.rfq_ID');
       //
       //  $this->db->where('rfq_vendors.vendor_ID',$id);
            //$this->db->where('rfq_vendors.vendor_ID',$id);
      //  return $this->db->get('requisition_summary')->result();
  
     // get vendors
    function get_vendor($id)
    {
       $this->db->select('e_supplier.*, vendor_rfq.post_date, vendor_rfq.end_date');
        $this->db->join('e_supplier', 'vendor_rfq.vendor_id = e_supplier.supplier_id');
        $this->db->where('vendor_rfq.requisition_id', $id);
        return $this->db->get($this->table)->result();
    }
  
       // get data by i
    
    function insert($data)
    {
      $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function insert_invoice($data)
    {
        $this->db->insert('rfq_invoice', $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
    
      // update data
    function update_quote($id, $ven, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->where('vendor_rfq.vendor_id', $ven);
        $this->db->update($this->table, $data);
    }
   

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function delete_supplier($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}