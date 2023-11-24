<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/property.php');
include(__DIR__ . '/../../inc/footerDashboard.php');
$propertyId = $_POST["propertyId"];
$newStatus = $_POST["newStatus"];
echo 123;
echo $propertyId;
echo $newStatus;
$database = new Database();
$seNewStatus = new Property($database);
$result = $seNewStatus->updateStatus($propertyId, $newStatus);
echo '<script type="text/javascript">
           window.location = "listProperty";
</script>';
?>