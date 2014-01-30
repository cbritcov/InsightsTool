<?php

/**
 * Created by PhpStorm.
 * User: constantin
 * Date: 1/29/2014
 * Time: 12:13 PM
 */
class twitter_api extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('twitter');

    }


    function getFollowers($influencer_id)
    {
        $data['result'] = true;
        $data['payload'] = '';
        try {
            $params = array('screen_name' => $influencer_id);
            $data['payload'] = $this->twitter->get('followers/ids', $params);
            if (empty($data['payload'])) {
                $data['payload'] = 'No results found';
            }
            return $data;
        } catch (Exception $e) {
            $data['result'] = false;
            $data['payload'] = $e->getMessage();

        }

    }
} 