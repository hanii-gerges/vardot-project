<?php
session_start();
include_once '../class/User.php';
include_once '../authinticate.php';
include_once '../authorize.php';

$user = new User();
$user->unblock($_POST['id']);
