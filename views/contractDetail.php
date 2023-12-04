<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(__DIR__ . '/../admin/models/contract.php');
include(__DIR__ . '/../admin/models/property.php');
include 'inc/header.php';

$database = new Database();
$contractDetail = new Transaction($database);


if (isset($_GET['transaction_id'])) {
    $contractid = $_GET['transaction_id'];
    $ContractDetail = $contractDetail->getTransactionById($contractid);
    if (!$ContractDetail) {
        echo "Không tìm thấy bài viết với ID: $contractid";
    }
}
?>

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
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:center;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>HỢP ĐỒNG&nbsp;MÔI GIỚI&nbsp;NHÀ
                                    ĐẤT</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:center;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">(Số:<?php echo $ContractDetail['transaction_id']; ?>./HĐMGNĐ)</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:center;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><i><span
                                    style="box-sizing:border-box;">&nbsp;</span></i></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><i><span
                                    style="box-sizing:border-box;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; Hôm nay :<?php echo $ContractDetail['transaction_date']; ?> .Chúng tôi
                                    gồm
                                    có:</span></i></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>BÊN MÔI GIỚI
                                    (BÊN&nbsp;A):</strong></span></span><span
                            style="color:rgb(51,51,51);font-family:;"><span style="box-sizing:border-box;" times=""
                                new="">&nbsp; Công ty Bất Động Sản NCN</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Địa chỉ:
                                <?php echo $ContractDetail['seller_address']; ?>
                            </span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Điện thoại:
                                <?php echo $ContractDetail['seller_phone']; ?></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Do Ông
                                (Bà):&nbsp;&nbsp;<?php echo $ContractDetail['seller_fullname']; ?>
                                <br>
                                Sinh năm:
                                <?php echo $ContractDetail['seller_birth']; ?></span></span>


                    </p>

                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        &nbsp;
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:36pt;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">&nbsp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>BÊN ĐƯỢC MÔI GIỚI (BÊN
                                    B):</strong>&nbsp;</span></span><span
                            style="color:rgb(51,51,51);font-family:;"><span style="box-sizing:border-box;" times=""
                                new="">Công ty Bất Động Sản NCN</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><i><span
                                    style="box-sizing:border-box;">Trường hợp là cá nhân:</span></i></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Ông/Bà:&nbsp;<?php echo $ContractDetail['customer_fullname']; ?>
                                <br>
                                Sinh năm:
                                <?php echo $ContractDetail['customer_birth']; ?></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Địa chỉ hiện
                                tại:&nbsp;
                                <?php echo $ContractDetail['customer_address']; ?></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Điện thoại liên lạc:
                                <?php echo $ContractDetail['customer_phone']; ?></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>&nbsp;</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><i><span
                                    style="box-sizing:border-box;"><strong>Hai Bên cùng thỏa thuận ký hợp đồng dịch
                                        vụ với nội dung sau:</strong></span></i></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">&nbsp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 1: NỘI DUNG HỢP
                                    ĐỒNG</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">1.1&nbsp;&nbsp;Bên B đồng ý giao cho Bên A thực hiện
                                dịch vụ môi giới bán (hoặc cho thuê) bất động sản do Bên B là chủ sở
                                hữu.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">1.2&nbsp;&nbsp;Đặc điểm của BĐS và giấy tờ pháp lý về
                                BĐS là đối tượng của dịch vụ này được mô tả như sau:</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Lọai bất động sản:
                                .</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Địa chỉ:
                                <?php echo $ContractDetail['property_location']; ?>.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Diện tích :
                                <?php echo $ContractDetail['property_acreage']; ?>m&#178;..</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Đã xây dựng:
                                <?php echo $ContractDetail['property_builtin']; ?>
                                năm</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">1.3&nbsp;&nbsp;Giá bán bất động sản này được hai Bên
                                thỏa thuận trên cơ sở giá do Bên A thẩm định&nbsp;là:
                                <?php echo $ContractDetail['property_price']; ?>$&nbsp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        &nbsp;
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Trong&nbsp;quá&nbsp;trình thực hiện hợp đồng nếu các
                                bên xét thấy cần điều chỉnh giá bán, hai Bên phải thỏa thuận bằng văn
                                bản.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>&nbsp;</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 2: PHÍ DỊCH VỤ VÀ PHƯƠNG THỨC THANH
                                    TOÁN</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">2.1&nbsp;&nbsp;&nbsp;Bên B đồng ý thanh toán&nbsp;cho
                                Bên A số tiền môi giới là 5% ( đã bao gồm thuế VAT) trên giá trị giao dịch thực tế
                                tương đương với số tiền
                                là:&nbsp;<?php $discountedPrice = $ContractDetail['property_price'] * 0.95;
                                                echo $discountedPrice; ?>$.
                            </span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">2.2 Số tiền dịch vụ này không bao gồm các chi phí
                                liên quan khác phát sinh ngoài dịch vụ môi giới tư vấn bán tài sản mà bên A thực
                                hiện.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">2.3 Phí môi giới được Bên B thanh toán cho Bên A một
                                lần bằng tiền mặt trong vòng 12 (mười hai) ngày kể từ ngày giao dịch thành công.
                                Trong trường hợp khách hàng đã đặt cọc mà chịu mất cọc thì bên B thanh toán cho bên
                                A trong vòng 03 (ba) ngày kể từ ngày được xác định là khách hàng chấp nhận mất
                                cọc.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>&nbsp;</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 3: THỜI GIAN THỰC HIỆN DỊCH
                                    VỤ</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">3.1&nbsp;&nbsp;Từ ngày
                                &nbsp;<?php echo $ContractDetail['transaction_date']; ?> </span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">3.2&nbsp;&nbsp;Hết thời hạn này hai bên có thể thỏa
                                thuận thêm và được ký kết bằng một phụ lục hợp đồng.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">&nbsp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 4: THỎA THUẬN
                                    CHUNG</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">4.1&nbsp;&nbsp;Trong quá trình thực hiện dịch vụ môi
                                giới bên B không phải bỏ ra bất cứ khoản chi phí nào. Tất cả các chi phí liên quan
                                đến việc quảng cáo rao bán sản phẩm sẽ do bên A chịu.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">4.2&nbsp;&nbsp;Giao dịch được coi là thành công khi
                                khách hàng ký hợp đồng mua bán bất động sản (hoặc hợp đồng đặt cọc, hợp đồng góp
                                vốn, giấy thỏa thuận mua bán hoặc ký bất kỳ loại hợp đồng, giấy thỏa thuận nào khác
                                có liên quan đến bất động sản) do bên A thực hiện hoạt động môi giới.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">4.3&nbsp;&nbsp;Trong thời gian thực hiện dịch vụ, nếu
                                khách hàng do bên A giới thiệu đã đặt cọc nhưng bị mất cọc do vi phạm hợp đồng hoặc
                                chịu mất cọc vì bất kỳ lý do gì thì mỗi bên được hưởng 50% (năm mươi phần trăm) trên
                                số tiền đặt cọc đó.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">4.4&nbsp;&nbsp;Khách hàng của bên A là người được
                                nhân viên bên A hoặc bất kỳ người nào được bên A giới thiệu hoặc khách hàng của bên
                                A giới thiệu khách hàng khác đến bên B để ký hợp đồng, đặt cọc giữ chỗ hay tìm hiểu
                                để sau đó ký hợp đồng mua bán với bên B. Nếu trước khi ký hợp đồng mua bán bất động
                                sản mà khách hàng yêu cầu thay đổi người đứng tên trên hợp đồng thì vẫn được xem là
                                khách hàng của bên A.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">4.5&nbsp;&nbsp;Giá bán bất động sản theo khoản 2.1
                                Điều 2 nêu trên theo thỏa thuận giữa bên A và bên B (Gọi là giá bán ban
                                đầu)</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">4.6&nbsp;&nbsp;Trường hợp bên A giới thiệu khách mua
                                cho bên B và khách mua đã trả giá theo giá bán ban đầu nhưng bên B không bán thì coi
                                như bên A đã thực hiện xong hợp đồng, bên B vẫn phải thanh tóan cho bên A:
                                5<strong>%</strong>&nbsp; trên giá bán thực tế. (Việc không bán bao gồm sự xác nhận
                                không bán bằng văn bản của người bán hoặc sau&nbsp;<strong>3</strong>&nbsp;(ba) ngày
                                kể từ ngày người mua xác nhận mua nhưng người bán không nhận tiền đặt
                                cọc).</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">4.7&nbsp;&nbsp;Trong thời gian thực hiện hợp đồng
                                hoặc sau ngày chấm dứt hợp đồng này nếu khách hàng do bên A giới thiệu hoặc khách
                                hàng đó giới thiệu khách hàng khác đến mua căn hộ của bên B thì bên A vẫn được hưởng
                                phí môi giới như mức phí môi giới đã thỏa thuận tại khoản 2.1 Điều 2 của Hợp đồng
                                này.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">(Có thể quy định một khoảng thời gian cụ thể: 6
                                tháng; một năm hoặc 2 năm cho phù hợp với Điều khoản trên)</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>&nbsp;</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 5: QUYỀN VÀ NGHĨA VỤ CỦA BÊN
                                    A</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>5.1. Quyền của bên A:</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">a)&nbsp;Yêu cầu&nbsp;bên B&nbsp;cung cấp hồ sơ, thông
                                tin, tài&nbsp;liệu liên quan đến bất động sản;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">b)&nbsp;Được nhận phí môi giới theo thỏa
                                thuận;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">c)&nbsp;Được nhận 50% trên số tiền đặt cọc khi khách
                                hàng chấp nhận mất cọc hoặc khi khách hàng bị mất cọc do vi phạm cam
                                kết;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">d)&nbsp;Thuê tổ chức, cá nhân môi giới khác thực hiện
                                công việc môi giới bất động sản trong phạm vi hợp đồng môi giới bất động sản
                                với&nbsp;bên B&nbsp;nhưng phải chịu trách nhiệm trước&nbsp;bên B&nbsp;về kết quả môi
                                giới.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;letter-spacing:-0.3pt;">e)&nbsp;Đơn phương chấm dứt
                                hoặc hủy bỏ hợp đồng môi giới bất động sản khi&nbsp;bên B&nbsp;vi phạm điều kiện
                                để&nbsp;đơn phương chấm dứt hoặc hủy bỏ hợp đồng do hai bên thỏa thuận trong hợp
                                đồng hoặc theo quy định của pháp luật.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>5.2. Nghĩa vụ của bên
                                    A:</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">a)&nbsp;Thực hiện đúng hợp đồng môi giới bất
                                động&nbsp;sản đã ký;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">b)&nbsp;Cung cấp thông tin về bất động sản được đưa
                                vào kinh doanh và chịu trách nhiệm về thông tin do mình cung cấp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">c)&nbsp;Hỗ trợ các bên trong việc đàm phán, ký kết
                                hợp đồng mua bán, chuyển nhượng, thuê, thuê mua bất động sản;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">d)&nbsp;Thực hiện chế độ báo cáo theo quy định của
                                pháp luật và chịu sự kiểm tra, thanh tra của&nbsp;cơ quan nhà nước có thẩm
                                quyền;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">e)&nbsp;Bồi thường thiệt hại do lỗi của mình gây
                                ra;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">f)&nbsp;Thường xuyên báo cho bên B biết về tiến độ
                                thực hiện công việc và phối hợp với bên B để giải quyết những vướng mắc phát sinh
                                trong quá trình thực hiện công việc;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">g)&nbsp;Chịu mọi chi phí liên quan đến phạm vi công
                                việc mà mình thực hiện.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">&nbsp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 6: QUYỀN VÀ NGHĨA VỤ CỦA BÊN
                                    B</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>6.1. Quyền của bên B:</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">a)&nbsp;Không chịu bất kỳ chi phí nào khác cho bên A
                                ngoài phí dịch vụ môi giới nếu giao dịch thành công;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">b)&nbsp;Được nhận 50% trên số tiền đặt cọc khi khách
                                hàng chấp nhận mất cọc hoặc khi khách hàng bị mất cọc do vi phạm cam
                                kết;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">c)&nbsp;Được bên A thực hiện miễn phí: Dịch vụ chuyển
                                quyền sở hữu (chi phí giao dịch ngoài và các lọai phí, lệ phí nếu có phát sinh do
                                bên B chịu), trung gian thanh&nbsp;toán&nbsp;qua Công ty NCN. khi giao dịch môi
                                giới thành công.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>6.2. Nghĩa vụ của bên
                                    B:</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">a)&nbsp;Cung cấp đầy đủ và kịp thời cho bên A những
                                giấy tờ liên quan.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">b)&nbsp;Hợp tác với bên A trong quá trình thực hiện
                                hợp đồng này.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">c)&nbsp;Ký hợp đồng bán/cho thuê bất động sản trực
                                tiếp với người mua/người thuê do bên B giới thiệu. Chịu tất cả các chi phí liên quan
                                đến thủ tục mua bán bất động sản theo quy định của nhà nước hoặc theo thỏa thuận với
                                người mua.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">d)&nbsp;Thanh toán phí môi giới cho bên A theo Điều 2
                                của Hợp đồng;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">&nbsp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 7: VI PHẠM HỢP
                                    ĐỒNG</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">7.1&nbsp;&nbsp;Trường hợp bên B không thanh toán hoặc
                                thanh toán không đủ hoặc không đúng phí môi giới cho bên B theo thỏa thuận tại Điều
                                2 của Hợp đồng này thì bên B phải chịu lãi chậm thanh toán trên số tiền và số ngày
                                chậm thanh toán với lãi suất 2,5%/tháng. Việc chậm thanh toán hoặc thanh toán không
                                đủ này cũng không vượt quá 10 (mười) ngày, nếu quá 10 (mười) ngày thì bên A được
                                quyền đơn phương chấm dứt hợp đồng và bên B vẫn phải trả phí dịch vụ cho bên A như
                                trong trường hợp bên A môi giới thành công.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">7.2&nbsp;&nbsp;Trường hợp bên A không tiến hành thực
                                hiện dịch vụ hoặc thực hiện dịch vụ không đúng như đã thỏa thuận thì bên B có quyền
                                đơn phương chấm dứt hợp đồng mà không phải trả cho bên A bất kỳ khoản phí nào đồng
                                thời bên A phải trả cho bên B một khoản tiền phạt tương đương với số tiền phí thực
                                hiện dịch vụ như quy định trong khoản 2.1 Điều 2 của Hợp đồng này.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">7.3&nbsp;&nbsp;Nếu một trong hai bên đơn phương chấm
                                dứt hợp đồng trái với các thỏa thuận trong trong Hợp đồng này thì bên đơn phương
                                chấm dứt hợp đồng đó phải chịu một khoản tiền phạt tương đương với số tiền phí dịch
                                vụ như quy định trong khoản 2.1 Điều 2 của Hợp đồng này.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>&nbsp;</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>ĐIỀU 8: ĐIỀU KHOẢN
                                    CHUNG</strong></span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Các bên cam kết cùng nhau thực hiện hợp đồng. Nếu
                                trong quá trình thực hiện có phát sinh vướng mắc các bên sẽ trao đổi trên tinh thần
                                hợp tác, trường hợp hai bên không thỏa thuận được việc tranh chấp sẽ được phán quyết
                                bởi tòa án.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Hợp đồng này có hiệu lực kể từ ợc phán quyết bởi tòa
                                án.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Hợp đồng này có hiệu lực kể từ n</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">Hợp đồng được lập thành 02 (hai) bản mỗi bên giữ một
                                bản và có giá trị như nhau.</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span></span>
                    </p>

                    <table>
                        <tr>
                            <th style="text-align: center;border:none">ĐẠI DIỆN BÊN A</th>
                            <th style="text-align: center;border:none"></th>
                            <th style="text-align: center;border:none">ĐẠI DIỆN BÊN B</th>
                        </tr>
                        <tr>
                            <td style="text-align: center;border:none"><?php echo $ContractDetail['seller_fullname']; ?>
                            </td>
                            <td style="text-align: center;border:none"></td>
                            <td style="text-align: center;border:none">
                                <?php echo $ContractDetail['customer_fullname']; ?></td>
                        </tr>
                    </table>

                    <!-- <p style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:center;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                            <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span style="box-sizing:border-box;"><strong>ĐẠI DIỆN&nbsp;BÊN
                                        A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ĐẠI
                                        DIỆN&nbsp;BÊN B</strong></span></span>
                        </p>
                        <p style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                            <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><i><span style="box-sizing:border-box;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ContractDetail['seller_fullname']; ?></span></i><span style="box-sizing:border-box;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><i><span style="box-sizing:border-box;"><?php echo $ContractDetail['customer_fullname']; ?></span></i></span>
                        </p> -->
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        <span style="color:rgb(51,51,51);font-family:Arial;font-size:10pt;"><span
                                style="box-sizing:border-box;">&nbsp;</span></span>
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        &nbsp;
                    </p>
                    <p
                        style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Helvetica, sans-serif;font-size:12px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:15pt;margin:0pt;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;">
                        &nbsp;
                    </p>
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