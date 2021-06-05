<?php
session_start();
include_once '../class/Message.php';

$messageInstance = new Message();

//return element by id
$message = $messageInstance->getById($_GET['id']); //                                          sql injection
if ($message === false) {
    $_SESSION['error'][] = 'Bad value for id';
    header('Location:index.php?page=1');
}

$message['status'] = 'read';
$messageInstance->statusToggle($message['status'],$message['message_id']);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include '../header.php' ?>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <?php include '../layout.php' ?>

    <div class="container">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Message</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="update.php">
                    <input type="hidden" name="id" value=<?= $_GET['id'] ?>>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        foreach($_SESSION['error'] as $error){
                            echo "-$error<br>";
                            }
                        echo "</div>\n";
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $message['fullname'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $message['email'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $message['phone'] ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" rows="10" cols="80" disabled><?= $message['content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control control-checkbox  mb-2 mt-4 d-inline-block mr-3" for="unread">Mark as unread</label>
                        <input type="checkbox" name="unread" id="unread" value="unread">
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <button type="submit" class="btn btn-primary btn-default mx-2" name="update">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '../footer.php' ?>





</body>

</html>