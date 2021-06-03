<?php
session_start();
include_once '../class/User.php';

$user = new User();
$user->delete($_POST['id']);
