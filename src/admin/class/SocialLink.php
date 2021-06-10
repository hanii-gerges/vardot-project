<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/Helper.php';

class SocialLink implements EntityCRUD
{
    private $socialLinkTable = 'social_link';
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
        $query = "SELECT COUNT(*) FROM social_link";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);

        $query =
            "SELECT s.social_link_id, s.name, s.url, s.status, u1.firstname as created_by, s.created_at, s.updated_at, u2.firstname as updated_by
        FROM $this->socialLinkTable s
        INNER JOIN $this->userTable u1 on s.user_id = u1.user_id
        INNER JOIN $this->userTable u2 on s.updated_by = u2.user_id
        ORDER BY s.created_at desc
        LIMIT $offset, $records_per_page
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $links = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $links['total_pages'] = $total_pages;
        // die(print_r($links));
        return $links;
    }

    public function getById($id){
        $query =
            "SELECT s.social_link_id, s.name, s.url, s.status, u.firstname as created_by, s.created_at, s.updated_at
        FROM $this->socialLinkTable s, $this->userTable u
        WHERE s.social_link_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $link = $stmt->fetch(PDO::FETCH_ASSOC);
        return $link;
    }

    public function publishedOnly()
    {
        $query =
            "SELECT s.social_link_id, s.name, s.url, s.status, s.created_at, s.updated_at
        FROM $this->socialLinkTable s
        WHERE status = 'published'
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $links = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $links;
    }

    public function store($request){}

    public function update($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request, [
            'url',
            'status',
        ]);

        if (!$valid) {
            header('Location:view.php?id=' . $request['id']);
            return;
        }
        $userId = $_SESSION['user_id'];
        $query = "
            UPDATE social_link SET 
            url = :url,
            status = :status,
            updated_by = $userId
            WHERE social_link_id = :id
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':url' => $request['url'],
            ':status' => $request['status'],
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
