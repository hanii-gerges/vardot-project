<?php
session_start();
include_once '../class/Message.php';
include_once '../authinticate.php';

$message = new Message();

// get all messages
$messages = $message->all();

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
            <h1>Messages</h1>
        </div>
        <div class="card-body pt-0 pb-5">
            <table id="messagesTable" class="hover row-border table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>Message ID</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th class="d-none d-lg-table-cell">Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message) : ?>
                        <?php if (!isset($message['message_id'])) break; ?>
                        <tr class="<?= $message['status'] == 'read' ? 'read' : '' ?>">
                            <td>
                                <a class="stretched-link" href="view.php?id=<?= $message['message_id'] ?>">
                                <?= $message['message_id'] ?>
                            </a>
                            </td>
                            <td>
                                <?= $message['fullname'] ?>
                            </td>
                            <td class="d-none d-lg-table-cell"><?= $message['email'] ?></td>
                            <td class="d-none d-lg-table-cell"><?= $message['created_at'] ?></td>
                            <!-- <td class="d-none d-lg-table-cell"></td> -->
                            <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a class="delete" href="delete.php" data-id=<?= $message['message_id'] ?> data-toggle="modal" data-target="#exampleModal">Remove</a>
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
                    <?php for ($i = 1; $i <= $messages['total_pages']; $i++) : ?>
                        <li class="page-item <?= $_GET['page'] == $i ? "active" : "" ?>"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item <?= $_GET['page'] >= $messages['total_pages'] ? "disabled" : "" ?>">
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
    <?php include '../footer.php' ?>

</body>

</html>