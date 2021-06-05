<?php
session_Start();
include_once '../class/User.php';

$user = new User();


if (isset($_POST['login'])) {
    $user->login($_POST);
}