<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/EntityCRUD.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/class/Helper.php';

class Event implements EntityCRUD
{
    private $eventTable = 'event';
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
        $query = "SELECT COUNT(*) FROM event";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $total_rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_pages = ceil($total_rows['COUNT(*)'] / $records_per_page);

        $query =
            "SELECT e.event_id, e.title, e.highlight, e.status,u1.firstname as created_by, e.created_at, e.updated_at, u2.firstname as updated_by
        FROM $this->eventTable e
        INNER JOIN $this->userTable u1 on e.user_id = u1.user_id
        INNER JOIN $this->userTable u2 on e.updated_by = u2.user_id
        ORDER BY e.created_at desc
        LIMIT $offset, $records_per_page
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $events['total_pages'] = $total_pages;
        // die(print_r($events));
        return $events;
    }
    public function lastAdded()
    {
        $query =
            "SELECT e.event_id, e.title, e.highlight, e.date, e.start_time, e.end_time, e.location, e.created_at
        FROM $this->eventTable e
        WHERE status = 'published'
        ORDER BY e.created_at desc
        LIMIT 3
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }
    public function getById($id)
    {
        $query =
            "SELECT e.event_id, e.title, e.highlight, e.body, e.date, e.start_time, e.end_time, e.location,  e.status, u.firstname as created_by, e.created_at, e.updated_at
        FROM $this->eventTable e, $this->userTable u
        WHERE e.event_id = $id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return $event;
    }

    public function store($request)
    {
        $request = Helper::filter($request);
        $valid = Helper::required($request, [
            'title',
            'highlight',
            'body',
            'date',
            'start_time',
            'end_time',
            'location',
            'status',
        ]);

        if (!$valid) {
            header('Location:create.php');
            return;
        }
        $query = "
        INSERT INTO event (user_id, title, highlight, body, date, start_time, end_time, location,  status, updated_by)
         VALUES(1, :title, :highlight, :body, :date, :start_time, :end_time, :location, :status, 1)
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':title' => $request['title'],
            ':highlight' => $request['highlight'],
            ':body' => $request['body'],
            ':date' => $request['date'],
            ':start_time' => $request['start_time'],
            ':end_time' => $request['end_time'],
            ':location' => $request['location'],
            ':status' => $request['status'],
        ]);

        if ($_FILES['eventImage']['name'] != "") {
            if ($this->validateImage('eventImage')) {
                $this->storeImage($_FILES['eventImage']['name'], $request['id']);
                $image = $this->getMedia($request['id']);
                if (!$this->uploadImage('eventImage', $image['id'])) {
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
            'title',
            'highlight',
            'body',
            'date',
            'start_time',
            'end_time',
            'location',
            'status',
        ]);

        if (!$valid) {
            header('Location:view.php?id=' . $request['id']);
            return;
        }

        $query = "
            UPDATE event SET 
            title = :title,
            highlight = :highlight,
            body = :body,
            date = :date,
            start_time = :start_time,
            end_time = :end_time,
            location = :location,
            status = :status
            WHERE event_id = :id
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':title' => $request['title'],
            ':highlight' => $request['highlight'],
            ':body' => $request['body'],
            ':date' => $request['date'],
            ':start_time' => $request['start_time'],
            ':end_time' => $request['end_time'],
            ':location' => $request['location'],
            ':status' => $request['status'],
            ':id' => $request['id'],
        ]);

        if ($_FILES['eventImage']['name'] != "") {
            if ($this->validateImage('eventImage')) {
                $this->storeImage($_FILES['eventImage']['name'], $request['id']);
                $image = $this->getMedia($request['id']);
                if (!$this->uploadImage('eventImage', $image['id'])) {
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
        DELETE FROM event 
        WHERE event_id = :id
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
            ':model_name' => 'event',
            ':record_id' => $id,
            ':file_name' => $imageName,
        ]);
    }

    public function getMedia($id)
    {
        $query =
            "SELECT m.media_id as id, m.file_name as name
        FROM media m
        WHERE model_name = 'event'
        AND record_id = :id
        ORDER BY id desc LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $media = $stmt->fetch(PDO::FETCH_ASSOC);
        return $media;
    }

    
}
