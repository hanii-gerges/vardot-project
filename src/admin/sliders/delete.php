<?php
session_start();
include_once '../class/Slider.php';
include_once '../authinticate.php';

$slider = new Slider();
$slider->delete($_POST['id']);
