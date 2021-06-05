<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/Helper.php';

class Slider implements EntityCRUD
{
    private $sliderTable = 'hero_slider';
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
        $query = "SELECT COUNT(*) FROM hero_slider";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);

        $query =
            "SELECT h.hero_slider_id, h.text, h.slider_order, h.status, u1.firstname as created_by, h.created_at, h.updated_at, u2.firstname as updated_by
        FROM $this->sliderTable h
        INNER JOIN $this->userTable u1 on h.user_id = u1.user_id
        INNER JOIN $this->userTable u2 on h.updated_by = u2.user_id
        ORDER BY h.slider_order asc
        LIMIT $offset, $records_per_page
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sliders['total_pages'] = $total_pages;
        // die(print_r($sliders));
        return $sliders;
    }
    public function publishedOnly()
    {
        $query =
            "SELECT h.hero_slider_id, h.text, h.slider_order, h.status, h.created_at, h.updated_at
        FROM $this->sliderTable h
        WHERE status = 'published'
        ORDER BY h.slider_order asc
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sliders;
    }
    public function getById($id)
    {
        $query =
            "SELECT h.hero_slider_id, h.text, h.slider_order, h.status
        FROM $this->sliderTable h
        WHERE h.hero_slider_id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $slider = $stmt->fetch(PDO::FETCH_ASSOC);
        return $slider;
    }

    public function store($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request, [
            'text',
            'order',
            'status',
        ]);

        if (!$valid) {
            header('Location:create.php');
            return;
        }
        $query = "
        INSERT INTO hero_slider (user_id, text, slider_order, status, updated_by)
         VALUES(1, :text, :slider_order, :status, 1)
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':text' => $request['text'],
            ':slider_order' => $request['order'],
            ':status' => $request['status'],
        ]);

        if ($_FILES['sliderImage']['name'] != "") {
            if ($this->validateImage('sliderImage')) {
                $this->storeImage($_FILES['sliderImage']['name'], $request['id']);
                $image = $this->getMedia($request['id']);
                if (!$this->uploadImage('sliderImage', $image['id'])) {
                    $_SESSION['error'] = 'There was error uploading image.';
                }
            }
        }

        $_SESSION['success'] = 'Record created';
        header('Location:index.php?page=1');
    }

    public function update($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request, [
            'text',
            'order',
            'status',
        ]);

        if (!$valid) {
            header('Location:view.php?id=' . $request['id']);
            return;
        }

        $query = "
            UPDATE hero_slider SET 
            text = :text,
            slider_order = :order,
            status = :status
            WHERE hero_slider_id = :id
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':text' => $request['text'],
            ':order' => $request['order'],
            ':status' => $request['status'],
            ':id' => $request['id'],
        ]);

        if ($_FILES['sliderImage']['name'] != "") {
            if ($this->validateImage('sliderImage')) {
                $this->storeImage($_FILES['sliderImage']['name'], $request['id']);
                $image = $this->getMedia($request['id']);
                if (!$this->uploadImage('sliderImage', $image['id'])) {
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
        DELETE FROM hero_slider 
        WHERE hero_slider_id = :id
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
            ':model_name' => 'hero_slider',
            ':record_id' => $id,
            ':file_name' => $imageName,
        ]);
    }

    public function getMedia($id)
    {
        $query =
            "SELECT m.media_id as id, m.file_name as name
        FROM media m
        WHERE model_name = 'hero_slider'
        AND record_id = :id
        ORDER BY id desc LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $media = $stmt->fetch(PDO::FETCH_ASSOC);
        return $media;
    }

    
}
