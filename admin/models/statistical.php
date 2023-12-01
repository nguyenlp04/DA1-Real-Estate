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
            AND users.roles != 'user'
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

    public  function RecentSixMonthsRevenue()
    {
        $sql = "SELECT 
            YEAR(transaction_date) AS transaction_year,
            MONTH(transaction_date) AS transaction_month,
            SUM(payment) AS total_payment
        FROM transactions
        WHERE transaction_date >= CURDATE() - INTERVAL 6 MONTH
        GROUP BY transaction_year, transaction_month";

        $result = $this->db->query($sql);

        // Fetch data and store in an associative array
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
