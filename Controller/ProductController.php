<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra View
include_once 'View/header.php';
include_once('Model/dao/hang-hoa.php');
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'allpro': //trang chủ
            //xữ lý dữ liệu
            $allpro=hang_hoa_select_all();

           
         
            //hiển thị dữ liệu
          include_once 'View/products.php';
          break;
          case 'bycat': //trang chủ
            //xữ lý dữ liệu
            $cate=cat_by_id($_GET['id_category']);
            $probycat=hang_hoa_select_by_id_cat($_GET['id_category']);
            //hiển thị dữ liệu
          include_once 'View/category.php';
          break;
          case 'detail': //trang chủ
            //xữ lý dữ liệu
           $ctsp = hang_hoa_select_by_id($_GET['id_sp']);
          //  $Cungdm = hang_hoa_Cungdm($_GET['id_dm']);
         
            //hiển thị dữ liệu
            include_once 'View/detail.php';
            break;
        default:
            # code...
            break;
    }include_once 'View/footer.php';
}
?>