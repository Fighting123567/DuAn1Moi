<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra View
include_once 'Model/dao/hang-hoa.php';
include_once 'View/header.php';
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home': //trang chủ
            //xữ lý dữ liệu
            $NoiBat=hang_hoa_noi_bat();
            $Moi=hang_hoa_moi();
           
         
            //hiển thị dữ liệu
        include_once 'View/banner.php';
          include_once 'View/home.php';
            break;
            case 'cart': // 
             // print_r($_SESSION['cart']);
              //xữ lý dữ liệu
            //hiển thị dữ liệu
            include_once 'View/cart.php';
          break;
          case 'checkout': // 
            include_once 'Model/dao/cart.php';
            if (isset($_SESSION['user'])) {
              $user = $_SESSION['user'];
              $id_user = $user['id_user'];
          } else {
              $user = [
                  'Hoten' => "",
                  'email' => "",
                  'Sodienthoai' => "",
                  'Diachi' => ""
              ];
              $id_user = 0;
          }
          
          // Kiểm tra nếu người dùng có giỏ hàng
          $hc = user_hascart($id_user);
          if($hc){
            if (isset($_POST['submit'])) {
              $Tongdh = $_POST['Tongdh'];
              $Hoten = $_POST['Hoten'];
              $Email = $_POST['Email'];
              $Sodienthoai = $_POST['Sodienthoai'];
              $Diachi = $_POST['Diachi'];
              $id_sp = $_POST['id_sp'];
              $Soluong = $_POST['Soluong'];
              $Tong = $_POST['Tong'];
          
              // Cập nhật đơn hàng
              update_dh($Tongdh, $Hoten, $Email, $Sodienthoai, $Diachi, $id_user);
          
              // Lấy id_dh từ đơn hàng đã cập nhật hoặc tạo mới
              $id_dh = get_last_order_id($id_user);
          
              if ($id_dh) {
                // Lặp qua từng sản phẩm trong giỏ hàng
                foreach ($_SESSION['cart'] as $id_sp => $product) {
                    $Soluong = $product['SoLuong'];
                    $Tong = $product['price'] * $Soluong;
        
                    // Chèn chi tiết đơn hàng cho từng sản phẩm
                    insert_ctdh($id_dh, $id_sp, $Soluong, $Tong);
                }
        
                // Thông báo thành công và xóa giỏ hàng
                $_SESSION['checkoutucsess'] = 'Mua hàng thành công';
                unset($_SESSION['cart']);
                header('location: ?mod=page&act=home');
                exit();
            } 
        }
          }else{
            if (isset($_POST['submit'])) {
              $Tongdh = $_POST['Tongdh'];
              $Hoten = $_POST['Hoten'];
              $Email = $_POST['Email'];
              $Sodienthoai = $_POST['Sodienthoai'];
              $Diachi = $_POST['Diachi'];
              $id_sp = $_POST['id_sp'];
              $Soluong = $_POST['Soluong'];
              $Tong = $_POST['Tong'];
          
              // tạo nhật đơn hàng
              insert_dh($Tongdh, $Hoten, $Email, $Sodienthoai, $Diachi, $id_user);
          
              // Lấy id_dh từ đơn hàng đã cập nhật hoặc tạo mới
              $id_dh = get_last_order_id($id_user);
          
              if ($id_dh) {
                // Lặp qua từng sản phẩm trong giỏ hàng
                foreach ($_SESSION['cart'] as $id_sp => $product) {
                    $Soluong = $product['SoLuong'];
                    $Tong = $product['price'] * $Soluong;
        
                    // Chèn chi tiết đơn hàng cho từng sản phẩm
                    insert_ctdh($id_dh, $id_sp, $Soluong, $Tong);
                }
        
                // Thông báo thành công và xóa giỏ hàng
                $_SESSION['checkoutucsess'] = 'Mua hàng thành công';
                unset($_SESSION['cart']);
                header('location: ?mod=page&act=home');
                exit();
            } 
        }
          }
  
          //hiển thị dữ liệu
          include_once 'View/checkout.php';
        break;

        default:
            # code...
            break;
    }include_once 'View/footer.php';
}
?>