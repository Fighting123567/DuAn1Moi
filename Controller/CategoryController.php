<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra View
include_once 'Model/dao/hang-hoa.php';
include_once 'View/header.php';
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'polo': //trang chủ
            //xữ lý dữ liệu
            $polo=hang_hoa_select_all();
         
            //hiển thị dữ liệu
          include_once 'View/category.php';
            break;
        default:
            # code...
            break;
    }include_once 'View/footer.php';
}
?>