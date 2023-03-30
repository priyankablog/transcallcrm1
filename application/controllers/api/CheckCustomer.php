<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class CheckCustomer extends REST_Controller {
    
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
        $post_data = count($this->input->get()) > 0 ? $this->input->get() :json_decode(file_get_contents('php://input'),true);
    
        if (@$post_data['unique_key'])
        {
           
            $isAvl=$this->db->select("*")->where("unique_id",@$post_data['unique_key'])->get(db_prefix() . 'clients')->row();
                       
            if(isset($isAvl)){

                $response = ['success' => $isAvl];
                $this->response($response, REST_Controller::HTTP_OK);
                return true;
            }else{

                $response = ['success' => $success];
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
            }
        
        } else {
            
            $response = ['success' => $success];
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}