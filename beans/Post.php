<?php
/**
 * Class Post
 * Stores all information about post and author(User $user)
 */
class Post
{
    private $id;
    private $title;
    private $text;
    private $user;
    private $date;
    private $time;
    private $comments;

    /**
     * Post constructor.
     * @param $id:Int - post id
     * @param $title:String - post title
     * @param $text:String - post name
     * @param $user:User - author info
     * @param $date:Date - creation date
     * @param $time:Int - creation time
     * @param $comments:Int - comments count
     */
    public function __construct($id, $title, $text, User $user, $date, $time,$comments = 0)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->user = $user;
        $this->date = $date;
        $this->time = $time;
        $this->comments = $comments;
    }
    public static function fromPDO($row){
        $user = new User($row['user_id'], $row['login'], $row['pass'], $row['full_name'], $row['street'], $row['postcode'], $row['place'], $row['mail']);
        return new Post($row['id'],$row['title'],$row['text'],$user,$row['date'],$row['time'],$row['comments']);
    }

    /**
     * @return int
     */
    public function getComments()
    {
        return $this->comments;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
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

    public function getFormedTitle(){
        $title = '';
        if($this->date==date('Y-m-d')){
            $title.='Heute : ';
        }else{
            $title.=date('d.m.Y',$this->time).' : ';
        }
        $title.=$this->title;
        return '<a href="'.Constants::$BASE_URL.'post/'.$this->id.'">'.$title.'</a>';
    }
    public function getFormedText($needCrop = false){
        if(!$needCrop or (mb_strlen($this->text)<=1000)){
            return nl2br($this->text);
        }else{
            return nl2br(mb_substr($this->text,0,1000,"utf-8")).'...<a href="'.Constants::$BASE_URL.'post/'.$this->id.'">[lesen]</a>';
        }
    }
}