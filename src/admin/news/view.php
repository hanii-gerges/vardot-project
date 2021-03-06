<?php
session_start();
include_once '../class/News.php';
include_once '../authinticate.php';

$news = new News();

//return element by id
$news = $news->getById($_GET['id']); //                                          sql injection
if ($news === false) {
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
                <h2>Edit News</h2>
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
                        <label for="title">News Title&nbsp<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $news['title'] ?>" maxlength=250 required>
                    </div>
                    <div class="form-group">
                        <label for="highlight">Highlight&nbsp<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="highlight" name="highlight" value="<?= $news['highlight'] ?>" maxlength=250 required>
                    </div>

                    <div class="form-group">
                        <label for="body">Body&nbsp<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="body" id="editor1" rows="10" cols="80" required><?= $news['body'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-4 d-inline-block mr-3" for="">Status&nbsp<span class="text-danger">*</span></label>
                        <ul class="list-unstyled list-inline">
                            <li class="d-inline-block mr-3">
                                <label class="control outlined control-radio radio-success">published
                                    <input type="radio" name="status" value="published" <?php if ($news['status'] == 'published') echo 'checked="checked"'; ?> required>
                                    <div class="control-indicator"></div>
                                </label>
                            </li>

                            <li class="d-inline-block mr-3">
                                <label class="control outlined control-radio radio-danger">unpublished
                                    <input type="radio" name="status" value="unpublished" <?php if ($news['status'] == 'unpublished') echo 'checked="checked"'; ?>>
                                    <div class="control-indicator"></div>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
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