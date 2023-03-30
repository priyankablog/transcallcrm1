<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Custom_dc_master extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom_dc_master_model');
        $this->load->model('dc_master_model');
        $this->load->model('clients_model');
    }

    /* Create/edit custom dc */
    public function custom_dc()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            for ($i=0; $i < count($data["name"]); $i++) { 
                $customdata[] = ['client_id'=>$data['client_id'],'name'=>$data['name'][$i],'description'=>$data['description'][$i],"addedby"=>get_staff_user_id(),'datecreated'=>date('Y-m-d H:i:s')];
            }

            $id = $this->custom_dc_master_model->add_custom_dc($customdata);

            if ($id) {
                set_alert('success', "Data collection added successfully.");
            }
            redirect(admin_url('clients/client/' . $data['client_id'] . '?group=profile'));
        }
    }

    public function edit_custom_dc(){
        $data = $this->input->post();
        $id = $data['custom_dc_id'];
        unset($data['custom_dc_id']);
        $success = $this->custom_dc_master_model->update_custom_dc($data, $id);
        if ($success) {
            set_alert('success', "Data collection updated successfully.");
        }
        else{
            set_alert('warning', "There is something wrong please try again later.");
        }
        redirect(admin_url('clients/client/' . $data['client_id'] . '?group=profile'));
    }

    public function delete_custom_dc($id,$client_id)
    {
        if (!$id) {
            redirect(admin_url('dc_master'));
        }

        $response = $this->custom_dc_master_model->delete_custom_dc($id);
        if ($response == true) {
            set_alert('success', "Data collection deleted successfully.");
        } else {
            set_alert('warning', "There is something wrong please try again later.");
        }
        redirect(admin_url('clients/client/' . $client_id . '?group=profile'));
    }
}
