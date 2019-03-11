<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documents_model extends CI_Model
{

    public $table = 'support_documents';
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
        $this->db->where($this->id, $id);
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
   

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    public function get_category_ved($id){
       $this->db->select('e_vendor.*, company_category.category, vendor_category.*');
        //$this->db->join('requisition_details', 'requisition_details.id = dept_requisition.req_id');
       // $this->db->join('departments', 'departments.id = requisition_details.department_id');  
        $this->db->join('company_category', 'company_category.id = vendor_category.cat_id');
        $this->db->join('e_vendor','vendor_category.supplier_id=e_vendor.supplier_id');
        $this->db->where('vendor_category.supplier_id', $id);
        return $this->db->get('vendor_category')->result();
    }
    
}