<?php
 include_once "Model/dao/cart.php";
extract ($_REQUEST) ;
if(isset($act)){
    switch($act){
        case 'add':
            if (isset($_SESSION['user'])) {
                $id_user = $_SESSION['user']['id_user'];
                
                if (user_hascart($id_user)) {
                    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                    if (isset($_SESSION['cart'][$id_sp])) {
                        $_SESSION['cart'][$id_sp]['SoLuong'] += 1;
                    } else {
                        // Lấy thông tin sản phẩm
                        $sp = product_one($id_sp);
                        $_SESSION['cart'][$id_sp] = array(
                            'id_sp' => $sp['id_sp'],
                            'name' => $sp['name'],
                            'image' => $sp['image'],
                            'price' => $sp['price'],
                            'SoLuong' => 1
                        );
                    }
                    header('location: ?mod=page&act=cart');
                } else {
                    $Hoten = $_SESSION['user']['Hoten'];
                    $Email = $_SESSION['user']['email'];
                    $Diachi = $_SESSION['user']['Diachi'];
                    $Sodienthoai = $_SESSION['user']['Sodienthoai'];
                    user_addcart($id_user, $Hoten, $Email, $Diachi, $Sodienthoai);
                    
                    $sp = product_one($id_sp);
                    $_SESSION['cart'][$id_sp] = array(
                        'id_sp' => $sp['id_sp'],
                        'name' => $sp['name'],
                        'image' => $sp['image'],
                        'price' => $sp['price'],
                        'SoLuong' => 1
                    );
                    header('location: ?mod=page&act=cart');
                }
            } else {
                $sp = product_one($id_sp);
                    $_SESSION['cart'][$id_sp] = array(
                        'id_sp' => $sp['id_sp'],
                        'name' => $sp['name'],
                        'image' => $sp['image'],
                        'price' => $sp['price'],
                        'SoLuong' => 1
                    );
                    header('location: ?mod=page&act=cart');
            }
            break;
        case 'delete' :
            unset($_SESSION['cart'][$id_sp]);
            header('location: ?mod=page&act=cart');
            break;
            case 'deleteall' :
                unset($_SESSION['cart']);
                header('location: ?mod=page&act=cart');
                break;
        case 'increase' :
            $_SESSION['cart'][$id_sp]['SoLuong']+=1;
            header('location: ?mod=page&act=cart');
            break;
        case 'decrease' :
            if($_SESSION['cart'][$id_sp]['SoLuong']>1){
                $_SESSION['cart'][$id_sp]['SoLuong']-=1;
            }else{
                unset($_SESSION['cart'][$id_sp]);
            }
            header('location: ?mod=page&act=cart');
            break;
    }
}