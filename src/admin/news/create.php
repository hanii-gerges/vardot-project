<?php
include_once '../class/News.php';

$news = new News();


if(isset($_POST['cancel']))
{
    header("Location:index.php");
    return;
}

if(isset($_POST['create']))
{
    $news->store($_POST);
}


$conn->close;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Sleek - Admin Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="../assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="../assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="../assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="../assets/css/sleek.css" />



    <!-- FAVICON -->
    <link href="../assets/img/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="../assets/plugins/nprogress/nprogress.js"></script>
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
                    <div class="form-group">
                        <label for="title">News Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="highlight">Highlight</label>
                        <input type="text" class="form-control" id="highlight" name="highlight">
                    </div>

                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea class="form-control" name="body" id="editor1" rows="10" cols="80"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-4 d-inline-block mr-3" for="">Status</label>
                        <ul class="list-unstyled list-inline">
                            <li class="d-inline-block mr-3">
                                <label class="control outlined control-radio radio-success">published
                                    <input type="radio" name="status" value="published">
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
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default" name="create">Create</button>
                        <button type="submit" class="btn btn-secondary btn-default" name="cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/toaster/toastr.min.js"></script>
    <script src="../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src="../assets/plugins/charts/Chart.min.js"></script>
    <script src="../assets/plugins/ladda/spin.min.js"></script>
    <script src="../assets/plugins/ladda/ladda.min.js"></script>
    <script src="../assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
    <script src="../assets/plugins/select2/js/select2.min.js"></script>
    <script src="../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="../assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/plugins/jekyll-search.min.js"></script>
    <script src="../assets/js/sleek.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/date-range.js"></script>
    <script src="../assets/js/map.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/plugins/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>




</body>

</html>