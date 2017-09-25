<?php 
include_once '../includes/header.php';
include_once '../../vendor/autoload.php';
$student = new App\admin\Bazar();
$data = $student->view($_GET['id']);
?>