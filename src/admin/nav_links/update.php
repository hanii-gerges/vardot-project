<?php
session_start();
include_once '../class/NavLink.php';
include_once '../authinticate.php';

$link = new NavLink();



if (isset($_POST['update'])) {
    $link->update($_POST);
}
