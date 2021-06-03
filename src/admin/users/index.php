<?php
session_start();
include_once '../class/User.php';

$user = new User();

// get all users
$users = $user->all();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<?php include '../header.php' ?>

</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <?php include '../layout.php' ?>
    <div class="card card-table-border-none recent-orders" id="recent-orders">
        <div class="px-0 px-md-5 mt-5">
            <?php
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
        <div class="pt-0 mb-5 card-header justify-content-between">
            <h1>Users</h1>
        <div class="">
            <a class="h5 p-2 bg-light rounded-pill text-primarty" href="/admin/users/create.php">
                <i class="fas fa-plus"></i>
                Add New</a>
        </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <table id="usersTable" class="hover row-border table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Fullname</th>
                        <th class="d-none d-lg-table-cell">Role</th>
                        <th>Status</th>
                        <th class="d-none d-lg-table-cell">Joined At</th>
                        <th class="d-none d-lg-table-cell">Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <?php if (!isset($user['user_id'])) break; ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td>
                                <a class="text-dark" href="/admin/user/view.php?id=<?= $user['user_id'] ?>"> <?= $user['firstname'] ?> <?= $user['lastname'] ?></a>
                            </td>
                            <td class="d-none d-lg-table-cell"><?= $user['role'] ?></td>
                            <td>
                                <span class="<?= $user['status'] == 'active' ? 'badge badge-success' :  'badge badge-danger';  ?>"><?= $user['status'] ?></span>
                            </td>
                            <td class="d-none d-lg-table-cell"><?= $user['created_at'] ?></td>
                            <td class="d-none d-lg-table-cell"><?= $user['updated_at'] ?></td>

                            <!-- <td class="d-none d-lg-table-cell"></td> -->
                            <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a href="view.php?id=<?= $user['user_id'] ?>">Edit</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a class="delete" href="delete.php" data-id=<?= $user['user_id'] ?> data-toggle="modal" data-target="#exampleModal">Remove</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Pagination -->
            <nav class="mt-3 justify-content-center d-flex">
                <ul class="pagination">
                    <li class="page-item <?= $_GET['page'] == 1 || !isset($_GET['page']) ? "disabled" : "" ?>">
                        <a class="page-link" href="index.php?page=<?= $_GET['page'] - 1 ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $users['total_pages']; $i++) : ?>
                        <li class="page-item <?= $_GET['page'] == $i ? "active" : "" ?>"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item <?= $_GET['page'] >= $users['total_pages'] ? "disabled" : "" ?>">
                        <a class="page-link" href="index.php?page=<?= $_GET['page'] + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
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