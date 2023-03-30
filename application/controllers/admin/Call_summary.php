<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Call_summary extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('call_summary_model');
    }

    public function index()
    {
        $data['cdata'] = $this->call_summary_model->get_call_summary();
        $data['title']         = "Call Summary";
        $this->load->view('admin/call_summary/manage', $data);
    }
}
