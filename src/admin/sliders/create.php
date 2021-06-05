<?php
session_start();

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
                <h2>Create Slider</h2>
            </div>
            <div class="card-body row">
                <form class="col-12" method="POST" action="store.php">
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
                    <div class="form-group row mb-6">
                        <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Slider Image</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="custom-file mb-1">
                                <input type="file" class="custom-file-input" name="sliderImage" id="coverImage">
                                <label class="custom-file-label" for="coverImage">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">Slider Text&nbsp<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="text" name="text" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Order&nbsp<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="order" name="order" min=1 max=100 required>
                    </div>

                    
                    <div class="form-group">
                        <label class="mb-2 mt-4 d-inline-block mr-3" for="">Status&nbsp<span class="text-danger">*</span></label>
                        <ul class="list-unstyled list-inline">
                            <li class="d-inline-block mr-3">
                                <label class="control outlined control-radio radio-success">published
                                    <input type="radio" name="status" value="published" required>
                                    <div class="control-indicator"></div>
                                </label>
                            </li>

                            <li class="d-inline-block mr-3">
                                <label class="control outlined control-radio radio-danger">unpublished
                                    <input type="radio" name="status" value="unpublished">
                                    <div class="control-indicator"></div>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-footer justify-content-end d-flex pt-4 pt-5 mt-4 border-top">
                        <a class="btn btn-secondary btn-default mx-1" href="index.php?page=1">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-default mx-2" name="create">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '../footer.php' ?>




</body>

</html>