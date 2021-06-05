<?php
session_start();
include_once '../class/Slider.php';
include_once '../authinticate.php';

$slider = new Slider();



if (isset($_POST['update'])) {
    $slider->update($_POST);
}
