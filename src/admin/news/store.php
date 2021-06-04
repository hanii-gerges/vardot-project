<?php
session_start();
include_once '../class/News.php';

$news = new News();



if (isset($_POST['create'])) {
    $news->store($_POST);
}
