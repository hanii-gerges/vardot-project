<?php
session_start();
include_once '../class/SocialLink.php';
include_once '../authinticate.php';

$link = new SocialLink();



if (isset($_POST['update'])) {
    $link->update($_POST);
}
