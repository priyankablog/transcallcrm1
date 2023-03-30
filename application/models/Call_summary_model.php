<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Call_summary_model extends App_Model
{
    public function get_call_summary($id = false,$where = [])
    {
        if (is_numeric($id)) {
            $this->db->where('id', $id);

            return $this->db->get(db_prefix() . 'accs')->row();
        }

        if ((is_array($where) && count($where) > 0) || (is_string($where) && $where != '')) {
            $this->db->where($where);
        }

        $this->db->select('tblaccs.*,tblclients.userid as clientid,tblclients.company');
        $this->db->join('tblclients', 'tblclients.unique_id = tblaccs.customerid', 'left');
        $this->db->order_by('accs.id', 'desc');
        return $this->db->get(db_prefix() . 'accs')->result_array();
    }
}
