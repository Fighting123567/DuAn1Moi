<div class="main-content">
  <h3 class="title-page">Sản phẩm</h3>
    <?php if(isset($_SESSION['addsucsess'])):?>
                <div class="alert alert-success" role="alert">
                <?=$_SESSION['addsucsess']?>
                </div>
                <?php endif; unset($_SESSION['addsucsess']);?>
     <?php if(isset($_SESSION['editsucsess'])):?>
                <div class="alert alert-success" role="alert">
                <?=$_SESSION['editsucsess']?>
                </div>
      <?php endif; unset($_SESSION['editsucsess']);?>
                <?php if(isset($_SESSION['deletesucsess'])):?>
                <div class="alert alert-success" role="alert">
                <?=$_SESSION['deletesucsess']?>
                </div>
                <?php endif; unset($_SESSION['deletesucsess']);?>
                
          <div class="d-flex justify-content-end">
            <a href="?mod=admin&act=addproduct" class="btn btn-primary mb-2"
              >Thêm sản phẩm</a
            >
          </div>
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Ảnh sản phẩm<img src="" alt="" width="80px" /></th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Id danh mục</th>
                <th>Ngày Nhập</th>
                <th>Mô Tả</th>
                <th>Trạng thái</th>
                <th>Chỉnh sửa</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($allpro as $products): ?>
              <tr>
                <td><?=$products['id_sp']?></td>
                <td><img src="./img/<?=$products['image']?>" width="60px" alt=""></td>
                <td><?=$products['name']?></td>
                <td><?=$products['price']?></td>
                <td><?=$products['catname']?></td>
                <td><?=$products['ngayNhap']?></td>
                <td><?=$products['Mota']?></td>
                <td>
                <?php if ($products['AnHien'] == 0): ?>
                      <a href="#" class="btn btn-success">
                      <i class="fa-solid fa-eye"></i></i> Hiện
                      </a>
                    <?php else: ?>
                        <a href="#"   class="btn btn-danger">
                        <i class="fa-solid fa-eye-slash"></i></i> Ẩn
                        </a>
                    <?php endif; ?>
                </td>
                <td>
                  <a href="?mod=admin&act=editproduct&id_sp=<?=$products['id_sp']?>" class="btn btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <a href="?mod=admin&act=deleteproduct&id_sp=<?=$products['id_sp']?>" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i></i> Xóa</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
      new DataTable("#example");
    </script>
  </body>
</html>
