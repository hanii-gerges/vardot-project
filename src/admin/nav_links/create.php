<?php
session_start();
include_once '../authinticate.php';

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
                <h2>Create Navlink</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="store.php">
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
                    <div class="form-group">
                        <label for="name">Navlink Name&nbsp<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" maxlength=250 required>
                    </div>
                    
                    <div class="form-group">
                        <label for="body">body&nbsp<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="body" id="editor1" rows="10" cols="80" required></textarea>
                    </div>
                    <div class="row form-group">
                        <label class="col-1" for="exampleFormControlSelect1">Type&nbsp<span class="text-danger">*</span></label>
                        <select class="col-2 form-control" name="type">
                            <option value="header">Header</option>
                            <option value="footer">Footer</option>
                        </select>
                    </div>
                    <div class="row form-group">
                        <label class="col-1" for="exampleFormControlSelect1">Parent&nbsp</label>
                        <select class="col-2 form-control" name="parent">
                            <option value="explore">Explore</option>
                            <option value="quick links">Quick Links</option>
                            <option value="using our site">Using Our Site</option>
                            <option value="how to find us">How To Find Us</option>
                        </select>
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