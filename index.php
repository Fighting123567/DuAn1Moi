<?php 
ob_start();//Ojcet start
session_start();
// include_once('Model/hang-hoa.php');
include_once('Model//dao/loai.php');
//điều hướng đến các contronller
$allloai=loai_select_all();
if(isset($_GET['mod'])){
  switch ($_GET['mod']){
      case 'page':
          include_once 'Controller/HomeController.php';
          break;
      case 'pro':
          include_once 'Controller/ProductController.php';
          break;
      case 'cat':
          include_once 'Controller/CategoryController.php';
          break;
      case 'user':
          include_once 'Controller/UserController.php';
          break;
          case 'cart':
            include_once 'Controller/cart.php';
            break;
          case 'order':
            include_once 'Controller/order.php';
            break;
      case 'admin':
        include_once 'Controller/AdminController.php';
        break;
      default:
      #code

  }
}
else{
  header("Location: ?mod=page&act=home");
}
?>