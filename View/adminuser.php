
        <div class="main-content">
          <h3 class="title-page">Quản Lý User</h3>
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($alluser as $user): ?>
              <tr>
                <td><?=$user['id_user']?></td>
                <td><?=$user['username']?></td>
                <td><?=$user['email']?></td>
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
