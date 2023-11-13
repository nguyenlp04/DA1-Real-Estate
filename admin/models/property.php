<?php

class Property
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public  function renderProperpty()
    {
        $query = "SELECT properties.*, users.full_name FROM properties
          LEFT JOIN users ON properties.user_id = users.user_id";
        $result = $this->db->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }

    public  function deleteProperpty($idproperty)
    {
        $sql = "SELECT * FROM properties WHERE property_id ='$idproperty'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 1) {
            $delete = "DELETE FROM properties WHERE property_id ='$idproperty'";
            if ($this->db->query($delete) === TRUE) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } 
        }
        echo "Không tìm thấy dữ liệu";
        exit;
    }


}
