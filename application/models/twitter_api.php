<?php

/**
 * Created by PhpStorm.
 * User: constantin
 * Date: 1/29/2014
 * Time: 12:13 PM
 */
class twitter_api extends CI_Model
{
    protected  $twitter_url;
    function __construct()
    {
        parent::__construct();
        $this->load->library('twitter');
        $this->twitter_url = 'http://api.twitter.com/1/followers/ids.xml?cursor';

    }


    function getFollowers($influencer_id)
    {
        $data['result'] = true;
        $data['payload'] = '';
        try {
            $params = array('screen_name' => $influencer_id);
            $result = $this->twitter->get('followers/ids', $params);

            if (empty($result)) {
                $data['payload'] = 'No results found';
                return $data;
            }
            $data['payload'] = $result['ids'];
            $data['next_cursor'] = $result['next_cursor'];
            $data['next_cursor_str'] = $result['next_cursor_str'];
            $data['previous_cursor'] = $result['previous_cursor'];
            $data['previous_cursor_str'] = $result['previous_cursor_str'];
            $data['twitter_url'] = $this->twitter_url;
            $data['influencer_id'] = $influencer_id;
            return $data;
        } catch (Exception $e) {

            $data['result'] = false;
            $data['payload'] = $e->getMessage();
            return $data;

        }

    }
} 