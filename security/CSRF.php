<?php

class CSRF
{
    public static function getId(){
		global $_SESSION;
        if(isset($_SESSION) and isset($_SESSION['csrf'])){
            return $_SESSION['csrf'];
        }else{
            return self::generateId();
        }
    }
    private static function generateId(){
        if (function_exists('mcrypt_create_iv')) {
            return bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        } else {
            return bin2hex(openssl_random_pseudo_bytes(32));
        }
    }
    public static function setNewId(){
		global $_SESSION;
		if(!isset($_SESSION['csrf'])){
			$id = self::generateId();
			$_SESSION['csrf'] = $id;
		}
        return $_SESSION['csrf'];
    }
    public static function isValidToken($token){
		//return true;
		global $_SESSION;
		if(!isset($_SESSION['id'])){return true;}
        if (!empty($token)) {
            if (isset($_SESSION['csrf']) and hash_equals($_SESSION['csrf'], $token)) {
                //$_SESSION['csrf'] = self::generateId();
                return true;
            } else {
				//print $_SESSION['csrf'].'<>'.$token;
                return false;
            }
        }
        return false;
    }
}