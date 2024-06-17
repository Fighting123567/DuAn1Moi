<div class="main-content">
  <h3 class="title-page">Đơn hàng</h3>
  <?php foreach($donhang as $dh): ?>
          <table id="example" class="table table-striped bg-primary" style="width: 100%">
          <h5>ID đơn hàng: <?=$dh['id_dh']?></h5>
          <p>Họ tên: <?=$dh['Hoten']?></p>
          <p>Email: <?=$dh['Email']?></p>
          <p>Số điện thoại: <?=$dh['Sodienthoai']?></p>
          <p>Địa chỉ: <?=$dh['Diachi']?></p>
          <p>Trạng thái: <?=$dh['trang_thai']?></p>
            <thead>
              <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số Lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php
               $id_dh=$dh['id_dh'];
              ?>
              <?php foreach( sp_in_ct($id_dh) as $ctdh): ?>
              <tr>
                <td><img src="./img/<?=($ctdh['image'])?>" width="80px"></td>
                <td><?=$ctdh['name']?></td>
                <td><?=number_format($ctdh['price'],0, ",",".")." VND"?></td>
                <td><?=$ctdh['Soluong']?></td>
                <td><?=number_format($ctdh['Tong'],0, ",",".")." VND"?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="table-light">
            <tr>
                <td colspan="5" class="text-end fs-4">Tổng tiền: <?=number_format($dh['Tongdh'],0, ",",".")." VND"?></td>
            </tr>
        </tfoot>
           <?php endforeach; ?>
        </div>
      </div>
    </div>
    <script src="assets/js/main.js"></script>
  </body>
</html>
