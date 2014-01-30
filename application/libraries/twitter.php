<?php

require_once __DIR__ . "/TwitterOAuth/TwitterOAuth.php";
require_once __DIR__ . "/TwitterOAuth/Exception/TwitterException.php";

use TwitterOAuth\TwitterOAuth;

class Twitter extends TwitterOAuth
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->config('twitter');
        $config = $this->CI->config->item('twitter');

        $params = array(
            'consumer_key' => $config['consumer_key'],
            'consumer_secret' => $config['consumer_secret'],
            'oauth_token' => $config['oauth_token'],
            'oauth_token_secret' => $config['oauth_token_secret'],
            'output_format' => 'array'
        );
        parent::__construct($params);
    }

}