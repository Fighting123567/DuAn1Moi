
        <div class="main-content">
          <h3 class="title-page">Danh Mục</h3>
          <div class="d-flex justify-content-end">
            <a href="addProduct.html" class="btn btn-primary mb-2"
              >Thêm Danh Mục</a
            >
          </div>
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($allcate as $cate): ?>
              <tr>
                <td><?=$cate['id_category']?></td>
                <td><?=$cate['name']?></td>
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
