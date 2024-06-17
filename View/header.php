<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./css/index copy.css">
    <link rel="stylesheet" href="./css/sanpham copy.css">
    <link rel="stylesheet" href="./css/polo copy.css">
    <link rel="stylesheet" href="./css/chitietaothun.css">
    <script src="https://kit.fontawesome.com/bd5b5aae20.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>


    <div id="wrapper">
        <div id="header">
            <a href="?mod=page&act=home" class="logo">
                <img src="./img/logo.webp" alt="">
            </a>
            <div id="menu">
                <div class="item">
                    <a href="?mod=page&act=home">Trang chủ</a>
                </div>

                <div class="item">
                    <a href="?mod=pro&act=allpro">Sản Phẩm</a>
                    <div class="child">
                        <?php foreach($allloai as $l) :?>
                        <a href="?mod=pro&act=bycat&id_category=<?=$l['id_category']?>"><?=$l['name']?></a> 
                        <?php endforeach;?>
                    </div>
                    
                </div>
                <div class="item">
                    <a href="#">Blog</a>
                </div>
                <div class="item">
                    <a href="#">Liên hệ</a>
                </div>
                <div class="item">
                    <a href="#">Giới thiệu</a>
                </div>
            </div>
            
            <div id="actions">
            <div class="item">
                    <a href="Typescript/admin_dm.html"><img src="./img/icon-search.webp" alt=""></a>
                </div>
                <div class="item">
                    <a href="?mod=page&act=cart"><img src="./img/icon-bag.webp" alt=""></a>
                </div>
                <div class="item">
                <a href="#"><img src="./img/icon-user.webp" alt=""></a>

                <div class="child1">
            <?php if( !isset($_SESSION['user'])):?> 
                <a 
                href="?mod=user&act=inout" role="button">Đăng nhập</a>
                <hr class="short-hr">
                <a 
                href="?mod=user&act=register" role="button">Đăng ký tài khoảng</a>
            <?php else:?>
                <a 
                href="#" role="button"> Xin chào, <?=$_SESSION['user']['username']?>
                </a>
                <hr class="short-hr">
                <a class="dropdown-item"  href="?mod=user&act=edit&id=<?=$_SESSION['user']['id_user']?>">Thông tin tài khoản</a>
                <hr class="short-hr">
                <a class="dropdown-item" href="#">Lịch sử mua hàng</a>
              <?php if($_SESSION['user']['Vaitro']>=1):?>
                <hr class="short-hr">        
                <a class="dropdown-item text-warning" href="?mod=admin&act=productad">Trang quản lý</a>
              <?php endif;?>
                <hr class="short-hr">
                <a class="dropdown-item" href="?mod=user&act=logout">Đăng xuất</a>
         
          <?php endif;?>
                </div>
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['eroruser'])):?>
                <div class="alert alert-success" role="alert">
                <?=$_SESSION['eroruser']?>
                </div>
                <?php endif; unset($_SESSION['eroruser']);?>
    <?php if(isset($_SESSION['checkoutucsess'])):?>
                <div class="alert alert-success" role="alert">
                <?=$_SESSION['checkoutucsess']?>
                </div>
                <?php endif; unset($_SESSION['checkoutucsess']);?>