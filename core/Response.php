<?php

class Response
{
    private $data;

    public function __construct($data=array())
    {
        $this->data = $data;
    }
    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
    public function addParam($name,$val){
        $this->data[$name] = $val;
    }
    public function removeParam($name){
        unset($this->data[$name]);
    }
    public function getParam($name){
        if(!empty($name) and isset($this->data[$name])){
            return $this->data[$name];
        }
        return false;
    }


}