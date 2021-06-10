<?php
session_start();
include_once '../class/MetaContent.php';
include_once '../authinticate.php';

$metaContent = new MetaContent();



if (isset($_POST['update'])) {
    $metaContent->update($_POST);
}
