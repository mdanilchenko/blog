<?php

/**
 * Class Comment
 * Stores all information about post comment
 */
class Comment
{
    private $id;
    private $name;
    private $mail;
    private $url;
    private $text;
    private $postId;
    private $date;
    private $time;
    private $ip;

    /**
     * Comment constructor.
     * @param $id:Int - comment id
     * @param $name:String - author name
     * @param $mail:String - author mail
     * @param $url:String - authors url
     * @param $text:String - Comment text
     * @param $postId:Int - Post ID
     * @param $date:Date - comment creation date
     * @param $time:Int - comment creation time
     * @param $ip:String - author IP
     */
    public function __construct($id, $name, $mail, $url, $text, $postId, $date, $time, $ip)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
        $this->url = $url;
        $this->text = $text;
        $this->postId = $postId;
        $this->date = $date;
        $this->time = $time;
        $this->ip = $ip;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }



}