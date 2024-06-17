<div class="main-content">
                <h3 class="title-page">
                    Sửa sản phẩm
                </h3>
                
                <form class="addPro" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" class="form-control" required name="name" id="name" value="<?=$product['name']?>" placeholder="Nhập tên sả phẩm">
                    </div>
                    <div class="form-group">
                        <label for="price">Hình:</label>
                        <input type="text" class="form-control" required name="image" value="<?=$product['image']?>"  id="price" placeholder="Nhập url ảnh sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="price">Giá sản phẩm:</label>
                        <input type="number" class="form-control" required name="price" value="<?=$product['price']?>"  id="price" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="categories">Danh mục:</label>
                        <select class="form-select" name="id_category" aria-label="Default select example">
                          <?php foreach($allcate as $cate): ?>
                          <option  value="<?=$cate['id_category']?>" <?= $cate['id_category']==$product['id_category']? "selected":"" ?> ><?=$cate['name']?></option>
                            <?php endforeach; ?>
                          </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả:</label>
                        <textarea class="form-control" name="Mota" rows="3"
                            placeholder="Nhập 1 đoạn mô tả về sản phẩm" style="height: 78px;"><?=$product['Mota']?></textarea>
                    </div>
                    <div class="form-group">
                    <label>Nổi bật:</label>
                      <div>
                        <input type="radio"  name="NoiBat" value="0" <?= $product['NoiBat']==0? "checked":"" ?> />
                        <label for="NoiBat">không</label>
                      </div>
                      <div>
                        <input type="radio"  name="NoiBat" value="1"  <?= $product['NoiBat']==1? "checked":"" ?>/>
                        <label for="NoiBat">có</label>
                      </div>
                    </div>
                    <div class="form-group">
                    <label>ẩn hiện:</label>
                      <div>
                        <input type="radio"  name="AnHien" value="0" <?= $product['AnHien']==0? "checked":"" ?>/>
                        <label for="AnHien">hiện</label>
                      </div>
                      <div>
                        <input type="radio"  name="AnHien" value="1"  <?= $product['AnHien']==1? "checked":"" ?> />
                        <label for="AnHien">ẩn</label>
                      </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <script>
                new DataTable('#example');
            </script>
</body>

</html>