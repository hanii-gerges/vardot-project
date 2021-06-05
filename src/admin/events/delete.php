<?php
session_start();
include_once '../class/Event.php';
include_once '../authinticate.php';

$event = new Event();
$event->delete($_POST['id']);
