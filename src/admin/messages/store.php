<?php
session_start();
include_once '../class/Message.php';

$message = new Message();



if (isset($_POST['submit'])) {
    $message->store($_POST);
}
