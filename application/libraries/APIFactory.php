<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: constantin
 * Date: 1/28/2014
 * Time: 10:06 AM
 */
class APIFactory
{

    public static function build($type)
    {
        // assumes the use of an autoloader
        $api = $type . "Search";
        if (class_exists($api)) {
            return new $api();
        } else {
            throw new Exception("Invalid api type given.");
        }
    }

} 