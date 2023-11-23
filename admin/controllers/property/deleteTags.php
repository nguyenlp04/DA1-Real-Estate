<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../models/tags.php');
include(__DIR__ . '/../../../config/config.php');
$idtags = $_GET['tag_id'];
 $database = new Database();
 $Tags = new Tags($database);
 $result = $Tags->deleteTags($idtags);
?>