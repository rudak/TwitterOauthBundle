<?php
/**
 * Created by PhpStorm.
 * User: Rudak
 * Date: 22/12/2014
 * Time: 11:37
 */

namespace Rudak\TwitterOauthBundle\Model;


class TwitterHandler
{
    private $file;
    private $Twitter;
    private $consumer_key;
    private $consumer_secret;
    private $access_token;
    private $access_token_secret;

    function __construct($option)
    {
        $this->file                = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'twitteroauth.php');
        $this->consumer_key        = $option['consumer_key'];
        $this->consumer_secret     = $option['consumer_secret'];
        $this->access_token        = $option['access_token'];
        $this->access_token_secret = $option['access_token_secret'];
    }

    public function postStatus($status)
    {
        $this->setTwitter();
        return $this->getTwitter()->post('statuses/update', array(
            'status' => $status
        ));
    }

    private function setTwitter()
    {
        $this->require_file();
        $this->Twitter = new \TwitterOAuth($this->consumer_key, $this->consumer_secret, $this->access_token, $this->access_token_secret);
    }

    /**
     * @return mixed
     */
    public function getTwitter()
    {
        return $this->Twitter;
    }


    private function require_file()
    {
        return require_once($this->file);
    }


}