<?php

class DB
{
    private static $DB_HOST = '127.0.0.1';
    private static $DB_USER = 'runaway_t2';
    private static $DB_PASS = 'FHWDUIFEUi33f3fsefrg';
    private static $DB_NAME = 'runaway_test';

    public $pdo = null;
    private static $_instance = null;

    private function __construct()
    {
        $dsn = "mysql:host=".self::$DB_HOST.";dbname=".self::$DB_NAME.";charset=utf8";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            $this->pdo = new PDO($dsn, self::$DB_USER, self::$DB_PASS, $opt);
        } catch (PDOException $e) {
            die('DB Connection Fail: ' . $e->getMessage());
        }
    }

    protected function __clone(){}

    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}