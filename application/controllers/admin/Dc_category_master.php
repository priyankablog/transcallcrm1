<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dc_category_master extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dc_category_master_model');
    }

    public function index()
    {
        $data['dc_categories'] = $this->dc_category_master_model->get_dc_categories();
        $data['title']         = "DC Categories Master";
        $this->load->view('admin/dc_category_master/manage', $data);
    }

    /* Create/edit Wrap */
    public function dc_category()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            if (!$this->input->post('id')) {
                $id = $this->dc_category_master_model->add_dc_category($data);

                if ($id) {
                    set_alert('success', "Category added successfully.");
                } else {
                    echo json_encode(['success' => $id ? true : fales, 'id' => $id]);
                }
            } else {
                $id = $data['id'];
                unset($data['id']);
                $success = $this->dc_category_master_model->update_dc_category($data, $id);
                if ($success) {
                    set_alert('success', "Category updated successfully.");
                }
            }
        }
    }

    public function delete_dc_category($id)
    {
        if (!$id) {
            redirect(admin_url('dc_category_master'));
        }

        $response = $this->dc_category_master_model->delete_dc_category($id);
        if ($response == true) {
            set_alert('success', "Category deleted successfully.");
        } else {
            set_alert('warning', "There is something wrong please try again later.");
        }
        redirect(admin_url('dc_category_master'));
    }
}
