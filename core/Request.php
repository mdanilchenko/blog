<?php

class Request
{
    private $get;
    private $post;
    private $cookie;
    private $session;
    private $server;

    /**
     * Request constructor.
     * @param $get
     * @param $post
     * @param $cookie
     * @param $session
     * @param $server
     */
    public function __construct($get, $post, $cookie,$server, $session=array() )
    {
        $this->get = Filters::xssClean($get);
        $this->post = Filters::xssClean($post);
        $this->cookie = Filters::xssClean($cookie);
        $this->session = $session;
        $this->server = $server;
    }


    /**
     * @return mixed
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @param mixed $get
     */
    public function setGet($get)
    {
        $this->get = Filters::xssClean($get);
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = Filters::xssClean($post);
    }

    /**
     * @return mixed
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * @param mixed $cookie
     */
    public function setCookie($cookie)
    {
        $this->cookie = Filters::xssClean($cookie);
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param mixed $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }


}