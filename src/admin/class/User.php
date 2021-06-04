<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/Helper.php';

class User implements EntityCRUD
{
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
        /* Pagination */
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $records_per_page = 10;
        $offset = ($page - 1) * $records_per_page;
        $query = "SELECT COUNT(*) FROM user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);

        $query =
            "SELECT u.user_id, u.firstname,u.lastname, u.email, u.status, u.role, u.created_at, u.updated_at
        FROM $this->userTable u
        ORDER BY u.firstname asc
        LIMIT $offset, $records_per_page
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users['total_pages'] = $total_pages;
        return $users;
    }

    public function getById($id)
    {
        $query =
            "SELECT u.user_id, u.firstname,u.lastname, u.email, u.status, u.role, u.created_at, u.updated_at
        FROM $this->userTable u
        WHERE user_id = $id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function store($request)
    {
        Helper::filter($request);
        $query = "INSERT INTO user (firstname, lastname, email, password, role)
         VALUES (:firstname, :lastname, :email, :password, :role)";
        $hashed_password = password_hash($request['password'], PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':firstname' => $request['firstname'],
            ':lastname' => $request['lastname'],
            ':email' => $request['email'],
            ':password' => $hashed_password,
            ':role' => $request['role'],
        ]);
        $_SESSION['success'] = 'User created';
        header('Location:index.php?page=1');
    }

    public function update($request)
    {
        $query = "
            UPDATE user SET 
            firstname = :firstname,
            lastname = :lastname,
            email = :email
            WHERE user_id = :id;
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':firstname' => $request['firstname'],
            ':lastname' => $request['lastname'],
            ':email' => $request['email'],
            ':id' => $request['id'],
        ]);
        if ($_FILES['userImage']['name'] != "") {
            if ($this->validateImage('userImage')) {
                $this->storeImage($_FILES['userImage']['name'], $request['id']);
                $image = $this->getMedia($request['id']);
                if (!$this->uploadImage('userImage', $image['id'])) {
                    $_SESSION['error'] = 'There was error uploading image.';
                }
            }
        }
        if (!$_SESSION['error'])
            $_SESSION['success'] = 'Record updated';

        header('Location:index.php?page=1');
    }

    public function delete($id)
    {
        $query = "
        DELETE FROM user 
        WHERE user_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $_SESSION['success'] = 'Record deleted';
        header('Location:index.php?page=1');
    }

    public function uploadImage($imageName, $mediaId)
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/entities/$mediaId")) {
            $files = glob($_SERVER['DOCUMENT_ROOT'] . "/images/entities/$mediaId" . '/*');
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($_SERVER['DOCUMENT_ROOT'] . "/images/entities/$mediaId");
        }
        mkdir($_SERVER['DOCUMENT_ROOT'] . "/images/entities/$mediaId");
        chmod($_SERVER['DOCUMENT_ROOT'] . "/images/entities/$mediaId", 0777);
        // die('directory made');
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/images/entities/$mediaId/";
        $target_file = $target_dir . basename($_FILES["$imageName"]["name"]);
        // Check if $uploadOk is set to 0 by an error

        if (!move_uploaded_file($_FILES[$imageName]["tmp_name"], $target_file)) {
            return false;
        }
        return true;
    }

    public function validateImage($imageName)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/images/entities/";
        $target_file = $target_dir . basename($_FILES[$imageName]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$imageName]["tmp_name"]);
        if ($check === false) {
            $_SESSION['error'] = "File is not an image.";
            return false;
        }

        // // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }

        // Check file size
        if ($_FILES[$imageName]["size"] > 500000) {
            $_SESSION['error'] = "Sorry, your file is too large.";
            return false;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }
        return true;
    }

    public function storeImage($imageName, $id)
    {
        $query = "INSERT INTO media(model_name, record_id, file_name) VALUES (:model_name, :record_id, :file_name)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':model_name' => 'user',
            ':record_id' => $id,
            ':file_name' => $imageName,
        ]);
    }

    public function getMedia($id)
    {
        $query =
            "SELECT m.media_id as id, m.file_name
        FROM media m
        WHERE model_name = 'user'
        AND record_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $media = $stmt->fetch(PDO::FETCH_ASSOC);
        return $media;
    }
}
