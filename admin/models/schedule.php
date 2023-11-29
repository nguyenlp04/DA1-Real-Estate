<?php

class Schedule
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public function scheduletour($idproperty)
    {
        $errors = [];
        if (isset($_SESSION['user_info']) && isset($_POST['submitScheduletour'])) {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_phone = $_POST['user_phone'];
            $date = $_POST['date'];

            $user_message = isset($_POST['user_message']) ? $_POST['user_message'] : "";
            if (empty($_SESSION['user_info'])) {
                $errors["session_user_info"] = "Vui lòng đăng nhập để thương lượng";
            }
            if (empty($user_name)) {
                $errors["user_name"] = "Tên không được để trống";
            }
            if (empty($user_email)) {
                $errors["user_email"] = "Email không được để trống";
            }
            if (empty($user_phone)) {
                $errors["user_phone"] = "Số điện thoại không được để trống";
            }
            if (empty($date)) {
                $errors["date"] = "Thời gian không được để trống";
            }
            $user_message = isset($_POST['user_message']) ? $_POST['user_message'] : "";
            if (empty($errors)) {
                $sql = "SELECT * FROM properties 
                JOIN users ON users.user_id = properties.user_id
                WHERE property_id ='$idproperty'";
                $result = $this->db->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $property_id = $row['property_id'];
                    $full_name = $row['full_name'];
                    $phone = $row['phone_number'];
                    $email = $row['email'];
                    $address = $row['location'];
                    $seller_id = $row['user_id'];
                    $customer_id = $_SESSION['user_info']['user_id'];
                    $status = "Đã gửi";
                    $created_at = date('Y-m-d');
                    $sql = "INSERT INTO schedule_tour (`property_id`, `seller_id`, `customer_id`, `status`, `message`, `created_at`)
                    VALUES ('$property_id', '$seller_id', '$customer_id', '$status', '$user_message', '$created_at')";
                    $this->db->query($sql);
                    $subject = 'Lịch trình tham quan bất động sản';

                    $message = '<p>Chào Anh/Chị ' . $user_name . ',</p>
                <p>
                    Tôi mong rằng bạn đang có một ngày tốt lành. Tên tôi là ' . $full_name . '.
                </p>
                <p>
                Tôi xin gửi đến bạn lịch trình tham quan bất động sản mà bạn đã quan tâm. Rất mong sự xuất hiện của bạn để khám phá và cảm nhận trực tiếp về bất động sản này. Dưới đây là thông tin chi tiết về lịch trình:
                </p>
                <ol>
                    <li>
                        <strong>Họ và tên:</strong>
                        <p>' . $user_name . '</p>
                    </li>
                    <li>
                        <strong>Email:</strong>
                        <p>' . $user_email . '</p>
                    </li>
                    <li>
                        <strong>Ngày tham quan:</strong>
                        <p>' . $date . '</p>
                    </li>
                    <li>
                        <strong>Địa chỉ:</strong>
                        <p>' . $address . '</p>
                    </li>
                    <li>
                        <strong>Lời nhắn:</strong>
                        <p>' . $user_message . '</p>
                    </li>
                </ol>
               <p>Vui lòng đảm bảo bạn có đủ thời gian và sẵn sàng để tham gia tham quan. Nếu bạn gặp bất kỳ sự cố nào hoặc muốn thay đổi lịch trình, xin vui lòng thông báo cho chúng tôi trước ' . $date . ' để chúng tôi có thể điều chỉnh.</p>
                <p>Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ thêm, xin vui lòng liên hệ với chúng tôi qua số điện thoại ' . $phone . ' hoặc gửi email về địa chỉ ' . $email . '. Chúng tôi sẽ sẵn lòng giúp bạn.</p>
                <p>Chúng tôi mong chờ sự gặp mặt của bạn trong lịch trình tham quan. Xin lưu ý rằng việc tham quan bất động sản này không gây mất phí.</p>
                <p>Trân trọng,</p>
                <p>Trân trọng,<br>
                ' . $full_name . '<br>
                ' . $email . '
                </p>';


                $messageSeller = '<p>Xin chào '.$full_name.',</p>
                <p>Có một người quan tâm đến bất động sản của bạn và muốn thực hiện cuộc thăm quan. Hãy liên hệ với họ ngay để sắp xếp chi tiết:</p>
                <p>
                    Tên người quan tâm: '.$user_name.'<br>
                    Địa chỉ email: '.$user_email.'<br>
                    Số điện thoại: '.$user_phone.'
                </p>
            
                <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
            ';
                    // seller
                    send_email($email, $subject, $messageSeller, $full_name);
                    // custome
                    send_email($user_email, $subject, $message, $user_name);
                } else {
                    echo "Không tìm thấy dữ liệu";
                    exit;
                }
            } else {
                return $errors;
            }
        }
    }

    public  function renderSchedule()
    {
        $query = "SELECT
        properties.property_id AS property_id,
        properties.title AS property_title,
        properties.location AS property_location,
        properties.type AS property_type,
        users.full_name AS customer_name,
        users_seller.full_name AS seller_name,
        schedule_tour.status AS tour_status,
        schedule_tour.created_at AS tour_created_at
        FROM
            schedule_tour
        JOIN
            properties ON schedule_tour.property_id = properties.property_id
        JOIN
            users ON schedule_tour.customer_id = users.user_id
        JOIN 
            users AS users_seller ON schedule_tour.seller_id = users_seller.user_id";
    
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
