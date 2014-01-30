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

            $this->load->view('dashboard/index');
        } else {
            //$api = APIFactory::build('Twitter');
            $keyword = $this->input->post('keywords');
            $influencer = $this->input->post('influencer_id');

            $response = $this->twitter_api->getFollowers($influencer);

            if (!$response['result']) {
                $data['error_message'] = $response['payload'];
            } else {
                $data['search_result'] = $response['payload'];
                $pagination_links = $this->generatePaginationLinks($response);
                $data['next_cursor'] = $response['next_cursor'];
                $data['next_cursor_str'] = $response['next_cursor_str'];
                $data['previous_cursor'] = $response['previous_cursor'];
                $data['previous_cursor_str'] = $response['previous_cursor_str'];
                $data['screen_name'] = $response['influencer_id'];
                $data['twitter_url'] = $response['twitter_url'];

            }


            $this->load->view('dashboard/index', $data);
        }

    }

    public function generatePaginationLinks($response){
        $pagination['next_link'] = '';
        $pagination['previous_link'] = '';
        if($response['previous_cursor'] != 0){
          $pagination['previous_link'] = "<a href=".$this->twitter_url."=".$response['previous_cursor_str'].">PREVIOUS</a>";
        }elseif($response['next_cursor'] != 0){
            $pagination['next_link'] = "<a href=".$this->twitter_url."=".$response['next_cursor_str'].">NEXT</a>";
        }

        return $pagination;
    }
} 