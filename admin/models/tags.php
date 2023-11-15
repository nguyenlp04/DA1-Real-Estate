<?php

class Tags
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public function addTags()
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

    public  function renderTags()
    {
        $query = "SELECT * FROM property_tags";
        $result = $this->db->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }

    
    public  function deleteTags($idtags)
    {
        $sql = "SELECT * FROM property_tags WHERE tag_id ='$idtags'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 1) {
            $delete = "DELETE FROM property_tags WHERE tag_id ='$idtags'";
            if ($this->db->query($delete) === TRUE) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } 
        }
        echo "Không tìm thấy dữ liệu";
        exit;
    }


}
