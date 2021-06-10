<?php
session_start();
include_once '../class/NavLink.php';
include_once '../authinticate.php';

$link = new NavLink();
$link->delete($_POST['id']);
