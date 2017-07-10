<?php

class Routing
{
    //Contains routing conditions(regexps) and Controller names
    private static $conditions = array();

    //adds new routing condition
    public static function add($pattern,$controller){
        if(!is_string($controller) or empty($controller)){
            throw new Exception('Routing: Invalid controller name value');
        }
        if(!is_string($pattern) or (preg_match($pattern, null) === false)){
            throw new Exception('Routing: Invalid regex pattern value');
        }
        self::$conditions[] = array('pattern'=>$pattern,'controller'=>$controller);
    }

    //removes routing condition
    public static function remove($pattern){
        for($i=0;$i<count(self::$conditions);$i++){
            if(self::$conditions[$i]['pattern']===$pattern){
                unset(self::$conditions[$i]);
            }
        }
    }
    public static function fromArray($data){
        if(is_array($data)){
           for($i=0;$i<count($data);$i++){
               if(isset($data[$i]['path']) and !empty($data[$i]['path']) and isset($data[$i]['controller']) and !empty($data[$i]['controller'])) {
                   self::add($data[$i]['path'], $data[$i]['controller']);
               }
           }
        }
    }
    //get Controller object for $query route
    public static function getController($query){
        for($i=0;$i<count(self::$conditions);$i++){
           if(preg_match(self::$conditions[$i]['pattern'],$query,$matches)===1){
                $params = array();
                if(count($matches)>1){
                    for($j=1;$j<count($matches);$j++){
                        $params[] = $matches[$j];
                    }
                }
                $controller =  new self::$conditions[$i]['controller'];
                $controller->setParams($params);
                return $controller;
            }
        }
        return new Controller();
    }


}