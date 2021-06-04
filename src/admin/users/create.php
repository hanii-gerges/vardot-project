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

    <div class="mt-5 container">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create User</h2>
            </div>
            <div class="card-body">
                <form method="post" action="store.php">
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
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">First name&nbsp<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="firstname" id="firstName" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastName">Last name&nbsp<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="lastname" id="lastName" required>
                            </div>
                        </div>
                    </div>



                    <div class="form-group mb-4">
                        <label for="email">Email&nbsp<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="newPassword">password&nbsp<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="newPassword" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="conPassword">Confirm password&nbsp<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="confirm_password" id="conPassword" required>
                    </div>
                    <div class="row form-group">
                        <label class="col-1" for="exampleFormControlSelect1">Role&nbsp<span class="text-danger">*</span></label>
                        <select class="col-2 form-control" name="role">
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
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