<?php

class Statistical
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public function totalRevenue()
    {
        $totalRevenue = "SELECT SUM(payment) AS totalRevenue FROM transactions";
        $result = $this->db->query($totalRevenue);
        if ($result) {
            $row = $result->fetch_assoc();
            $totalRevenue = $row['totalRevenue'];
        } else {
            $totalRevenue = 0;
        }
    
        return $totalRevenue;
    }

    public  function totalTransactions()
    {
        $totalTransactions = "SELECT COUNT(*) AS totalTransactions FROM transactions";
        $result = $this->db->query($totalTransactions);
        if ($result) {
            $row = $result->fetch_assoc();
            $totalTransactions = $row['totalTransactions'];
        } else {
            $totalTransactions = 0;
        }
        return $totalTransactions;
    }

    public  function totalProperties()
    {
        $totalProperties = "SELECT COUNT(*) AS totalProperties FROM properties WHERE status = 'Đã duyệt'";
        $result = $this->db->query($totalProperties);
        if ($result) {
            $row = $result->fetch_assoc();
            $totalProperties = $row['totalProperties'];
        } else {
            $totalProperties = 0;
        }
        return $totalProperties;
    }
    public  function totalUsers()
    {
        $totalUsers = "SELECT COUNT(*) AS totalUsers FROM users";
        $result = $this->db->query($totalUsers);
        if ($result) {
            $row = $result->fetch_assoc();
            $totalUsers = $row['totalUsers'];
        } else {
            $totalUsers = 0;
        }
        return $totalUsers;
    }
    public  function topSellers()
    {
        $date = getdate();
        $target_month = $date['mon'];
        $sql = "SELECT
        users.full_name,
        users.avatar,
        SUM(transactions.payment) AS totalRevenue
        FROM
            transactions
        JOIN
            users ON transactions.seller_id = users.user_id
        WHERE MONTH(transactions.transaction_date) = MONTH(CURRENT_DATE())
            AND YEAR(transactions.transaction_date) = YEAR(CURRENT_DATE())
        GROUP BY
            users.user_id, users.username, users.full_name, users.email
        ORDER BY
            totalRevenue DESC
        LIMIT 5
        ";
            $result = $this->db->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while ($item = $result->fetch_assoc()) {
                    $data[] = $item;
                }
            }
            return $data;
        }
}
?>