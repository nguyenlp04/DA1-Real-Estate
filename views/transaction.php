<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../admin/models/contract.php');
include(__DIR__ . '/../admin/models/property.php');
include 'inc/header.php';
$database = new Database();
if (isset($_POST['submitSetStatusNegotiation'])) {
    $negotiationId = $_POST["negotiationId"];
    $newStatus = $_POST["newStatus"];
    echo $negotiationId;
    echo $newStatus;
    $Negotiation = new Transaction($database);
    $result = $Negotiation->updateStatus($negotiationId, $newStatus);
}

// if (isset($_POST['submit']) {
//     $idproperty = $_GET['property_id'];
//  $database = new Database();
//  $Property = new Property($database);
//  $result = $Property->deleteProperty($idproperty);
// }
// // echo '<script type="text/javascript">
// //            window.location = "negotiations";
// //       </script>';
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<section>
    <div class="container">
        <div class="path-page"><a href="home">Trang chủ </a><i class="fa-solid fa-angle-right"></i>
            <p>Giao dịch</p>
        </div>
        <div class="container d-block  ">
            <div class="row ">
                <div class="col-12">
                    <ul class="nav nav-pills rounded-2 d-flex justify-content-center">
                        <li class="nav-item "><a href="#tab2-1" class="nav-link active" data-toggle='tab'>Thương
                                lượng</a></li>
                        <li class="nav-item"><a href="#tab2-2" class="nav-link " data-toggle='tab'>Bất động sản</a></li>

                        <li class="nav-item"><a href="#tab2-4" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-5" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-6" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- tab 1 -->
                        <div class="tab-pane  mt-5 fade show active" id='tab2-1'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên BĐS</th>
                                                    <th>Người bán</th>
                                                    <th>Người mua</th>
                                                    <th>Giá</th>
                                                    <th>Giá Đề xuất</th>
                                                    <th>Trạng thái</th>
                                                    <th>Ngày tạo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $stt = 1;
                                                $database = new Database();
                                                $Negotiation = new Transaction($database);
                                                if(isset($_SESSION['user_info'])){
                                                    $id = $_SESSION['user_info']['user_id'];
                                                } else {
                                                    $id = 0;
                                                }
                                                $result = $Negotiation->renderNegotiationsByUser($id);
                                                foreach ($result as $row) {
                                                    $statusColor = ($row['status'] === 'Chấp nhận') ? '#e67e22' : (($row['status'] === 'Đang thương lượng') ? '#0984e3' : '#e74c3c');
                                                    if($row['seller_id'] != $id){
                                                        $noneEdit = "d-none";
                                                    } else {
                                                        $noneEdit = "";
                                                    }
                                                    echo '<tr>
                                    <td>' . $stt . '</td>
                                    <td><a href="propertyDetail?id=' . $row['property_id'] . '">' . $row['property_title'] . '</a></td>
                                    <td>' . $row['seller_name'] . '</td>
                                    <td>' . $row['buyer_name'] . '</td>
                                    <td>' . $row['price'] . '$</td>
                                    <td>' . $row['price_offered'] . '$</td>
                                    <td><span style="color: black; text-transform: none;color: white;display:inline-block; border-radius: 0.375rem; padding: 5px; background-color: ' . $statusColor . '">' . $row['status'] . '
                                    <i class="fa-solid fs-5 fa-pen-to-square overlay mr-2 '.$noneEdit.'" style="color: blue;" data-toggle="modal" data-target="#propertyModal' . $row['negotiation_id'] . '"></i></span></td>
                                    <td>' . $row['created_at'] . '</td>
                                </tr>
                                <div class="modal" id="propertyModal' . $row['negotiation_id'] . '">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Chỉnh sửa trạng thái</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                            <form id="editForm" method="post" action="">
                                            <label for="newStatus">Chọn trạng thái mới:</label>
                                                    <select id="newStatus" name="newStatus" class="form-control">
                                                        <option value="Chấp nhận">Chấp nhận</option>
                                                        <option value="Từ chối">Từ chối</option>
                                                    </select>
                                                    <input type="hidden" id="negotiationId" name="negotiationId" value="' . $row['negotiation_id'] . '">

                                                    <button name="submitSetStatusNegotiation" type="submit" class="btn mt-3" style="background-color: #0e6efd; color: white;">Lưu</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                                    $stt++;
                                                }
                                                ?>
                                            <tbody>
                                        </table>
                                        <script>
                                        var table = new DataTable('#example');
                                        </script>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end tab 1 -->
                        <!-- tab 2 -->
                        <div class="tab-pane  mt-5 fade show " id='tab2-2'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="example1" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Giá</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Lượt xem</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <style>

                                                </style>
                                                <?php
                                                $stt = 1;
                                                $database = new Database();
                                                $Property = new Transaction($database);
                                                if(isset($_SESSION['user_info'])){
                                                    $id = $_SESSION['user_info']['user_id'];
                                                } else {
                                                    $id = 0;
                                                }
                                                $result = $Property->renderPropertyById($id);
                                                foreach ($result as $row) {
                                                    echo '<tr>
                                <td>' . $stt . '</td>
                                <td><a href="propertyDetail?id=' . $row['property_id'] . '"> ' . $row['title'] . '</a></td>
                                <td>' . $row['price'] . '$</td>
                                <td>' . $row['location'] . '</td>
                                <td><span  style="color: black; text-transform: none;color: white;display:inline-block; border-radius: 0.375rem; padding: 5px; background-color: ' . ($row['status'] === 'Đã duyệt' ? '#e67e22' : '#d35400;') . '">
                                    ' . $row['status'] . '
                                </span></td>
                                <td>' . $row['views'] . '</td>
                                <td>
                                    <i class="fa-solid fs-5 fa-eye overlay mr-2 " style="color: blue;" data-toggle="modal" data-target="#propertyModal' . $row['property_id'] . '"></i>
                                    <a href="updateProperty?property_id=' . $row['property_id'] . '">
                                        <i class="fa-solid fs-5 fa-pen-to-square text-primary mr-2"></i>
                                    </a>
                                    <a href="admin/deleteProperty?property_id=' . $row['property_id'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bất động sản này không?\')">
                                        <i class="fa-solid fs-5 fa-trash-can text-danger"></i>
                                    </a>
                                </td>
                            </tr>';
                                                    echo '<div class="modal text-black fade" id="propertyModal' . $row['property_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">' . $row['title'] . '</h5>
                                                    <button type="button" class="btn-close border border-black" style="border:1px solid black !important" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                </div>
                                                <div class="modal-body row">
                                                <div class="col-6">Giá: ' . $row['price'] . ' $</div>
                                                <div class="col-6">Địa chỉ: ' . $row['location'] . '</div>
                                                <div class="col-6">Loại: ' . $row['type'] . '</div>
                                                <div class="col-6">Tình trạng: ' . $row['status'] . '</div>
                                                <div class="col-6">Phòng ngủ: ' . $row['beds'] . '</div>
                                                <div class="col-6">Phòng tắm: ' . $row['baths'] . '</div>
                                                <div class="col-6">Diện tích: ' . $row['acreage'] . ' m²</div>
                                                <div class="col-6">Số phòng TV: ' . $row['tivis'] . '</div>
                                                <div class="col-6">Số camera: ' . $row['cameras'] . '</div>
                                                <div class="col-6">Nội thất: ' . $row['built_in'] . '</div>
                                                <div class="col-6">Điều hòa: ' . $row['conditioner'] . '</div>
                                                <div class="col-6">Wifi: ' . $row['wifi'] . '</div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn" style="border:1px solid !important" data-dismiss="modal" aria-label="Close">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                                    $stt++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                        <script>
                                        var table = new DataTable('#example1');
                                        </script>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'>
                            <span>Đang cập nhật</span>
                        </div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-4'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-5'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-6'><span>Đang cập nhật</span></div>

                    </div>

                </div>
            </div>
        </div>
        </head>

        <body>
            <style>
            table.dataTable thead>tr>th.sorting:nth-child(2) {
                max-width: 200px !important;
            }
            </style>
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    </div>
</section>
<?php include 'inc/footer.php' ?>