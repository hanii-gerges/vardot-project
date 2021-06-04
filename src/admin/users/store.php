<?php
session_start();
include_once '../class/User.php';

$user = new User();



if (isset($_POST['create'])) {
    $user->store($_POST);
}
