<?php

class Database{
	
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "123123";
    private $database  = "su"; 
    
    public function getConnection(){		
		try {
            $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
}