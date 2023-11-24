<?php 

class Transaction
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }
    public function listContract(){
        $sql = "
            SELECT 
                transactions.*, 
                customer_user.full_name AS customer_fullname, 
                seller_user.full_name AS seller_fullname
            FROM 
                transactions
            INNER JOIN 
                users AS customer_user ON transactions.customer_id = customer_user.user_id
            INNER JOIN 
                users AS seller_user ON transactions.seller_id = seller_user.user_id;
        ";
        
        $result = $this->db->query($sql);
        $contracts = [];
    
        if ($result === false) {
            die("có Lỗi Khi truy vấn " . $this->db->error);
        }
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contracts[] = $row;
            }
        }
    
        return $contracts;
    }
    
    public function getTransactionById($contractid)
    {
        $sql = "
            SELECT 
                transactions.*, 
                customer_user.full_name AS customer_fullname, 
                customer_user.phone_number AS customer_phone,
                customer_user.address_user AS customer_address,
                customer_user.birth_user AS customer_birth,
                seller_user.full_name AS seller_fullname,
                seller_user.phone_number AS seller_phone,
                seller_user.address_user AS seller_address,
                seller_user.birth_user AS seller_birth,
                properties.price AS property_price,
                properties.location AS property_location,
                properties.built_in AS property_builtin,
                properties.acreage AS property_acreage

            FROM 
                transactions
            INNER JOIN 
                users AS customer_user ON transactions.customer_id = customer_user.user_id
            INNER JOIN 
                users AS seller_user ON transactions.seller_id = seller_user.user_id
            INNER JOIN 
                properties ON transactions.property_id = properties.property_id
            WHERE 
                transactions.transaction_id = $contractid;
        ";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null; // Transaction not found
        }
    }

    public  function renderNegotiations()
    {
        $query = "SELECT 
        properties.title AS property_title,
        properties.property_id AS property_id,
        users_seller.full_name AS seller_name,
        users_buyer.full_name AS buyer_name,
        properties.price,
        negotiations.negotiation_id,
        negotiations.price_offered,
        negotiations.status,
        negotiations.created_at
        FROM negotiations
        JOIN properties ON negotiations.property_id = properties.property_id
        JOIN users AS users_seller ON negotiations.seller_id = users_seller.user_id
        JOIN users AS users_buyer ON negotiations.customer_id = users_buyer.user_id;
    ";
        $result = $this->db->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }
    public function updateStatus($negotiationId, $newStatus)
    {
        // Escape variables and use single quotes for string values
        $negotiationId = $this->db->real_escape_string($negotiationId);
        $newStatus = $this->db->real_escape_string($newStatus);
    
        // Build the SQL query
        $sql = "UPDATE negotiations SET `status` = '$newStatus' WHERE `negotiation_id` = '$negotiationId'";
        
        // Execute the query
        $this->db->query($sql);
    }

    public  function renderNegotiationsByUser($id)
    {
        $query = "SELECT 
        properties.title AS property_title,
        properties.property_id AS property_id,
        users_seller.full_name AS seller_name,
        users_buyer.full_name AS buyer_name,
        properties.price,
        negotiations.negotiation_id,
        negotiations.price_offered,
        negotiations.status,
        negotiations.created_at
        FROM negotiations
        JOIN properties ON negotiations.property_id = properties.property_id
        JOIN users AS users_seller ON negotiations.seller_id = users_seller.user_id
        JOIN users AS users_buyer ON negotiations.customer_id = users_buyer.user_id
        WHERE customer_id = $id;
    ";
        $result = $this->db->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }
   
    

}