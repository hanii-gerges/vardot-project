<?php
include_once '../class/User.php';

$user = new User();
$media = $user->getMedia($_SESSION['user_id']);

if (!$user->loggedIn()) {
  header('Location:/admin/users/login.php');
}
