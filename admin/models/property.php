<?php


class Property
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->conn;
    }

    public function addProperty()
    {
        $errors = [];
        $success = "block";

        $title = $_POST["title"];
        $property_price = intval($_POST["property_price"]);
        $property_type = $_POST["property_type"];
        $property_area = intval($_POST["property_area"]);
        $property_bed = intval($_POST["property_bed"]);
        $property_year = intval($_POST["property_year"]);
        $property_bath = intval($_POST["property_bath"]);
        $property_wifi = intval($_POST["property_wifi"]);
        $property_conditioner = intval($_POST["property_conditioner"]);
        $property_tv = intval($_POST["property_tv"]);
        $property_cam = intval($_POST["property_cam"]);
        $city = $_POST['city'];
        $district = $_POST['district'];
        $wards = $_POST['wards'];
        $addressDetail = $_POST['addressDetail'];
        $address = $addressDetail . ", " . $wards . ", " . $district . ", " . $city;
        $description = $_POST["description"];
        $status = 'Đã duyệt';

        // if (empty($title)) {
        //     $errors["title"] = "Tên không được để trống";
        // }
        // if (empty($property_price)) {
        //     $errors["property_price"] = "Giá không được để trống";
        // }
        // if (empty($property_year)) {
        //     $errors["property_year"] = "Năm xây dựng không được để trống";
        // }

        // if (empty($city)) {
        //     $errors["city"] = "Thành phố không được để trống";
        // }

        // if (empty($district)) {
        //     $errors["district"] = "Quận không được để trống";
        // } 

        // if (empty($wards)) {
        //     $errors["wards"] = "Phường/Xã không được để trống";
        // } 

        // if (empty($addressDetail)) {
        //     $errors["addressDetail"] = "Địa chỉ chi tiết không được để trống";
        // }




        $propertyImage = $_FILES["floorPlanImage"];
        $fileNameFloorPlan = $propertyImage["name"];
        if ($fileNameFloorPlan != "") {
            $path = basename($_FILES['floorPlanImage']['name']);
        } else {
            $path = "property.jpeg";
        }
        $target_dir = dirname(__FILE__) . '/../../assets/images/imgproperty/';
        $target_file = $target_dir . $path;
        if (move_uploaded_file($_FILES["floorPlanImage"]["tmp_name"], $target_file)) {
            $imgFloorPlanPath = '/' . $path;
        } else {
            $imgFloorPlanPath = '/property.jpeg';
        }
        if (empty($errors)) {
            $sql = "INSERT INTO properties (`title`, `price`, `type`, `acreage`, `beds`, `built_in`, `baths`, `wifi`, `conditioner`, `tivis`, `cameras`, `location`, `floor_plans`, `description`, `status`, `views`)
            VALUES ('$title', '$property_price', '$property_type', '$property_area', '$property_bed', '$property_year', '$property_bath', '$property_wifi', '$property_conditioner', '$property_tv', '$property_cam', '$address', '$imgFloorPlanPath', '$description', '$status', 0)";
            $this->db->query($sql);
            $propertyImage = $_FILES["propertyImage"];
            $propertyID = $this->db->insert_id;
            if (is_array($propertyImage) && !empty($propertyImage['name'][0])) {
                $imagePaths = [];
                foreach ($propertyImage['tmp_name'] as $key => $tmp_name) {
                    $imageName = $this->db->real_escape_string($propertyImage['name'][$key]);
                    $targetPath = dirname(__FILE__) . '/../../assets/images/imgproperty/' . $imageName;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $imagePaths[] = '/' . $imageName;
                    } else {
                        echo "Không thể chuyển tập tin.";
                    }
                }
                foreach ($imagePaths as $imagePath) {
                    $imagePath = $this->db->real_escape_string($imagePath);
                    $imageQuery = "INSERT INTO images (property_id, image_url) VALUES ($propertyID, '$imagePath')";
                    $this->db->query($imageQuery);
                }
            }
            if ($this->db->query($sql) === TRUE && $this->db->query($imageQuery) === TRUE) {
                return $success;
            } else {
                $errors["errors"] = $this->db->error;
                return $errors;
            }
        } else {
            return $errors;
        }
    }

    public  function renderProperty()
    {
        $query = "SELECT properties.*, users.full_name, property_tags.tag_name FROM properties
          LEFT JOIN users ON properties.user_id = users.user_id
          LEFT JOIN property_tags ON properties.tag_id = property_tags.tag_id";
        $result = $this->db->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }

    public  function renderPropertyDetail($id)
    {
        $updateViewsQuery = "UPDATE properties SET views = views + 1 WHERE property_id = $id";
        $this->db->query($updateViewsQuery);
        $query = "SELECT properties.*, users.full_name, property_tags.tag_name, users.roles, users.full_name, users.address_user, users.phone_number, users.email, users.avatar  FROM properties
          LEFT JOIN users ON properties.user_id = users.user_id
          LEFT JOIN property_tags ON properties.tag_id = property_tags.tag_id
          WHERE property_id = $id";
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            $item = $result->fetch_assoc();
        }
        return $item;
    }


    public  function renderImagePropertyDetail($id)
    {

        $query = "SELECT images.image_url  FROM properties
          LEFT JOIN images ON properties.property_id = images.property_id
          WHERE properties.property_id = $id";
        $result = $this->db->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $data[] = $item;
            }
        }
        return $data;
    }



    public  function deleteProperty($idproperty)
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

    public  function negotiate($idproperty)
    {
        // $errorsNegotiate = "Vui lòng đăng nhập để thương lượng";
        $errors = [];
        if (isset($_SESSION['user_info']) && isset($_POST['submitNegotiations'])) {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $price_offered = $_POST['price_offered'];

            if (empty($_SESSION['user_info'])) {
                $errors["session_user_info"] = "Vui lòng đăng nhập để thương lượng";
            }
            if (empty($user_name)) {
                $errors["user_name"] = "Tên không được để trống";
            }
            if (empty($user_email)) {
                $errors["user_email"] = "Email không được để trống";
            }
            if (empty($price_offered)) {
                $errors["price_offered"] = "Giá mong muốn không được để trống";
            }
            if (empty($errors)) {
            $user_message = isset($_POST['user_message']) ? $_POST['user_message'] : "";
            $sql = "SELECT * FROM properties WHERE property_id ='$idproperty'";
            $result = $this->db->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $property_id = $row['property_id'];
                $seller_id = $row['user_id'];
                $customer_id = 6;
                $status = "Đang thương lượng";
                $created_at = date('Y-m-d');
                $sql = "INSERT INTO negotiations (`property_id`, `seller_id`, `customer_id`, `price_offered`, `status`, `message`, `created_at`)
                    VALUES ('$property_id', '$seller_id', '$customer_id', '$price_offered', '$status', '$user_message', '$created_at')";
                $this->db->query($sql);
            } else {
                echo "Không tìm thấy dữ liệu";
                exit;
            }
        } else {
            return $errors;
        }
    }}
}
