<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dc_master_model extends App_Model
{
    public function get_dc($id = false,$where = [])
    {
        if (is_numeric($id)) {
            $this->db->where('id', $id);

            return $this->db->get(db_prefix() . 'dc_master')->row();
        }

        if ((is_array($where) && count($where) > 0) || (is_string($where) && $where != '')) {
            $this->db->where($where);
        }

        $this->db->select('tbldc_master.*,tbldc_categories.name as category_name,tbldc_categories.id as categoryid');
        $this->db->join('tbldc_categories', 'tbldc_categories.id = tbldc_master.catid', 'left');

        $this->db->order_by('id', 'desc');

        return $this->db->get(db_prefix() . 'dc_master')->result_array();
    }

    public function get_custom_dc($where = [])
    {

        if ((is_array($where) && count($where) > 0) || (is_string($where) && $where != '')) {
            $this->db->where($where);
        }
        $this->db->order_by('id', 'desc');

        return $this->db->get(db_prefix() . 'custom_dc_master')->result_array();
    }

    public function add_dc($data)
    {
        $this->db->where('name', $data['name']);
        $this->db->where('catid', $data['catid']);
        $total_rows = $this->db->count_all_results(db_prefix() . 'dc_master');
        if($total_rows > 0){
            return false;
        }

        $data['datecreated'] = date('Y-m-d H:i:s');
        $data['addedby'] = get_staff_user_id();
        $this->db->insert(db_prefix() . 'dc_master', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            log_activity('Data collection Inserted [id: ' . $insert_id . ', name: ' . $data['name'] . ']');
        }

        return $insert_id;
    }

    public function update_dc($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update(db_prefix() . 'dc_master', $data);
        if ($this->db->affected_rows() > 0) {
            log_activity('Data collection Updated [id: ' . $id . ', name: ' . $data['name'] . ']');
            return true;
        }

        return false;
    }

    public function delete_dc($id)
    {
        $this->db->where('id', $id);
        $this->db->delete(db_prefix() . 'dc_master');
        if ($this->db->affected_rows() > 0) {
            log_activity('Data collection Deleted [id: ' . $id . ']');
            return true;
        }
        return false;
    }
}
