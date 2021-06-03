<?php
include_once '../class/News.php';

$news = new News();



if(isset($_POST['update']))
{
    $news->update($_POST);
}

//return element by id
$news = $news->getById($_GET['id']); //                                          sql injection
if ( $news === false ) {
    $_SESSION['error'] = 'Bad value for id';
    header( 'Location:index.php') ;
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
            <?php
            if ( isset($_SESSION['error']) ) {
                echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
                unset($_SESSION['error']);
            }
            ?>
            <div class="card-body">
                <form method="POST" action="">
                <input type="hidden" name="id" value=<?= $_GET['id'] ?>>
                    <div class="form-group">
                        <label for="title">News Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $news['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="highlight">Highlight</label>
                        <input type="text" class="form-control" id="highlight" name="highlight" value="<?= $news['highlight'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea class="form-control" name="body" id="editor1" rows="10" cols="80"><?= $news['body'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-4 d-inline-block mr-3" for="">Status</label>
                        <ul class="list-unstyled list-inline">
                            <li class="d-inline-block mr-3">
                                <label class="control outlined control-radio radio-success">published
                                    <input type="radio" name="status" value="published" <?php if($news['status'] == 'published') echo 'checked="checked"'; ?>>
                                    <div class="control-indicator"></div>
                                </label>
                            </li>

                            <li class="d-inline-block mr-3">
                                <label class="control outlined control-radio radio-danger">unpublished
                                    <input type="radio" name="status" value="unpublished" <?php if($news['status'] == 'unpublished') echo 'checked="checked"'; ?>>
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