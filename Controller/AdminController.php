<?php
//Gửi/nhận dữ liệu từ model
//Hiển thụ dữ liệu ra View
include_once 'Model/dao/adminproduct.php';
include_once 'Model/dao/khach-hang.php';
include_once 'View/header_admin.php';
if (isset($_GET['act'])&& $_SESSION['user']['Vaitro']>=1) {
    switch ($_GET['act']) {
        case 'productad': 
            //xữ lý dữ liệu
            $allpro=hang_hoa_select_all();
      
            //hiển thị dữ liệu
          include_once 'View/adminproduct.php';
            break;
            case 'addproduct': 
                //xữ lý dữ liệu
                $allcate= danh_muc_select_all();
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $image = $_POST['image'];
                    $id_category = $_POST['id_category'];
                    $Mota = $_POST['Mota'];
                    $NoiBat = $_POST['NoiBat'];
                    $AnHien = $_POST['AnHien'];
                    hang_hoa_insert($name, $price, $image, $id_category, $Mota, $NoiBat, $AnHien);
                    header('location: ?mod=admin&act=productad');
                    $_SESSION['addsucsess'] = 'thêm sản phẩm thành công';
                     
                } 
            //hiển thị dữ liệu
                
                //hiển thị dữ liệu
              include_once 'View/addproduct.php';
                break;
                case 'editproduct': 
                    //xữ lý dữ liệu
                    $product = hang_hoa_select_by_id($_GET['id_sp']);
                    $allcate= danh_muc_select_all();
                    $id_sp =$_GET['id_sp'];
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $image = $_POST['image'];
                        $id_category = $_POST['id_category'];
                        $Mota = $_POST['Mota'];
                        $NoiBat = $_POST['NoiBat'];
                        $AnHien = $_POST['AnHien'];
                        hang_hoa_update($id_sp, $name, $price, $image, $id_category, $Mota, $NoiBat, $AnHien);
                        header('location: ?mod=admin&act=productad');
                        $_SESSION['editsucsess'] = 'cập nhật sản phẩm thành công';
                         
                    } 
                //hiển thị dữ liệu
                    
                    //hiển thị dữ liệu
                  include_once 'View/editproduct.php';
                    break;
                    case 'deleteproduct': 
                        //xữ lý dữ liệu
                        hang_hoa_delete($_GET['id_sp']);
                        $_SESSION['deletesucsess'] = 'xóa thành công';
                        
                        //hiển thị dữ liệu
                        header('location: ?mod=admin&act=productad');
                        
                        break;
        case 'userad': 
            //xữ lý dữ liệu
            $alluser= khach_hang_select_all();
        
            
            //hiển thị dữ liệu
            include_once 'View/adminuser.php';
            break;
            case 'categoryad': 
                //xữ lý dữ liệu
                $allcate= danh_muc_select_all();
            
                
                //hiển thị dữ liệu
                include_once 'View/admincategory.php';
                break;
                case 'dashboard': 
                    //xữ lý dữ liệu
                    
                    
                    //hiển thị dữ liệu
                    include_once 'View/dashboard.php';
                    break;
                    case 'order': 
                        //xữ lý dữ liệu
                        // $donhang=select_dh();
                        $donhang =select_all_dh();
                        
                        //hiển thị dữ liệu
                        include_once 'View/adminorder.php';
                        break;
        default:
            # code...
            break;
    }
}else{
header('location: ?mod=page&act=home');
$_SESSION['eroruser'] = 'Bạn không có quyên truy cập vào trang này';
}
?>