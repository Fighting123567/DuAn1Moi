<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Validate form</title>
    <link rel="stylesheet" href="./css/inout copy.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container register-container">
        <form>
          <h1>Tạo tài khoản</h1>
          <div class="form-control" method="post">
            <input type="text" id="username" name="username" placeholder="Name" />
            <span></span>
          </div>
          <div class="form-control">
            <input type="email" id="email" name="email" placeholder="Email" />
            <span></span>
          </div>
          <div class="form-control">
            <input type="password" id="password" name="password" placeholder="Password" />
            <span></span>
          </div>
          <button type="submit" value="submit">Register</button>
          <span>Hoặc sử dụng tài khoản của bạn</span>
          <div class="social-container">
            <a href="#" class="social"
              ><i class="fa-brands fa-facebook-f"></i
            ></a>
            <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
            <a href="index copy.html" class="social"><i class="fas fa-house-user"></i></a>
          </div>
        </form>
      </div>

      <div class="form-container login-container">
        <form class="form-lg" method="post">
          <h1>Đăng Nhập</h1>
          <div class="form-control2">
            <input type="text"  id="username" name="username" placeholder="Tên Đăng Nhập" required />
            <span></span>
          </div>
          <div class="form-control2">
            <input type="password" id="password" name="password" placeholder="Password" required />
            <span></span>
          </div>
          <?php if(isset($_SESSION['errorDN'])):?>
                    <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['errorDN']?>
                    </div>
                <?php endif; unset($_SESSION['errorDN']);?>

          <div class="content">
            <div class="checkbox">
              <input type="checkbox" name="checkbox" id="checkbox" />
              <label for="">Nhớ mật khẩu</label>
            </div>
            <div class="pass-link">
              <a href="#">Quên mật khẩu</a>
            </div>
          </div>
          <button type="submit" value="submit">Đăng Nhập</button>
          
          <span>Hoặc sử dụng tài khoản của bạn</span>
          <div class="social-container">
            <a href="#" class="social"
              ><i class="fa-brands fa-facebook-f"></i
            ></a>
            <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
            <a href="?mod=page&act=home" class="social"><i class="fas fa-house-user"></i></a>
          </div>
        </form>
      </div>

      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1 class="title">
              Chào <br />
              bạn
            </h1>
            <p>Nếu bạn có tài khoản, đăng nhập tại đây và mua sắm</p>
            <button class="ghost" id="login">
              Đăng nhập
              <i class="fa-solid fa-arrow-left"></i>
            </button>
          </div>

          <div class="overlay-panel overlay-right">
            <h1 class="title">
              Chào mừng bạn đến <br />
              Sunflower
            </h1>
            <p>
              Nếu bạn chưa có tài khoản, hãy tham gia cùng chúng tôi và bắt đầu mua sắm
            </p>
            <a href="?mod=user&act=register">
            <button class="ghost" id="register">
              Đăng kí
              <i class="fa-solid fa-arrow-right"></i>
            </button>
              </a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="js/inout.js"></script>
</html>
