<?php



defined('BASEPATH') or exit('No direct script access allowed');



class Preview_popup extends AdminController
{
    public function index()
    {
        if (!has_permission('customers', '', 'view')) {
            if (!have_assigned_customers() && !has_permission('customers', '', 'create')) {
                access_denied('customers');
            }
        }
        $id=$this->input->get('cust_id');
        if($id!='')
        {
            $this->load->model('dc_master_model');
            $this->db->select("*");
            $this->db->where("userid",$id);
            $data["clientdata"] = $this->db->get(db_prefix() . 'clients')->row();
            $data['customer_id']=$id;
            if(!empty($data['clientdata'])){
                $this->db->select("*");
                $data["langs"] = $this->db->get(db_prefix() . 'items')->result_array();
    
                $this->db->select("*");
                $data["wrap_codes"] = $this->db->get(db_prefix() . 'wrap_codes')->result_array();

                $custom_dc_where = [
                    'client_id' => $id,
                ];
                $data['custom_dc_data'] = $this->dc_master_model->get_custom_dc($custom_dc_where);
                $this->load->view('admin/callpopups/preview_popup',$data);
            }
            else{
                $data['message'] = "Client does not exist.";
                $this->load->view('admin/callpopups/preview_msg',$data);
                return false;
            }           
        }
    }
}