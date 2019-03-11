<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quote_price_model extends CI_Model
{

    public $table = 'quotation_price';
    public $id = 'id';
    public $order = 'DESC';

    public function save_quote_summary(){
    	
        $unit_price=$this->input->post('unit_price');
        $quantity=$this->input->post('quantity');
        $rfq=$this->input->post('rfq_ID');
        $vendor=$this->input->post('vendor_ID');
        $count=count($unit_price);
        for ($i=0; $i<$count; $i++){
            $total[]=$unit_price[$i]*$quantity[$i];
        }
        $grand_total=array_sum($total);
     
        	$data=array(
        		'quote_total_amount'=>$grand_total,
        		'rfq_ID' => $rfq,
        		'vendor_ID'=>$vendor

        	);
        	return $this->db->insert('quote_summary', $data);
        
        
    }
    
    public function getQuote_ID($rfq,$ved){
        $this->db->select('quote_ID');
        $this->db->where('rfq_ID',$rfq);
        $this->db->where('vendor_ID',$ved);
        $this->db->from('quote_summary');
        $this->db->order_by('quote_ID','DESC');
        $this->db->limit('1');
        $query=$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }

    }
    public function getPrice($id,$com){
     $this->db->select('quote_detail.*');
     $this->db->join('quote_detail', 'quote_detail.quote_ID = quote_summary.quote_ID');
     $this->db->join('rfq_summary','quote_summary.rfq_ID=rfq_summary.rfq_ID');
    

     $this->db->where('quote_summary.rfq_ID',$id);
     $this->db->where('quote_summary.vendor_ID',$com);
      $this->db->order_by('quote_detail_ID','DESC');
      $query=$this->db->get('quote_summary');
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }

    	
    }
    public function save_quote_detail($id){
        $quote_id=$id;
        $product_ID=$this->input->post('Product_ID');
        $req_detail=$this->input->post('req_detail_ID');
        $specs=$this->input->post('product_specification');
        $unit_price=$this->input->post('unit_price');
        $quantity=$this->input->post('quantity');
        $name=$this->input->post('product_name');
        $rfq_ID=$this->input->post('rfq_ID');
        $product_id=$this->input->post('product_ID');
        $count=count($this->input->post('unit_price'));
        $data=array();
        for($i=0; $i<$count; $i++){
            $data[$i]=array(
                'product_specification'=>$specs[$i],
                'unit_price'=>$unit_price[$i],
                'req_detail_ID'=>$req_detail[$i],
                'quantity'=>$quantity[$i],
                'quote_ID'=>$quote_id,
                'product_name'=>$name[$i],
                'rfq_ID'=>$rfq_ID,
                'product_ID'=>$product_id[$i]
            );
        }
        $this->db->insert_batch('quote_detail', $data);
    }
    public function update_vendor_status($rfq,$ved){
        $this->db->set('quote_sent', '1');
        $this->db->where('rfq_ID',$rfq);
        $this->db->where('vendor_ID',$ved);
        $this->db->update('rfq_vendors');
    }

}

?>
