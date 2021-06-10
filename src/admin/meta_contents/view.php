<?php
session_start();
include_once '../class/MetaContent.php';
include_once '../authinticate.php';

$metaContent = new MetaContent();

$metaContent = $metaContent->getById($_GET['id']); //                                          sql injection
// print_r($metaContent);
// die();
if ($metaContent === false) {
    $_SESSION['error'][] = 'Bad value for id';
    header('Location:index.php?page=1');
}

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
                <h2>Edit <?= $metaContent['name'] ?> </h2>
            </div>
            <div class="card-body row">
                <form class="col-12 col-lg-8" method="POST" action="update.php" enctype="multipart/form-data">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        foreach ($_SESSION['error'] as $error) {
                            echo "-$error<br>";
                        }
                        echo "</div>\n";
                        unset($_SESSION['error']);
                    }
                    ?>
                    <input type="hidden" name="id" value="<?= $metaContent['meta_content_id'] ?>">
                    
                    <div class="form-group">
                        <label for="content">Content&nbsp<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="content" name="content" value="<?= $metaContent['content'] ?>" maxlength=250 required>
                    </div>
                    
                    
                    <div class="form-footer justify-content-end d-flex pt-4 pt-5 mt-4 border-top">
                        <a class="btn btn-secondary btn-default mx-1" href="index.php?page=1">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-default mx-2" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '../footer.php' ?>




</body>

</html>