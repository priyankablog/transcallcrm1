<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Accs extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $success = false;
        $post_data = count($this->input->post()) > 0 ? $this->input->post() :json_decode(file_get_contents('php://input'),true);

        if (@$post_data['key'])
        {
            $regular_fields['guid'] = @$post_data['guid'];
            $regular_fields['sequenceid'] = @$post_data['sequenceid'];
            $regular_fields['originatedstamp'] = @$post_data['originatedstamp'];
            $regular_fields['agentid'] = @$post_data['agentid'];
            $regular_fields['agentgivenname'] = @$post_data['agentgivenname'];
            $regular_fields['providercontactid'] = @$post_data['providercontactid'];
            $regular_fields['skillsetid'] = @$post_data['skillsetid'];
            $regular_fields['skillsetname'] = @$post_data['skillsetname'];
            $regular_fields['contacttype'] = @$post_data['contacttype'];
            $regular_fields['contacttypename'] = @$post_data['contacttypename'];
            $regular_fields['holdtime'] = @$post_data['holdtime'];
            $regular_fields['numberoftimesonhold'] = @$post_data['numberoftimesonhold'];
            $regular_fields['originator'] = @$post_data['originator'];
            $regular_fields['consulttime'] = @$post_data['consulttime'];
            $regular_fields['handlingtime'] = @$post_data['handlingtime'];
            $regular_fields['address'] = @$post_data['address'];
            $regular_fields['applicationid'] = @$post_data['applicationid'];
            $regular_fields['applicationname'] = @$post_data['applicationname'];
            $regular_fields['finaldisposition'] = @$post_data['finaldisposition'];
            $regular_fields['disconnectsource'] = @$post_data['disconnectsource'];

            $isAvl=$this->db->select("*")->where("providercontactid",@$post_data['providercontactid'])->get(db_prefix() . 'accs')->row();

            if(isset($isAvl)){

                $this->db->where('id', $isAvl->id);
                $this->db->update(db_prefix() . 'accs', $regular_fields);
                $cs_request_id = $isAvl->id;

            }else{
                $regular_fields['customerid'] = @$post_data['customerid'];
                $this->db->insert(db_prefix() . 'accs', $regular_fields);
                $cs_request_id = $this->db->insert_id();
            }

            if($regular_fields['agentid'] != ""){
                $this->db->where('unique_id', $regular_fields['agentid']);

                $total_rows = $this->db->count_all_results(db_prefix() . 'staff');

                if ($total_rows == 0) {
                    $data['unique_id'] = $regular_fields['agentid'];
                    $data['firstname'] = $regular_fields['agentgivenname'];
                    $data['password']    = app_hash_password($regular_fields['agentid']);
                    $data['datecreated'] = date('Y-m-d H:i:s');
                    $data['role'] = 1;
                    $this->db->insert(db_prefix() . 'staff', $data);
                }
            }

            if ($cs_request_id) {

                $success = true;
                $response = ['success' => $success];
                $this->response($response, REST_Controller::HTTP_OK);
                return true;
            }
        }
        $response = ['success' => $success];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }
}