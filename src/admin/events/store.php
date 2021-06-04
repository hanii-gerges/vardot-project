<?php
session_start();
include_once '../class/Event.php';

$event = new Event();



if (isset($_POST['create'])) {
    $event->store($_POST);
}
