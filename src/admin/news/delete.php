<?php
session_start();
include_once '../class/News.php';
include_once '../authinticate.php';

$news = new News();
$news->delete($_POST['id']);
