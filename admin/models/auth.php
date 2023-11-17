<?php

class Tags
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public function signUp()
    {
        $errors = [];
        $success = "block";
        $name = $_POST["name"];
        $description = $_POST["description"];

        if (empty($name)) {
            $errors["name"] = "Tags không được để trống";
        } 

        if (empty($errors)) {
            $sql = "INSERT INTO `property_tags` (`tag_name`,`tag_description`) VALUES('$name','$description')";
            if ($this->db->query($sql) === TRUE) {
                return $success;
            } else {
                $errors["errors"] = $this->db->error;
                return $errors;
            }
        } else {
            return $errors;
        }
    }



}
