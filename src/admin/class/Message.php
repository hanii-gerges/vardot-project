<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'].'/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/admin/class/Helper.php';

class Message implements EntityCRUD{
    private $messageTable = 'message';
    private $userTable = 'user';
    private $instance;
    public $conn;
    public function __construct()
    {
        $this->instance = Database::getInstance();
        $this->conn = $this->instance->getConnection();
    }

    public function all()
    {
        /* Pagination */
        if (isset($_GET['page'])) {
            Helper::filterValue($_GET['page']);
            $_GET['page'] = intval($_GET['page']);
            if($_GET['page'] <= 0)$_GET['page'] = 1;
            $page = $_GET['page'];
        } else {
            $page = 1;
            $_GET['page'] = 1;
        }
        $records_per_page = 10;
        $offset = ($page-1) * $records_per_page; 
        $query = "SELECT COUNT(*) FROM message";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);
        
        $query = 
        "SELECT m.message_id, m.fullname, m.email, m.phone, m.content, m.status, m.created_at
        FROM $this->messageTable m
        ORDER BY m.created_at desc
        LIMIT $offset, $records_per_page
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $messages['total_pages'] = $total_pages;
        // die(print_r($messages));
        return $messages;
    }
    public function lastAdded(){}

    public function getById($id)
    {
        $query = 
        "SELECT m.message_id, m.fullname, m.email, m.phone, m.content, m.status, m.created_at
        FROM $this->messageTable m
        WHERE m.message_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $message = $stmt->fetch(PDO::FETCH_ASSOC);
        return $message;
    }

    public function store($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request,[
            'fullname', 
            'email', 
            'phone', 
            'content',
        ]);

        if(!$valid)
        {
            header('Location:/index.php#get-in-touch');
            return;
        }
        $query = "
        INSERT INTO message (fullname, email, phone, content)
         VALUES(:fullname, :email, :phone, :content)
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':fullname' => $request['fullname'],
            ':email' => $request['email'],
            ':phone' => $request['phone'],
            ':content' => $request['content'],
        ]);
        $_SESSION['success'] = 'Message sent successfully.';
        header('Location:/index.php#get-in-touch');
    }

    public function update($request){
        if(!isset($request['unread']) || $request['unread'] == '')
        {
            $request['unread'] = 'read';
        }
        $query = 
        "UPDATE message
        SET status = :unread
        WHERE message_id = :id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':unread' => $request['unread'],
            ':id' => $request['id'],
        ]);

        header('Location:index.php?page=1');
    }

    public function statusToggle($status,$id){
        if(!isset($status) || $status == '')
        {
            $status = 'read';
        }

        $query = 
        "UPDATE message
        SET status = :read
        WHERE message_id = :id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':read' => $status,
            ':id' => $id,
        ]);

    }

    public function delete($id)
    {
        $query = "
        DELETE FROM message
        WHERE message_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $_SESSION['success'] = 'Record deleted';
        header('Location:index.php?page=1');
    }


    public function uploadImage($imageName,$imageId){}
    public function validateImage($imageName){}
    public function storeImage($imageName, $id){}
    public function getMedia($id){}
}


