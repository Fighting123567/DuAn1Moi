
<!-- main -->
<div class="container">
    <div class="row"> 
      <div class="col-md-6 bg-light">
        <!-- Thanh toán ở bên phải -->
        <h2 class="mt-5">Thông tin giao hàng</h2>
        <form method="POST" action="index.php?mod=page&act=checkout">
          <div class="form-group">
            <label for="name">Họ và tên:</label>
            <input type="text" required class="form-control" value="<?=$user['Hoten']?>" name="Hoten" id="name" placeholder="Nhập họ và tên">
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" required class="form-control" value="<?=$user['Diachi']?>" name="Diachi" id="address" placeholder="Nhập địa chỉ">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" required class="form-control" value="<?=$user['email']?>" name="Email" id="email" placeholder="Nhập email">
          </div>
          <div class="form-group">
            <label for="dienthoai">Điện thoại:</label>
            <input type="text" required class="form-control" value="<?=$user['Sodienthoai']?>" name="Sodienthoai" id="dienthoai" placeholder="Nhập dien thoai">
          </div>
          <div class="form-group">
            <label for="shippingMethod">Phương thức vận chuyển:</label>
            <select class="form-control" id="shippingMethod">
              <option>Giao hàng nhanh</option>
              <option>Giao hàng tiêu chuẩn</option>
              <option>Giao hàng tiết kiệm</option>
            </select>
          </div>
          <div class="form-group">
            <label for="paymentMethod">Phương thức thanh toán:</label>
            <select class="form-control" id="paymentMethod">
              <option>Thanh toán khi nhận hàng (COD)</option>
              <option>Thẻ tín dụng</option>
              <option>Ví điện tử Momo</option>
            </select>
          </div>
          <?php  $sum = 0; foreach($_SESSION['cart'] as $item): ?>

          <input type="hidden" name="id_sp" value="<?=$item['id_sp']?>">
          <input type="hidden" name="Soluong" value="<?=$item['SoLuong']?>">
          <input type="hidden" name="Tong" value="<?=$item['price']*$item['SoLuong']?>">
          <?php $sum += $item['price']*$item['SoLuong']; ?>
          
          <?php endforeach; ?>
          <input type="hidden" name="Tongdh" value="<?=$sum?>">
          <button type="submit" name="submit" class="btn btn-primary float-end">Thanh tóa đơn hàng</button>
        </form>
      </div>
      <div class="col-md-6">
        <!-- Giỏ hàng ở bên trái -->
        <h3 class="mt-5">Chi tiết đơn hàng</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Hình</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Đơn giá</th>
              <th scope="col">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
          <?php 
                        $sum = 0;
                        foreach($_SESSION['cart'] as $item): ?>
                        <tr>
                        <td data-th="Thứ tự">1</td>
                            <td data-th="Tên sản phẩm"><?=$item['name']?></td>
                            <td data-th="Sản phẩm">
                                        <img
                                            src="./img/<?=$item['image']?>"
                                            alt="Sản phẩm 1" class="img-responsive" width="100">
                            </td>
                            <td data-th="Số lượng">
                              <div class="amount-product-buy d-flex justify-content-center">
                                <div class="amount-product fs-5  px-2 border border-1"><?=$item['SoLuong']?></div>
                              </div>
                            </td>
                            <td data-th="Giá"><?=number_format($item['price'],0, ",",".")." VND"?></td>
                            <td data-th="Thành tiền"><?=number_format($item['price']*$item['SoLuong'],0, ",",".")." VND"?></td>
                        </tr>
                        <?php $sum += $item['price']*$item['SoLuong']; ?>
                        <?php endforeach; ?>
            <!-- Thêm các hàng sản phẩm khác ở đây -->
          </tbody>
        </table>
        <div class="mt-3">
          <h4 class="text-end">Tổng cộng: <strong><?=number_format($sum,0, ",",".")." VND"?></strong></h4>
        </div>
      </div>
  
     
    </div>
  </div>

