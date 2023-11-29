<?php

class Transaction
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }
    public function listContract()
    {
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
        properties.type,
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

        $sqlGetInfo = "SELECT 
        properties.property_id,
        properties.title,
        users_customer.full_name AS customer_name,
        users_customer.email AS customer_email,
        users_seller.full_name AS seller_name,
        users_seller.email AS seller_email
        FROM 
            negotiations
        JOIN 
            properties ON negotiations.property_id = properties.property_id
        JOIN 
            users AS users_customer ON negotiations.customer_id = users_customer.user_id
        JOIN 
            users AS users_seller ON negotiations.seller_id = users_seller.user_id
        WHERE 
            negotiations.property_id = $negotiationId;
        ";
        $result = $this->db->query($sqlGetInfo);

        // Check if the query was successful
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Extract information from the result
            $propertyId = $row['property_id'];
            $propertyName = $row['title'];
            $customerName = $row['customer_name'];
            $customerEmail = $row['customer_email'];
            $sellerName = $row['seller_name'];
            $sellerEmail = $row['seller_email'];

            if ($newStatus == 'Từ chối') {
                $message = '<p><strong>Chào' . $customerName . '</strong></p>

            <p>Chúng tôi xin thông báo rằng sau khi xem xét kỹ lưỡng và cân nhắc, chúng tôi quyết định từ chối điều khoản thương lượng của bạn về bất động sản. Chúng tôi cảm ơn bạn đã chia sẻ đề xuất và sự quan tâm của bạn đối với giao dịch này.</p>
            <p>Lý do chính cho quyết định từ chối có thể bao gồm những yếu tố như không đồng ý về giá cả, điều kiện thanh toán, hoặc các điều khoản khác liên quan đến giao dịch.</p>
            <p>Chúng tôi đánh giá sự cố gắng và thời gian bạn đã đầu tư vào quá trình thương lượng và hiểu rằng có thể có những ý kiến khác nhau về các yếu tố quan trọng.</p>
            <p>Nếu có bất kỳ câu hỏi hoặc nếu bạn muốn biết thêm chi tiết về quyết định từ chối, vui lòng liên hệ với chúng tôi. Chúng tôi sẽ cố gắng giải đáp mọi thắc mắc của bạn.</p>
            <p>Chúng tôi chúc bạn may mắn trong các giao dịch tương lai và cảm ơn bạn vì sự hiểu biết.</p>
            <p>Trân trọng,<br>
            ' . $sellerName . '<br>
            ' . $sellerEmail . '</p>';
            } else {
                $message = '<p><strong>Chào ' . $customerName . '</strong></p>
            <p>Chúng tôi xin thông báo rằng chúng tôi đã xem xét và đồng ý với điều khoản thương lượng của bạn về bất động sản. Đây là một bước quan trọng và chúng tôi mong muốn hợp tác với bạn để hoàn tất quá trình này.</p>
            <p>Thông tin chi tiết về thỏa thuận đã được gửi đính kèm trong tệp đính kèm hoặc có sẵn tại [đường dẫn đến tệp].</p>
            <p>Nếu có bất kỳ câu hỏi hoặc yêu cầu bổ sung, vui lòng liên hệ với chúng tôi ngay lập tức để chúng tôi có thể cung cấp hỗ trợ và giải đáp mọi thắc mắc của bạn.</p>
            <p>Chúng tôi mong đợi một quá trình thương lượng mượt mà và chân thành cảm ơn sự quan tâm và sự hợp tác của bạn.</p>
            <p>Trân trọng,<br>
            ' . $sellerName . '<br>
            ' . $sellerEmail . '</p>';
            }
            $user_email = 'nguyenlppd07982@fpt.edu.vn';
            $subject = 'Xác nhận ' . $newStatus . ' Thương lượng Bất động sản ' . $propertyName . '';
            $user_name = $customerName;
            send_email($user_email, $subject, $message, $user_name);
        }
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

    public  function renderPropertyById($id)
    {
        $query = "SELECT properties.*, users.full_name, property_tags.tag_name FROM properties
          LEFT JOIN users ON properties.user_id = users.user_id
          LEFT JOIN property_tags ON properties.tag_id = property_tags.tag_id
          WHERE properties.user_id = $id";
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
