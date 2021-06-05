<?php
session_start();
include_once '../class/Message.php';

$message = new Message();



if (isset($_POST['update'])) {
    $message->update($_POST);
}
