<?php
session_start();
include_once '../class/Message.php';
include_once '../authinticate.php';

$message = new Message();
$message->delete($_POST['id']);
