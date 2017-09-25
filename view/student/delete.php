
<?php
include_once '../../vendor/autoload.php';
$student = new App\admin\Bazar();
$student->delete($_GET['id']);

?>