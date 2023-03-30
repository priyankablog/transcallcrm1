<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dc_master extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dc_master_model');
        $this->load->model('dc_category_master_model');
    }

    public function index()
    {
        $data['dc_data'] = $this->dc_master_model->get_dc();
        $data['dc_cat'] = $this->dc_category_master_model->get_dc_categories();
        $data['title']         = "DC Master";
        $this->load->view('admin/dc_master/manage', $data);
    }

    public function get_dc_from_cat(){
        $dcwhere = [
            'catid' => $this->input->post("id"),
        ];
        $data['dc_data'] = $this->dc_master_model->get_dc('',$dcwhere);
        if(!empty($data['dc_data'])){
            foreach ($data['dc_data'] as $key) {
                ?>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" disabled="" name="name" value="<?= $key['name']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" disabled="" name="name" value="<?= $key['description'] ?>">
                        </div>
                    </div>
                <?php
            }
        }
        else{
            echo "No Fields Found";
        }
    }

    /* Create/edit dc */
    public function dc()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            if (!$this->input->post('id')) {
                $id = $this->dc_master_model->add_dc($data);

                if ($id) {
                    set_alert('success', "Data collection added successfully.");
                } else {
                    set_alert('warning', "Data collection is already exists.");
                    // echo json_encode(['success' => $id ? true : fales, 'id' => $id]);
                }
            } else {
                $id = $data['id'];
                unset($data['id']);
                $success = $this->dc_master_model->update_dc($data, $id);
                if ($success) {
                    set_alert('success', "Data collection updated successfully.");
                }
            }
        }
    }

    public function delete_dc($id)
    {
        if (!$id) {
            redirect(admin_url('dc_master'));
        }

        $response = $this->dc_master_model->delete_dc($id);
        if ($response == true) {
            set_alert('success', "Data collection deleted successfully.");
        } else {
            set_alert('warning', "There is something wrong please try again later.");
        }
        redirect(admin_url('dc_master'));
    }
}
