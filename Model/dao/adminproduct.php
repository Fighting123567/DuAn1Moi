<?php
require_once 'pdo.php';

function hang_hoa_insert( $name, $price, $image, $id_category, $Mota, $NoiBat, $AnHien){
    $sql = "INSERT INTO products( name , price, image , id_category, Mota, NoiBat, AnHien) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $name, $price, $image, $id_category, $Mota, $NoiBat, $AnHien);
}//làm rồi

function hang_hoa_update($id_sp, $name, $price, $image, $id_category, $Mota, $NoiBat, $AnHien){
    $sql = "UPDATE products SET name=? , price=?, image=? , id_category=? , Mota=?, NoiBat=?, AnHien=? WHERE id_sp=?";
    pdo_execute($sql,  $name, $price, $image, $id_category, $Mota, $NoiBat, $AnHien ,$id_sp);
}//làm

function hang_hoa_delete($id_sp){
    $sql = "DELETE FROM products WHERE  id_sp=?";
    pdo_query_one($sql, $id_sp);
}//làm

function hang_hoa_select_all(){
    $sql = "SELECT Products.id_sp, Products.name,Products.image, Products.price,category.name as catname ,Products.ngayNhap,Products.Mota,Products.AnHien
    FROM Products
    JOIN category ON Products.id_category = category.id_category;"; //làm rồi
    return pdo_query($sql);
}
function danh_muc_select_all(){
    $sql = "SELECT * FROM category "; //làm rồi
    return pdo_query($sql);
}


function hang_hoa_select_by_id($id_sp){
    $sql = "SELECT * FROM products WHERE id_sp=?";
    return pdo_query_one($sql, $id_sp);//làm rồi
}

function hang_hoa_exist($ma_hh){
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function hang_hoa_select_by_loai($ma_loai){
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

function hang_hoa_select_keyword($keyword){
    $sql = "SELECT * FROM hang_hoa hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
}




function select_all_dh(){
    $sql="SELECT * FROM `donhang` WHERE `trang_thai` != 'gio-hang' ORDER BY `id_dh` DESC";
    return pdo_query($sql);
}

function sp_in_ct($id_dh){
    $sql="SELECT  donhangchitiet.id_sp, donhangchitiet.id_dh, donhangchitiet.Soluong, donhangchitiet.Tong, products.name,products.image,products.price
     FROM products JOIN donhangchitiet ON donhangchitiet.id_sp =products.id_sp 
     WHERE donhangchitiet.id_dh = ?";
     return pdo_query($sql, $id_dh);
}