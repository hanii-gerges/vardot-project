<?php
session_start();
include_once '../class/User.php';
include_once '../authinticate.php';
include_once '../authorize.php';


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
                                 <?= $user['firstname'] ?> <?= $user['lastname'] ?>
                            </td>
                            <td class="d-none d-lg-table-cell"><?= $user['role'] ?></td>
                            <td>
                                <span class="<?= $user['status'] == 'active' ? 'badge badge-success' :  'badge badge-danger';  ?>"><?= $user['status'] ?></span>
                            </td>
                            <td class="d-none d-lg-table-cell"><?= $user['created_at'] ?></td>
                            <td class="d-none d-lg-table-cell"><?= $user['updated_at'] ?></td>

                            <!-- <td class="d-none d-lg-table-cell"></td> -->
                            <td class="text-right">
                                <?php if ($user['role'] == 'editor') : ?>
                                    <?php if($user['status'] == 'active'): ?>
                                    <a class="delete btn btn-danger p-1" href="block.php" data-id=<?= $user['user_id'] ?> data-toggle="modal" data-target="#modal1">Block</a>
                                    <?php else: ?>
                                    <a class="unblock btn btn-success p-1" href="unblock.php" data-id=<?= $user['user_id'] ?> data-toggle="modal" data-target="#modal2">Unblock</a>
                                    <?php endif; ?>
                                <?php endif; ?>
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
            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ًWarning</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to block this user?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form id="blockForm" method="post" action="block.php">
                                <button type="submit" class="btn btn-danger" name="block">Block</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ًWarning</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to unblock this user?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form id="unblockForm" method="post" action="unblock.php">
                                <button type="submit" class="btn btn-success" name="unblock">Unblock</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    <?php include '../footer.php' ?>

</body>

</html>