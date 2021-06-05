<?php
session_start();
include_once '../class/Message.php';

$message = new Message();
$message->delete($_POST['id']);
