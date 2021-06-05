<?php
session_start();
include_once '../class/News.php';
include_once '../authinticate.php';

$news = new News();



if (isset($_POST['update'])) {
    $news->update($_POST);
}
