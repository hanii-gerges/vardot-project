<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/Helper.php';

class MetaContent implements EntityCRUD
{
    private $metaContentTable = 'meta_content';
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
            if ($_GET['page'] <= 0) $_GET['page'] = 1;
            $page = $_GET['page'];
        } else {
            $page = 1;
            $_GET['page'] = 1;
        }
        $records_per_page = 10;
        $offset = ($page - 1) * $records_per_page;
        $query = "SELECT COUNT(*) FROM meta_content";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);

        $query =
            "SELECT m.meta_content_id, m.name, m.content, u1.firstname as created_by, m.created_at, m.updated_at, u2.firstname as updated_by
        FROM $this->metaContentTable m
        INNER JOIN $this->userTable u1 on m.user_id = u1.user_id
        INNER JOIN $this->userTable u2 on m.updated_by = u2.user_id
        ORDER BY m.created_at desc
        LIMIT $offset, $records_per_page
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $metaContents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $metaContents['total_pages'] = $total_pages;
        return $metaContents;
    }

    public function getById($id){
        $query =
            "SELECT m.meta_content_id, m.name, m.content, u.firstname as created_by, m.created_at, m.updated_at
        FROM $this->metaContentTable m, $this->userTable u
        WHERE m.meta_content_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $metaContent = $stmt->fetch(PDO::FETCH_ASSOC);
        return $metaContent;
    }

    public function store($request){}

    public function update($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request, [
            'content',
        ]);

        if (!$valid) {
            header('Location:view.php?id=' . $request['id']);
            return;
        }
        $userId = $_SESSION['user_id'];
        $query = "
            UPDATE meta_content SET 
            content = :content,
            updated_by = $userId
            WHERE meta_content_id = :id
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':content' => $request['content'],
            ':id' => $request['id'],
        ]);

        if (!$_SESSION['error'])
            $_SESSION['success'] = 'Record updated';

        header('Location:index.php?page=1');
    }

    public function delete($id){}


    public function uploadImage($imageName, $mediaId){}

    public function validateImage($imageName){}

    public function storeImage($imageName, $id){}

    public function getMedia($id){}
}
