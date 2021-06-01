<?php
session_start();
include_once '../class/News.php';

$news = new News();

// get all news
$allNews = $news->all();

$news->conn = null;
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
    <link href="../../fonts/fontawesome-free-5.15.3-web/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  

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
    <div class="card card-table-border-none recent-orders" id="recent-orders">
        <div class="px-0 px-md-5 mt-5">
            <?php
            // die(2);
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $_SESSION['error'] . "</div>\n";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success'] . "</div>\n";
                unset($_SESSION['success']);
            }
            ?>

        </div>
        <div class="pt-4 mb-5 card-header justify-content-between">
            <h1>News</h1>
        <div class="">
            <a class="h5 p-2 bg-light rounded-pill text-primarty" href="/admin/news/create.php">
                <i class="fas fa-plus"></i>
                Add New</a>
        </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <table id="myTable" class="hover row-border table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>News ID</th>
                        <th>Title</th>
                        <th class="d-none d-lg-table-cell">Created By</th>
                        <th class="d-none d-lg-table-cell">Highlight</th>
                        <th>Status</th>
                        <th class="d-none d-lg-table-cell">Last Updated By</th>
                        <th class="d-none d-lg-table-cell">Created At</th>
                        <th class="d-none d-lg-table-cell">Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allNews as $news) : ?>
                        <?php if (!isset($news['news_id'])) break; ?>
                        <tr>
                            <td><?= $news['news_id'] ?></td>
                            <td>
                                <a class="text-dark" href="/admin/news/view.php?id=<?= $news['news_id'] ?>"> <?= $news['title'] ?></a>
                            </td>
                            <td class="d-none d-lg-table-cell"><?= $news['created_by'] ?></td>
                            <td class="d-none d-lg-table-cell"><?= $news['highlight'] ?></td>
                            <td>
                                <span class="<?= $news['status'] == 'published' ? 'badge badge-success' :  'badge badge-danger';  ?>"><?= $news['status'] ?></span>
                            </td>
                            <td class="d-none d-lg-table-cell"><?= $news['updated_by'] ?></td>
                            <td class="d-none d-lg-table-cell"><?= $news['created_at'] ?></td>
                            <td class="d-none d-lg-table-cell"><?= $news['updated_at'] ?></td>

                            <!-- <td class="d-none d-lg-table-cell"></td> -->
                            <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a href="view.php?id=<?= $news['news_id'] ?>">Edit</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a class="delete" href="delete.php" data-id=<?= $news['news_id'] ?> data-toggle="modal" data-target="#exampleModal">Remove</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Pagination -->
            <!-- <nav class="justify-content-center d-flex">
                <ul class="pagination">
                    <li class="page-item <?= $_GET['page'] == 1 ? "disabled" : "" ?>">
                        <a class="page-link" href="index.php?page=<?= $_GET['page'] - 1 ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $allNews['total_pages']; $i++) : ?>
                        <li class="page-item <?= $_GET['page'] == $i ? "active" : "" ?>"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item <?= $_GET['page'] == $allNews['total_pages'] ? "disabled" : "" ?>">
                        <a class="page-link" href="index.php?page=<?= $_GET['page'] + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav> -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ًWarning</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            This record will be deleted permanently.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form id="deleteForm" method="post" action="delete.php">
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>




</body>

</html>