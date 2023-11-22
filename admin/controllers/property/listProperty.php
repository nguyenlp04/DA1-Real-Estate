<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../../inc/sideBar.php');
include(__DIR__ . '/../../inc/navBar.php');
include(__DIR__ . '/../../models/property.php');

?>
<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">

                        <div class="title-container flex items-center">
                            <p class="text-[#0957CB] font-semibold  text-2xl py-4">Tất Cả Bất Động Sản</p>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Địa chỉ</th>
                                    <th class="roles">Người đăng</th>
                                    <th class="roles">Trạng thái</th>
                                    <th class="roles">Lượt xem</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <style>

                                </style>
                                <?php
                        $stt = 1;
                        $database = new Database();
                        $Property = new Property($database);
                        $result = $Property->renderProperty();
                        foreach ($result as $row) {
                            echo '<tr>
                                <td>'. $stt .'</td>
                                <td><a class="decoration-none" href="propertyDetail?id='.$row['property_id'].'"> '. $row['title'] .'</a></td>
                                <td>'. $row['price'] .'$</td>
                                <td>'. $row['location'] .'</td>
                                <td>'. $row['full_name'] .'</td>
                                <td><span  style="color: black; text-transform: none;color: white;display:inline-block; border-radius: 0.375rem; padding: 5px; background-color: '. ($row['status'] === 'Đã duyệt' ? '#e67e22' : '#d35400;') .'">
                                    '. $row['status'] .'
                                </span></td>
                                <td>'. $row['views'] .'</td>
                                <td>
                                    <i class="fa-solid fs-5 fa-eye overlay mr-2 " style="color: blue;" data-toggle="modal" data-target="#propertyModal' . $row['property_id'] . '"></i>
                                    <a href="updateProperty?property_id=' . $row['property_id'] . '">
                                        <i class="fa-solid fs-5 fa-pen-to-square text-primary mr-2"></i>
                                    </a>
                                    <a href="deleteProperty?property_id=' . $row['property_id'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bất động sản này không?\')">
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
                                                <div class="col-6">Giá: '. $row['price'] .' $</div>
                                                <div class="col-6">Địa chỉ: '. $row['location'] .'</div>
                                                <div class="col-6">Loại: '. $row['type'] .'</div>
                                                <div class="col-6">Tình trạng: '. $row['status'] .'</div>
                                                <div class="col-6">Phòng ngủ: '. $row['beds'] .'</div>
                                                <div class="col-6">Phòng tắm: '. $row['baths'] .'</div>
                                                <div class="col-6">Diện tích: '. $row['acreage'] .' m²</div>
                                                <div class="col-6">Số phòng TV: '. $row['tivis'] .'</div>
                                                <div class="col-6">Số camera: '. $row['cameras'] .'</div>
                                                <div class="col-6">Nội thất: '. $row['built_in'] .'</div>
                                                <div class="col-6">Điều hòa: '. $row['conditioner'] .'</div>
                                                <div class="col-6">Wifi: '. $row['wifi'] .'</div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn" style="border:1px solid !important" data-dismiss="modal" aria-label="Close">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            $stt++;
                        }
                        
                                ?>
                            </tbody>
                        </table>
                        <script>
                        new DataTable('#example');
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script>
$(document).ready(function() {
    // Kích hoạt modal
    $('.modal').modal();
    // Khởi tạo DataTable
    new DataTable('#example');
});
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
</script>

<?php
include(__DIR__ . '/../../inc/footerDashboard.php');
?>