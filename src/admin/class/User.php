<?php
session_start();
include_once '../../config/Database.php';
class User {
    private $userTable = "user";
    private $instance;
    public $conn;

    public function __construct()
    {
        $this->instance = Database::getInstance();
        $this->conn = $this->instance->getConnection();
    }

    public function all()
    {
        $query = 
        "SELECT u.user_id, u.name, u.email, u.status, u.role, u.created_at, u.updated_at
        FROM $this->userTable u
        ORDER BY u.created_at desc
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getById($id)
    {
        
    }

    public function store($request)
    {
        
    }

    public function update($request)
    {
        
    }

    public function delete($id)
    {
        
    }
}