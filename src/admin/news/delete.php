<?php
session_start();
include_once '../class/News.php';

$news = new News();
$news->delete($_POST['id']);
