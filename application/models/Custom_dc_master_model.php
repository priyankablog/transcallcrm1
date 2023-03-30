<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Custom_dc_master_model extends App_Model
{
    public function get_custom_dc($where = [])
    {

        if ((is_array($where) && count($where) > 0) || (is_string($where) && $where != '')) {
            $this->db->where($where);
        }
        $this->db->order_by('id', 'desc');

        return $this->db->get(db_prefix() . 'custom_dc_master')->result_array();
    }

    public function add_custom_dc($data)
    {
        $this->db->insert_batch(db_prefix() . 'custom_dc_master', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_custom_dc($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update(db_prefix() . 'custom_dc_master', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }

        return false;
    }

    public function delete_custom_dc($id)
    {
        $this->db->where('id', $id);
        $this->db->delete(db_prefix() . 'custom_dc_master');
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
}
