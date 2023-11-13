<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../models/user.php');
include(__DIR__ . '/../../../config/config.php');
$iduser = $_GET['user_id'];
 $database = new Database();
 $User = new User($database);
 $result = $User->deleteUser($iduser);
?>