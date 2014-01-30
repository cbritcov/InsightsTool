<?php

/**
 * Created by PhpStorm.
 * User: constantin
 * Date: 1/28/2014
 * Time: 10:36 AM
 */
class DashBoard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('twitter_api');
    }

    public function index()
    {


        $this->form_validation->set_rules('influencer_id', 'Influencer ID', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data['message'] = 'there is an issue';
            $this->load->view('dashboard/index', $data);
        } else {
            //$api = APIFactory::build('Twitter');
            $keyword = $this->input->post('keywords');
            $influencer = $this->input->post('influencer_id');

            $response = $this->twitter_api->getFollowers($influencer);

            if (!$response['result']) {
                $data['error_message'] = $response['payload'];
            } else {
                $data['search_result'] = $response['payload'];
            }

            $this->load->view('dashboard/index', $data);
        }

    }
} 