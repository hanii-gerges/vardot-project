<?php
session_Start();
include_once '../class/User.php';
include_once '../authinticate.php';

$user = new User();



if (isset($_POST['update'])) {
    $user->update($_POST);
}