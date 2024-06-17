<?php
    include_once "pdo.php";
    function product_one($id_sp){
        $sql="SELECT * FROM products WHERE id_sp=?";
        return pdo_query_one($sql,$id_sp);
    }function update_dh( $Tongdh , $Hoten, $Email , $Sodienthoai, $Diachi, $id_user){
        $sql = "UPDATE donhang SET Tongdh=?, Hoten=?, Email=?, Sodienthoai=?, Diachi=?, trang_thai='chuan-bi' WHERE id_user=? and trang_thai='gio-hang'";
        pdo_execute($sql, $Tongdh , $Hoten, $Email , $Sodienthoai, $Diachi, $id_user);
    }//làm rồi
    function insert_dh($Tongdh, $Hoten, $Email, $Sodienthoai, $Diachi) {
        $sql = "INSERT INTO `donhang` (`Tongdh`, `Hoten`, `Email`, `Sodienthoai`, `Diachi`, `trang_thai`)
                VALUES (?, ?, ?, ?, ?, 'chuan-bi');";
        pdo_execute($sql, $Tongdh, $Hoten, $Email, $Sodienthoai, $Diachi);
    }//làm rồi
    function insert_ctdh($id_dh, $id_sp , $Soluong, $Tong){
        $sql = "INSERT INTO donhangchitiet(id_dh, id_sp , Soluong, Tong) VALUES (?,?,?,?)";
        pdo_execute($sql,$id_dh, $id_sp , $Soluong, $Tong);
    }//làm rồi
    function get_last_order_id($id_user) {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare("SELECT id_dh FROM donhang WHERE id_user = ? ORDER BY id_dh DESC LIMIT 1");
        $stmt->execute([$id_user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id_dh'] : null;
    }
    function user_hascart($id_user){
        $sql="SELECT * from donhang where id_user=? and trang_thai='gio-hang' ORDER BY id_dh DESC LIMIT 1";
        return pdo_query_one($sql,$id_user);
    }
    function user_addcart($id_user,$Hoten, $Email, $Diachi, $Sodienthoai){
        $sql="INSERT INTO donhang(`id_user`,`Hoten`,`Email`,`Diachi`,`Sodienthoai`) values(?,?,?,?,?)";
        return pdo_execute($sql, $id_user, $Hoten, $Email, $Diachi, $Sodienthoai);
    }
    function user_addtocart( $id_sp , $Soluong, $Tong){
        $sql = "INSERT INTO donhangchitiet( id_sp , Soluong, Tong) VALUES (?,?,?)";
        pdo_execute($sql, $id_sp , $Soluong, $Tong);
    }//làm rồi


?>