<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/admin/class/Helper.php';

class News implements EntityCRUD{
    private $newsTable = 'news';
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
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $records_per_page = 10;
        $offset = ($page-1) * $records_per_page; 
        $query = "SELECT COUNT(*) FROM news";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);
        
        $query = 
        "SELECT n.news_id, n.title, n.highlight, n.status,u1.firstname as created_by, n.created_at, n.updated_at, u2.firstname as updated_by
        FROM $this->newsTable n
        INNER JOIN $this->userTable u1 on n.user_id = u1.user_id
        INNER JOIN $this->userTable u2 on n.updated_by = u2.user_id
        ORDER BY n.created_at desc
        LIMIT $offset, $records_per_page
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $news['total_pages'] = $total_pages;
        // die(print_r($news));
        return $news;
    }
    public function lastAdded()
    {
        $query = 
        "SELECT n.news_id, n.title, n.highlight, n.created_at
        FROM $this->newsTable n
        WHERE status = 'published'
        ORDER BY n.created_at desc
        LIMIT 3
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }
    public function getById($id)
    {
        $query = 
        "SELECT n.news_id, n.title, n.highlight, n.body, n.status, u.firstname as created_by, n.created_at, n.updated_at
        FROM $this->newsTable n, $this->userTable u
        WHERE n.news_id = $id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $news = $stmt->fetch(PDO::FETCH_ASSOC);
        return $news;
    }

    public function store($request)
    {
        $query = "
        INSERT INTO news (user_id, title, highlight, body, status, updated_by)
         VALUES(1, :title, :highlight, :body, :status, 1)
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':title' => $request['title'],
            ':highlight' => $request['highlight'],
            ':body' => $request['body'],
            ':status' => $request['status'],
        ]);
        $_SESSION['success'] = 'Record created';
        header('Location:index.php?page=1');
    }

    public function update($request)
    {
        $query = "
            UPDATE news SET 
            title = :title,
            highlight = :highlight,
            body = :body,
            status = :status
            WHERE news_id = :id
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':title' => $request['title'],
            ':highlight' => $request['highlight'],
            ':body' => $request['body'],
            ':status' => $request['status'],
            ':id' => $request['id'],
        ]);
        $_SESSION['success'] = 'Record updated';
        header('Location:index.php?page=1');
    }

    public function delete($id)
    {
        $query = "
        DELETE FROM news 
        WHERE news_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $_SESSION['success'] = 'Record deleted';
        header('Location:index.php?page=1');
    }

    public function storeImage($imageName, $mediaId)
    {
        
    }
}
