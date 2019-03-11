<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

    public $table = 'e_vendor';
    public $id = 'supplier_id';
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
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
      // get data by email
    function get_by_email($id)
    {
        $this->db->where('email', $id);
        return $this->db->get($this->table)->row();
    }
    
  
    function insert($data)
    {
      $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
   
    // update data
    function check_code($id)
    {
        $this->db->where('email_code', $id);
        return $this->db->get($this->table)->row();
    }
   

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
     // get data by id
    function get_interview($id)
    {
        $this->db->where('supplier_id', $id);
        return $this->db->get('vendor_interview')->row();
    }
    public function get_company_purchase($id){
        //  $this->db->select('quote_summary.rfq_ID');
        //  $this->db->join('quote_detail','approval_sheet_detail.req_detail_ID=quote_detail.req_detail_ID');
        //  $this->db->join('approval_sheet_summary','approval_sheet_summary.approval_sheet_ID=approval_sheet_detail.approval_sheet_ID');
        //  $this->db->join('quote_summary','quote_detail.quote_ID=quote_summary.quote_ID');
        //  $this->db->join('e_vendor','quote_summary.vendor_ID=e_vendor.supplier_id');
        //  $this->db->where('approval_sheet_detail.vendor_ID=quote_summary.vendor_ID');
        //  $this->db->where('approval_sheet_summary.approval_sheet_status','2');
        //  $this->db->where('approval_sheet_detail.vendor_ID',$id);
        // //$this->db->distinct();
        //  $this->db->order_by('approval_sheet_detail.req_detail_ID','ASCE');
        //   $query= $this->db->get('approval_sheet_detail')->result();
        //   foreach ($query as $key) {
        //       $un[]=$key->rfq_ID;
             
        //   }
        //  $unique[]=array_unique($un);
        //  return $unique;
        $this->db->select('approval_sheet_detail.rfq_ID');
        $this->db->join('approval_sheet_summary','approval_sheet_summary.approval_sheet_ID=approval_sheet_detail.approval_sheet_ID');
        $this->db->where('approval_sheet_detail.vendor_ID',$id);
        $this->db->where('approval_sheet_summary.approval_sheet_status','7');
        $this->db->distinct();
        return $this->db->get('approval_sheet_detail')->result();
          
    }

    public function getSupplier_sheet($id,$rfq){

        //  $this->db->select('quote_detail.*,e_vendor.company_name,quote_summary.*,approval_sheet_summary.approval_sheet_status');
        //  $this->db->join('quote_detail','approval_sheet_detail.req_detail_ID=quote_detail.req_detail_ID');
        //  $this->db->join('approval_sheet_summary','approval_sheet_summary.approval_sheet_ID=approval_sheet_detail.approval_sheet_ID');
        //  $this->db->join('quote_summary','quote_detail.quote_ID=quote_summary.quote_ID');
        //  $this->db->join('e_vendor','quote_summary.vendor_ID=e_vendor.supplier_id');
        //  $this->db->where('approval_sheet_detail.vendor_ID=quote_summary.vendor_ID');
        //  $this->db->where('approval_sheet_detail.vendor_ID',$id);
        // $this->db->where('approval_sheet_detail.rfq_ID',$rfq);
        //  $this->db->order_by('approval_sheet_detail.req_detail_ID','ASCE');
        //   return $this->db->get('approval_sheet_detail')->result();



     
         $this->db->select('quote_detail.*,e_vendor.company_name,quote_summary.*,approval_sheet_summary.approval_sheet_status,quote_negotiation.*');
         $this->db->join('quote_detail','approval_sheet_detail.req_detail_ID=quote_detail.req_detail_ID');
         $this->db->join('quote_negotiation','quote_detail.rfq_ID=quote_negotiation.rfq_ID');
         $this->db->join('approval_sheet_summary','approval_sheet_summary.approval_sheet_ID=approval_sheet_detail.approval_sheet_ID');
         $this->db->join('quote_summary','quote_detail.quote_ID=quote_summary.quote_ID');
         $this->db->join('e_vendor','quote_summary.vendor_ID=e_vendor.supplier_id');
         $this->db->where('approval_sheet_detail.vendor_ID=quote_summary.vendor_ID');
         $this->db->where('approval_sheet_detail.rfq_ID',$rfq);
         $this->db->where('approval_sheet_detail.vendor_ID',$id);
         $this->db->where('quote_negotiation.req_detail_ID=approval_sheet_detail.req_detail_ID');
         $this->db->where('quote_negotiation.vendor_ID=approval_sheet_detail.vendor_ID');
         $this->db->order_by('approval_sheet_detail.req_detail_ID','ASCE');
         return $this->db->get('approval_sheet_detail')->result();

    }
    public function update_performance($cat_id,$user,$data){
        $this->db->set($data);
        $this->db->where('supplier_id',$user)
        ->where('cat_id',$cat_id)
        ->update('vendor_category');
    }
    public function get_category($id){
        $this->db->select('company_category.*,vendor_category.id as cven_id ');
        $this->db->join('company_category','company_category.id=vendor_category.cat_id');
        return $this->db->where('supplier_id',$id)
        ->get('vendor_category')->result();
    }
    public function get_all_cat(){
        return $this->db->get('company_category')->result();
    }
    public function update_category($data,$id){
        $this->db->set($data)
        ->where('id',$id)
        ->update('vendor_category');


    }
    public function get_rating($id){
        return $this->db->where('supplier_id',$id)
        ->get('vendor_category')
        ->result();

    }

    public function get_specialty($id){
        return $this->db->join('company_category','company_category.id=vendor_category.cat_id')
        ->where('vendor_category.supplier_id',$id)
        ->get('vendor_category')->result();
    }
}