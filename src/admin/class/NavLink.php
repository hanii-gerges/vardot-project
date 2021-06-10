<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/Helper.php';

class NavLink implements EntityCRUD
{
    private $navLinkTable = 'nav_link';
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
        $query = "SELECT COUNT(*) FROM nav_link";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);

        $query =
            "SELECT n.nav_link_id, n.name, n.body, n.status, u1.firstname as created_by, n.created_at, n.updated_at, u2.firstname as updated_by
        FROM $this->navLinkTable n
        INNER JOIN $this->userTable u1 on n.user_id = u1.user_id
        INNER JOIN $this->userTable u2 on n.updated_by = u2.user_id
        ORDER BY n.created_at desc
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
        "SELECT n.nav_link_id, n.name, n.body, type, parent, n.status, n.created_at, n.updated_at
        FROM $this->navLinkTable n
        WHERE n.nav_link_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $link = $stmt->fetch(PDO::FETCH_ASSOC);
        return $link;
    }

    public function headerLinks()
    {
        $query =
            "SELECT n.nav_link_id, n.name, type, n.status, n.created_at, n.updated_at
        FROM $this->navLinkTable n
        WHERE status = 'published'
        AND type = 'header'
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $links = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $links;
    }
    public function footerLinks()
    {
        $query =
        "SELECT n.nav_link_id, n.name, type, parent, n.status, n.created_at, n.updated_at
        FROM $this->navLinkTable n
        WHERE status = 'published'
        AND type = 'footer'
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $links = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $links;
    }

    public function store($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request,[
            'name',
            'body',
            'type',
            'parent',
            'status',
        ]);

        if(!$valid)
        {
            header('Location:create.php');
            return;
        }
        $userId = $_SESSION['user_id'];
        $query = "
        INSERT INTO nav_link (user_id, name, body, type, parent, status, updated_by)
         VALUES($userId, :name, :body, :type, :parent, :status, 1)
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':name' => $request['name'],
            ':body' => $request['body'],
            ':type' => $request['type'],
            ':parent' => $request['parent'],
            ':status' => $request['status'],
        ]);
        $_SESSION['success'] = 'Record created';
        header('Location:index.php?page=1');
    }

    public function update($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request, [
            'name',
            'body',
            'type',
            'parent',
            'status',
        ]);

        if (!$valid) {
            header('Location:view.php?id=' . $request['id']);
            return;
        }
        $userId = $_SESSION['user_id'];
        $query = "
            UPDATE nav_link SET 
            name = :name,
            body = :body,
            type = :type,
            parent = :parent,
            status = :status,
            updated_by = $userId
            WHERE nav_link_id = :id
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':name' => $request['name'],
            ':body' => $request['body'],
            ':type' => $request['type'],
            ':parent' => $request['parent'],
            ':status' => $request['status'],
            ':id' => $request['id'],
        ]);

        if (!$_SESSION['error'])
            $_SESSION['success'] = 'Record updated';

        header('Location:index.php?page=1');
    }

    public function delete($id)
    {
        $query = "
        DELETE FROM nav_link 
        WHERE nav_link_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $_SESSION['success'] = 'Record deleted';
        header('Location:index.php?page=1');
    }


    public function uploadImage($imageName, $mediaId){}

    public function validateImage($imageName){}

    public function storeImage($imageName, $id){}

    public function getMedia($id){}

    public function rowsCount(){
        $query =
            "SELECT count(*) as count
        FROM $this->navLinkTable u
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $navlink = $stmt->fetch(PDO::FETCH_ASSOC);
        return $navlink;
    }
}
