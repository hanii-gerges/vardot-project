<?php
include_once '../class/User.php';

$user = new User();



if (isset($_POST['create'])) {
    $user->store($_POST);
}


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
            <?php
            if (isset($_SESSION['error'])) {
                echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
                unset($_SESSION['error']);
            }
            ?>
            <div class="card-body">
                <form method="post" action="">


                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" name="firstname" id="firstName" value="Albrecht">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" name="lastname" id="lastName" value="Straub">
                            </div>
                        </div>
                    </div>



                    <div class="form-group mb-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="albrecht.straub@gmail.com">
                    </div>

                    <div class="form-group mb-4">
                        <label for="newPassword">password</label>
                        <input type="password" class="form-control" name="password" id="newPassword">
                    </div>

                    <div class="form-group mb-4">
                        <label for="conPassword">Confirm password</label>
                        <input type="password" class="form-control" name="confirm_password" id="conPassword">
                    </div>
                    <div class="row form-group">
                        <label class="col-1" for="exampleFormControlSelect1">Role</label>
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