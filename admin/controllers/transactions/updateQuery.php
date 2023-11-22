<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/contract.php');
include(__DIR__ . '/../../inc/footerDashboard.php');
$negotiationId = $_POST["negotiationId"];
$newStatus = $_POST["newStatus"];
echo $negotiationId;
echo $newStatus;
$database = new Database();
$Negotiation = new Transaction($database);
$result = $Negotiation->updateStatus($negotiationId, $newStatus);
echo '<script type="text/javascript">
           window.location = "negotiations";
      </script>';
?>