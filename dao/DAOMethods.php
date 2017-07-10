<?php

/**
 * Class DAOMethods
 * Methods for DB data manipulations
 */
class DAOMethods
{
    /**
     * Returns user by its ID (or null)
     * @param $id:Int - user id
     * @return User - User object
     */
    public static function getUserById($id)
    {
        $pdo = DB::getInstance()->pdo;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id =:id LIMIT 1;');
        $stmt->execute(array('id' => $id));
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_LAZY);
            return User::fromDB($row);
        }
        return null;
    }
    /**
     * Returns user by its Login (or null)
     * @param $login:String - user login name
     * @return User - User object
     */
    public static function getUserByLogin($login)
    {
        $pdo = DB::getInstance()->pdo;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE login =:login LIMIT 1;');
        $stmt->execute(array('login' => $login));
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_LAZY);
            return User::fromDB($row);
        }
        return null;
    }

    public static function getPosts($offset=0,$count=3,$authorId=0)
    {
        $offset = $offset+0;
        $result = array();
        $pdo = DB::getInstance()->pdo;
        if(is_numeric($authorId) and ($authorId>0)){
            $stmt = $pdo->prepare('SELECT * FROM posts AS p INNER JOIN users AS u ON p.user_id = u.id WHERE p.user_id=:author ORDER BY p.date DESC,p.id DESC LIMIT :offset,:cnt;');
            $stmt->bindParam(':author', $authorId, PDO::PARAM_INT);
        }else{
            $stmt = $pdo->prepare('SELECT * FROM posts AS p INNER JOIN users AS u ON p.user_id = u.id WHERE 1 ORDER BY p.date DESC,p.id DESC LIMIT :offset,:cnt;');
        }
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':cnt', $count, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_LAZY)){
                $result[] = Post::fromPDO($row);
            }
        }
        return $result;
    }
    public static function getPostById($postId)
    {
        $pdo = DB::getInstance()->pdo;
        $stmt = $pdo->prepare('SELECT * FROM posts AS p INNER JOIN users AS u ON p.user_id = u.id WHERE p.id=:pid ORDER BY p.date DESC,p.id DESC LIMIT 1;');
        $stmt->bindParam(':pid', $postId, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_LAZY);
            return Post::fromPDO($row);
        }
        return null;
    }
}