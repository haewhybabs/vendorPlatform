<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department_requisition_model extends CI_Model
{

    public $table = 'dept_requisition';
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
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
     // get data by id
    function get_by_id($id)
    {
       $this->db->select('dept_requisition.*, company_category.category, departments.dept_name');
        $this->db->join('requisition_details', 'requisition_details.id = dept_requisition.req_id');
        $this->db->join('departments', 'departments.id = requisition_details.department_id');  
        $this->db->join('company_category', 'company_category.id = requisition_details.category_id');
        $this->db->where('dept_requisition.req_id', $id);
        return $this->db->get($this->table)->row();
    }

    public function get_procure_email()
    {
       
        $this->db->join('user_role', 'admin_login.id = user_role.user_id');
        $this->db->where('user_role.role_ID',22);

        return $this->db->get('admin_login')->result();

    }

    public function get_company_details($id){
        return $this->db->where('supplier_id',$id)
        ->get('e_vendor')->row();
    }
    
    
    
}