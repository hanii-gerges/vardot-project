<?php
session_Start();
include_once '../class/User.php';
include_once '../authinticate.php';

if($_GET['id'] != $_SESSION['user_id'])
{
    header('Location:index.php?page=1');
}

$user = new User();


//return element by id
$image = $user->getMedia($_GET['id']);
$user = $user->getById($_GET['id']);
if ($user === false) {
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
    <div class="content-wrapper">
        <div class="content">
            <div class="bg-white border rounded">
                <div class="row">
                    <div class="col-12">
                        <div class="profile-content-right profile-right-spacing py-5">
                            <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">


                                

                                <li class="nav-item">
                                    <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                                </li>
                            </ul>

                            <div class="tab-content px-3 px-xl-5" id="myTabContent">


                                

                                <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="tab-pane-content mt-5 row">
                                        <form class="col-12 col-lg-8" method="post" action="update.php" enctype="multipart/form-data">
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
                                            <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                                            <div class="form-group row mb-6">
                                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="custom-file mb-1 text-right">
                                                        <input type="file" class="" name="userImage" id="coverImage">
                                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="firstName">First name&nbsp<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="firstname" maxlength=250 value="<?= $user['firstname'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="lastName">Last name&nbsp<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="lastname" maxlength=250 value="<?= $user['lastname'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group mb-4">
                                                <label for="email">Email&nbsp<span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" maxlength=250 value="<?= $user['email'] ?>" required>
                                            </div>


                                            <div class="d-flex justify-content-end mt-5">
                                                <a class="btn btn-secondary btn-default mx-1" href="index.php?page=1">Cancel</a>
                                                <input type="submit" class="btn btn-primary btn-default mx-2" name="update" value="Update">
                                            </div>
                                        </form>
                                        <div class="col-12 col-lg-4 mt-4 mt-md-0 justify-content-center pr-5">
                                            <div class="h3">Current Image</div>
                                            <img class="img-thumbnail mt-2" src="/images/entities/<?= $image['id'] ?>/<?= $image['name'] ?>" alt="" srcset="" width=auto>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div> <!-- End Content -->
    </div>

    <?php include '../footer.php' ?>
</body>

</html>