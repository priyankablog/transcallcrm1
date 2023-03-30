<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wrap_codes_model extends App_Model
{
    public function get_wrap_code($id = false)
    {
        if (is_numeric($id)) {
            $this->db->where('id', $id);

            return $this->db->get(db_prefix() . 'wrap_codes')->row();
        }

        $this->db->order_by('name', 'asc');

        return $this->db->get(db_prefix() . 'wrap_codes')->result_array();
    }

    public function add_wrap_code($data)
    {
        $data['datecreated'] = date('Y-m-d H:i:s');
        $data['addedby'] = get_staff_user_id();
        $this->db->insert(db_prefix() . 'wrap_codes', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            log_activity('Wrap Code Inserted [id: ' . $insert_id . ', name: ' . $data['name'] . ']');
        }

        return $insert_id;
    }

    public function update_wrap_code($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update(db_prefix() . 'wrap_codes', $data);
        if ($this->db->affected_rows() > 0) {
            log_activity('Wrap Code Updated [id: ' . $id . ', name: ' . $data['name'] . ']');
            return true;
        }

        return false;
    }

    public function delete_wrap_code($id)
    {
        $this->db->where('id', $id);
        $this->db->delete(db_prefix() . 'wrap_codes');
        if ($this->db->affected_rows() > 0) {
            log_activity('Wrap code Deleted [id: ' . $id . ']');
            return true;
        }
        return false;
    }
}
