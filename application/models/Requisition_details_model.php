<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Requisition_details_model extends CI_Model
{

    public $table = 'requisition_details';
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
    
    // get data `for Quotes
    function get_by_company_id($id)
    {
       $this->db->select('rfq_vendors.*, company_category.category, departments.dept_name, rfq_summary.*,requisition_summary.*,');
        $this->db->join('rfq_summary', 'rfq_summary.req_ID = requisition_summary.req_ID');
          $this->db->join('rfq_vendors', 'rfq_vendors.rfq_ID = rfq_summary.rfq_ID');
        $this->db->join('departments', 'departments.id = requisition_summary.department_ID');  
        $this->db->join('company_category', 'company_category.id = requisition_summary.category_ID');
        $this->db->where('rfq_vendors.vendor_ID',$id);
        return $this->db->get('requisition_summary')->result();
    }
    
     // get data `for Proposal
    function get_by_company_id2($id)
    {
       $this->db->select('vendor_rfq.*, company_category.category, departments.dept_name,');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');  
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
         $this->db->join('vendor_rfq', 'vendor_rfq.requisition_id = requisition_details.id');
        $this->db->where('vendor_rfq.vendor_id', $id);
        return $this->db->get($this->table)->result();
    }
     // get data by id
    function get_by_id($id)
    {
       $this->db->select('requisition_details.*, company_category.category, departments.dept_name');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
        $this->db->where('requisition_details.id', $id);
        return $this->db->get($this->table)->row();
    }
    
     function get_by_id2($id)
    {
       $this->db->select('requisition_details.*, company_category.category, departments.dept_name');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
        $this->db->where('requisition_details.id', $id);
        return $this->db->get($this->table)->row();
    }
    
       function get_all_quote()
    {
        $this->db->select('requisition_details.*, company_category.category, departments.dept_name, admin_login.firstname, admin_login.lastname');
         $this->db->join('admin_login', 'admin_login.id = requisition_details.user_id');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
        $this->db->where('requisition_details.req_status', 3);
         $this->db->where('requisition_details.rfx_status', 0);
         $this->db->where('requisition_details.status', 1);
         $this->db->where('requisition_details.rfx_status', 0);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
       function get_all_send_quote()
    {
        $this->db->select('requisition_details.*, company_category.category, departments.dept_name, admin_login.firstname, admin_login.lastname');
         $this->db->join('admin_login', 'admin_login.id = requisition_details.user_id');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
        $this->db->where('requisition_details.req_status', 3);
         $this->db->where('requisition_details.rfx_status', 1);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    
        function get_all_proposal()
    {
        $this->db->select('requisition_details.*, company_category.category, departments.dept_name, admin_login.firstname, admin_login.lastname');
         $this->db->join('admin_login', 'admin_login.id = requisition_details.user_id');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
        $this->db->where('requisition_details.req_status', 3);
         $this->db->where('requisition_details.rfx_status', 0);
         $this->db->where('requisition_details.status', 1);
         $this->db->where('requisition_details.rfx_status', 0);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
       function get_all_send_proposal()
    {
        $this->db->select('requisition_details.*, company_category.category, departments.dept_name, admin_login.firstname, admin_login.lastname');
         $this->db->join('admin_login', 'admin_login.id = requisition_details.user_id');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
        $this->db->where('requisition_details.req_status', 3);
         $this->db->where('requisition_details.rfx_status', 1);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
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