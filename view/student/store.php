<?php
include_once '../../vendor/autoload.php';
$bazar = new App\admin\Bazar;
$bazar->set($_POST);
$bazar->store();

?>