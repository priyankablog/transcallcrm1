<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class CallSummery extends REST_Controller {
    
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
            $regular_fields['i_LogID'] = @$post_data['i_LogID'];
            $regular_fields['nv_UUID'] = @$post_data['nv_UUID'];
            $regular_fields['i_IPOID'] = @$post_data['i_IPOID'];
            $regular_fields['dt_Date'] = @$post_data['dt_Date'];
            $regular_fields['t_Duration'] = @$post_data['t_Duration'];
            $regular_fields['i_DurationSec'] = @$post_data['i_DurationSec'];
            $regular_fields['i_RingTime'] = @$post_data['i_RingTime'];
            $regular_fields['nv_Caller'] = @$post_data['nv_Caller'];
            $regular_fields['nv_Direction'] = @$post_data['nv_Direction'];
            $regular_fields['nv_CalledNumber'] = @$post_data['nv_CalledNumber'];
            $regular_fields['nv_DialledNumber'] = @$post_data['nv_DialledNumber'];
            $regular_fields['tin_Internal'] = @$post_data['tin_Internal'];
            $regular_fields['nv_CallID'] = @$post_data['nv_CallID'];
            $regular_fields['tin_Continuation'] = @$post_data['tin_Continuation'];
            $regular_fields['nv_Party1Device'] = @$post_data['nv_Party1Device'];
            $regular_fields['nv_Party1Name'] = @$post_data['nv_Party1Name'];
            $regular_fields['nv_Party2Device'] = @$post_data['nv_Party2Device'];
            $regular_fields['nv_Party2Name'] = @$post_data['nv_Party2Name'];
            $regular_fields['i_HoldTime'] = @$post_data['i_HoldTime'];
            $regular_fields['i_ParkTime'] = @$post_data['i_ParkTime'];
            $regular_fields['tin_AuthValid'] = @$post_data['tin_AuthValid'];
            $regular_fields['nv_AuthCode'] = @$post_data['nv_AuthCode'];
            $regular_fields['nv_ReasonCode'] = @$post_data['nv_ReasonCode'];
            $regular_fields['nv_ExternalTargeter'] = @$post_data['nv_ExternalTargeter'];
            $regular_fields['nv_ExternalTargetedNumber'] = @$post_data['nv_ExternalTargetedNumber'];
            $regular_fields['nv_ServerIPCallerExtension'] = @$post_data['nv_ServerIPCallerExtension'];
            $regular_fields['nv_UniqueIDCallerExtension'] = @$post_data['nv_UniqueIDCallerExtension'];
            $regular_fields['nv_ServerIPCalledExtension'] = @$post_data['nv_ServerIPCalledExtension'];
            $regular_fields['nv_UniqueIDCalledExtension'] = @$post_data['nv_UniqueIDCalledExtension'];
            $regular_fields['dt_UTCTime'] = @$post_data['dt_UTCTime'];
            $regular_fields['nv_AutoAttendant'] = @$post_data['nv_AutoAttendant'];

            $this->db->insert(db_prefix() . 'call_summery', $regular_fields);

            $cs_request_id = $this->db->insert_id();

            if ($cs_request_id) {

                $success = true;
             
                    /*foreach ($staff as $member) {

                        if (add_notification([

                                'description' => 'new_estimate_request_submitted_from_form',

                                'touserid' => $member['staffid'],

                                'fromcompany' => 1,

                                'fromuserid' => 0,

                                'additional_data' => serialize([

                                    $form->name,

                                ]),

                                'link' => 'estimate_request/view/' . $estimate_request_id,

                            ])) {

                            array_push($notifiedUsers, $member['staffid']);

                        }



                        send_mail_template('estimate_request_form_submitted', $estimate_request_id, $member['email']);

                    }
                    pusher_trigger_notification($notifiedUsers); */
                    $response = ['success' => $success];
                    $this->response($response, REST_Controller::HTTP_OK);
                    return true;
            }
        }
        $response = ['success' => $success];
        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
    }
}