<?php
session_start();
include_once '../class/Event.php';

$event = new Event();
$event->delete($_POST['id']);
