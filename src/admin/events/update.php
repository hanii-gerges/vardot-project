<?php
session_start();
include_once '../class/Event.php';

$event = new Event();



if (isset($_POST['update'])) {
    $event->update($_POST);
}
