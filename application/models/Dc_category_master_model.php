<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dc_category_master_model extends App_Model
{
    public function get_dc_categories($id = false)
    {
        if (is_numeric($id)) {
            $this->db->where('id', $id);

            return $this->db->get(db_prefix() . 'dc_categories')->row();
        }

        $this->db->order_by('name', 'asc');

        return $this->db->get(db_prefix() . 'dc_categories')->result_array();
    }

    public function add_dc_category($data)
    {
        $data['datecreated'] = date('Y-m-d H:i:s');
        $data['addedby'] = get_staff_user_id();
        $this->db->insert(db_prefix() . 'dc_categories', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            log_activity('DC category Inserted [id: ' . $insert_id . ', name: ' . $data['name'] . ']');
        }

        return $insert_id;
    }

    public function update_dc_category($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update(db_prefix() . 'dc_categories', $data);
        if ($this->db->affected_rows() > 0) {
            log_activity('DC category Updated [id: ' . $id . ', name: ' . $data['name'] . ']');
            return true;
        }

        return false;
    }

    public function delete_dc_category($id)
    {
        $this->db->where('id', $id);
        $this->db->delete(db_prefix() . 'dc_categories');
        if ($this->db->affected_rows() > 0) {
            log_activity('DC category Deleted [id: ' . $id . ']');
            return true;
        }
        return false;
    }
}
