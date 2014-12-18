<?php
/**
 * Created by PhpStorm.
 * User: Rudak
 * Date: 18/12/2014
 * Time: 02:18
 */

namespace Rudak\TwitterOauthBundle\TwitterOauth;


class OAuthConsumer
{
    public $key;
    public $secret;

    function __construct($key, $secret, $callback_url = NULL)
    {
        $this->key          = $key;
        $this->secret       = $secret;
        $this->callback_url = $callback_url;
    }

    function __toString()
    {
        return "OAuthConsumer[key=$this->key,secret=$this->secret]";
    }
}