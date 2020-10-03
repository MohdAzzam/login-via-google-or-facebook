<?php


class DBHelper
{
    private $con;
    private static $instance = null;

    private function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "social_media_db");
        if (!$this->con) {
            die("Can't Connect To Server");
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DBHelper();
        }
        return self::$instance;
    }

    public function getUser($userId)
    {
        $query = "SELECT * FROM `user` WHERE `id` = '$userId'";
        $result = mysqli_query($this->con, $query);
        return mysqli_fetch_assoc($result);
    }


    public function register($firstName, $lastName, $email, $picture)
    {
        mysqli_query($this->con, "INSERT INTO user( `first_name`, `last_name`, `email`, `picture`)
        VALUES ('$firstName','$lastName','$email','$picture')");
        return mysqli_insert_id($this->con);
    }

    public function addAuth($userId, $source, $sourceId)
    {
        $query = "INSERT INTO auth( `user_id`, `source`, `source_Id`) 
        VALUES ('$userId','$source','$sourceId')";
        return mysqli_query($this->con, $query);
    }

    public function loginWithSource($auth)
    {
        $query = "select * from auth where source='" . $auth->source . "' AND source_id='" . $auth->sourceId . "'";
        $result = mysqli_query($this->con, $query);
        return mysqli_fetch_assoc($result);
    }
}