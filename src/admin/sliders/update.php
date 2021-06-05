<?php
session_start();
include_once '../class/Slider.php';

$slider = new Slider();



if (isset($_POST['update'])) {
    $slider->update($_POST);
}
