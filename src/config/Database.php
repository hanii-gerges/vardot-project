<?php

class Database
{
  private static $instance;
  private $conn;
  private $host  = 'sciences-university.com';
  private $user  = 'root';
  private $password   = "123123";
  private $database  = "su";

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function getConnection()
  {
    return $this->conn;
  }

  public static function getInstance()
  {
    if(!SELF::$instance)
    {
      SELF::$instance = new Database();
    }

    return SELF::$instance;
  }
}
