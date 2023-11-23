<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../models/property.php');
include(__DIR__ . '/../../../config/config.php');
$idproperty = $_GET['property_id'];
 $database = new Database();
 $Property = new Property($database);
 $result = $Property->deleteProperty($idproperty);
?>