<?php

class Filters
{
    public static function xssClean($data){
        foreach($data as $key=>$value){
            $data[$key] = htmlspecialchars($value);
        }
        return $data;
    }
}