<?php

//Gửi/nhận dữ liệu từ model
//Hiển thị dữ liệu ra View
include_once('Model/dao/khach-hang.php');

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'inout': // trang chủ
            include_once 'View/inout.php';
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $kq = user_login($_POST['username'], $_POST['password']);
                if ($kq) {
                    // Đăng nhập thành công
                    $_SESSION['user'] = $kq;
                    header("Location: index.php");
                    exit(); // Đảm bảo không tiếp tục thực thi mã sau khi redirect
                } else {
                    $_SESSION['errorDN'] = 'Tên đăng nhập hoặc mật khẩu không đúng!';
                }
            }
            break;

        case 'register': // Đăng ký tài khoản
            if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $kq = user_checkUsername($username);
                if ($kq) {
                    $_SESSION['error'] = 'Không thể tạo tài khoản với tên đăng nhập <strong>' . $username . '</strong>.';
                } else {
                    // Tạo tài khoản mới
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    user_register($username, $email, $password);
                    $_SESSION['thongbao'] = 'Đã tạo tài khoản với tên đăng nhập <strong>' . $username . '</strong>.';
                    header("Location: ?mod=user&act=inout");
                }
            } 
            include_once 'View/register.php';
            break;

        case 'logout': // Đăng xuất
            unset($_SESSION['user']); // Đăng xuất thành công quay lại trang chủ
            header("Location: ?mod=user&act=inout");
            exit(); // Đảm bảo không tiếp tục thực thi mã sau khi redirect
            break;

        default:
            // Code mặc định nếu không khớp với bất kỳ case nào
            break;
    }
}
?>
