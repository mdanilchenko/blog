<?php

/**
 * Class User
 * Stores all information about user
 */
class User
{
    private $id;
    private $login;
    private $pass;
    private $fullName;
    private $street;
    private $postcode;
    private $place;
    private $mail;

    /**
     * User constructor.
     * @param $id:Int - user id
     * @param $login:String - user login name
     * @param $pass:String - user md5-hash from password
     * @param $fullName:String - Full user name
     * @param $street:String - Street name
     * @param $postcode:String - Postal code
     * @param $place:String -  place info
     * @param $mail:String - mail for comment feedbacks
     */
    public function __construct($id, $login, $pass, $fullName, $street, $postcode, $place, $mail)
    {
        $this->id = $id;
        $this->login = $login;
        $this->pass = $pass;
        $this->fullName = $fullName;
        $this->street = $street;
        $this->postcode = $postcode;
        $this->place = $place;
        $this->mail = $mail;
    }
    public static function fromDB($row){
        return new User($row['id'],$row['login'],$row['pass'],$row['full_name'],$row['street'],$row['postcode'],$row['place'],$row['mail']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function setPlace($place)
    {
        $this->place = $place;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

}