<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Callpopups extends CI_Controller
{

    public function popup(){
    	$data["providercontactid"] = $this->input->get("providercontactid");
		$this->db->select("*");
		$this->db->where("providercontactid",$data['providercontactid']);
		$data["calldata"] = $this->db->get(db_prefix() . 'accs')->row();
		if(!empty($data['calldata'])){
			$this->db->select("*");
			$this->db->where("unique_id",$data['calldata']->customerid);
			$data["clientdata"] = $this->db->get(db_prefix() . 'clients')->row();
		}
		else{
			$data['message'] = "Call record does not exist.";
	        $this->load->view('admin/callpopups/popup_msgs',$data);
			// echo json_encode(["status"=>0,"providercontactid"=>$data['providercontactid'],"messsage"=>"Call record does not exist."]);
			return false;
		}

		$this->db->select("*");
		$data["langs"] = $this->db->get(db_prefix() . 'items')->result_array();

		$this->db->select("*");
		$data["wrap_codes"] = $this->db->get(db_prefix() . 'wrap_codes')->result_array();
        
        $this->load->view('admin/callpopups/popup',$data);
    }

    public function billing(){        
        $this->load->view('admin/callpopups/billing');
    }

    public function popup_submit(){
    	$providercontactid = $this->input->post('providercontactid');
    	$this->db->where('providercontactid', $providercontactid);
        $this->db->update(db_prefix() . 'accs', [
            'wrap_code' => $this->input->post('wrap_code'),
            'language'  => $this->input->post('language'),
        ]);
        $data['providercontactid'] = $providercontactid;
        if ($this->db->affected_rows() > 0) {
        	$data['message'] = "Details updated with the providercontactid.";
        } else {
        	$data['message'] = "There is something wrong please try again later.";
        }
        $this->load->view('admin/callpopups/popup_msgs',$data);
    }

    public function popup1(){
    	$data["customer"] = $this->input->get("customer");
		$data["lang"] = $this->input->get('lang');
		$data["dc"] = $this->input->get('dc');
		$this->db->select("*");
		$this->db->where("unique_id",$data['customer']);
		$data["clientdata"] = $this->db->get(db_prefix() . 'clients')->row();

		$this->db->select("*");
		$data["langs"] = $this->db->get(db_prefix() . 'items')->result_array();

		$this->db->select("*");
		$data["wrap_codes"] = $this->db->get(db_prefix() . 'wrap_codes')->result_array();
        
        $this->load->view('admin/callpopups/popup1',$data);
    }

    public function popup2(){
    	$data["customer"] = $this->input->get("customer");
		// $data["lang"] = $this->input->get('lang');
		$data["dc"] = $this->input->get('dc');
		$this->db->select("*");
		$this->db->where("unique_id",$data['customer']);
		$data["clientdata"] = $this->db->get(db_prefix() . 'clients')->row();

		$this->db->select("*");
		$data["langs"] = $this->db->get(db_prefix() . 'items')->result_array();
        
        $this->db->select("*");
		$data["wrap_codes"] = $this->db->get(db_prefix() . 'wrap_codes')->result_array();
        
        $this->load->view('admin/callpopups/popup2',$data);
    }

    public function popup3(){
    	$data["customer"] = $this->input->get("customer");
		$data["lang"] = $this->input->get('lang');
		$data["dc"] = $this->input->get('dc');
		$this->db->select("*");
		$this->db->where("unique_id",$data['customer']);
		$data["clientdata"] = $this->db->get(db_prefix() . 'clients')->row();

		$this->db->select("*");
		$data["langs"] = $this->db->get(db_prefix() . 'items')->result_array();
        
        $this->db->select("*");
		$data["wrap_codes"] = $this->db->get(db_prefix() . 'wrap_codes')->result_array();
        
        $this->load->view('admin/callpopups/popup3',$data);
    }



    public function Selectanguage(){
        $this->load->view('admin/receive_call/select_language');
    }

    public function IdentifyCustomer(){
        $this->load->view('admin/receive_call/Identify_customer');
    }
}