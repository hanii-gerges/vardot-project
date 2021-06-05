<?php
session_start();
include_once '../class/Event.php';
include_once '../authinticate.php';

$event = new Event();



if (isset($_POST['create'])) {
    $event->store($_POST);
}
