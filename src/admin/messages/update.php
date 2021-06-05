<?php
session_start();
include_once '../class/Message.php';
include_once '../authinticate.php';

$message = new Message();



if (isset($_POST['update'])) {
    $message->update($_POST);
}
