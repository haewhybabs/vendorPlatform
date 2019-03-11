<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public $table = 'vendor_login';
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
    
    
    // login function
    function login($email, $password) {
       //  $this->db->where(['email'=>$email,'password'=>$password]);
       // return $this->db->get('e_vendor')->row();
       
        
      $this->db->select('vendor_login.supplier_id, e_vendor.email, vendor_login.password, e_vendor.status_verification, e_vendor.company_name');
        $this->db->join('e_vendor', 'e_vendor.supplier_id = vendor_login.supplier_id');
        $this->db->where('e_vendor.email', $email);
        $this->db->limit(1);

        $query = $this->db->get($this->table);
        if($query){
            if ($query->num_rows() == 1) {
                $vData = $query->row();
                if(password_verify($password, $vData->password)){
                    return $vData;
                }
                else{
                    return false;
                }
            }else {
                return false;
            }
        }
        else {
            return false;
        }
        
    }
    
    function checkMail($email){
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();
        
        if($query){
            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    
    function reset_user($email, $data){
        $this->db->where('email', $email);
        $query = $this->db->update($this->table, $data);
        return $query;
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
    public function get_comp_id($reg_no,$email){
      
      return  $this->db->where('registration_no',$reg_no)
        ->where('email',$email)
        ->limit('1')
        ->order_by('supplier_id','DESC')
        ->get('e_vendor')->result();
    }
    public function insert_into_vcategory($data){
        return $this->db->insert('vendor_category',$data);
    }
    
}