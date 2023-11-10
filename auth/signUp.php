
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/css/auth.css">
  <title>Đăng ký</title>
</head>

<body>
<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4  px-md-5 text-center text-lg-start  d-flex align-items-center justify-content-center" style="min-height: 100vh;">
      <div class="row gx-lg-5 align-items-center ">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            The best offer <br />
            <span style="color: hsl(218, 81%, 75%)">for your business</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <h2 class="fw-bold mb-5 text-center">Đăng ký</h2>
              <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $addSuccess ? 'block' : 'none'; ?>">
                                        <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Đăng ký thành công!</strong>
                                    </div>
                        <div class="alert alert-success bg-danger" style="display:<?php echo $addFailure ? 'block' : 'none';?>">
                            <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Đăng ký thất bại!</strong>
                        </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class=" mb-4">
                  <div class="">
                    <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example1">Họ và tên</label><?php echo $resultFullName ?></div>
                    <input name="fullname" type="text" id="form3Example1" placeholder="Họ và tên" class="<?php echo $warningFullname ?> form-control" />
                  </div>
                </div>
                <div class=" mb-4">
                  <div class="">
                    <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example2">Username </label><?php echo $userAvailable ?></div>
                    <input name="username" type="text" id="form3Example2" placeholder="Username" class="<?php echo $warningUserName ?> form-control" />
                  </div>
                </div>
                <!-- Password input -->
                <div class=" mb-4">
                  <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example4">Mật khẩu</label><?php echo $resultPass ?></div>
                  <input name="password" type="password" id="form3Example4" placeholder="Mật khẩu" class="<?php echo $warningPassWord ?> form-control" />
                </div>
                <!-- Password input -->

                <div class=" mb-4">
                  <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example5">Xác nhận mật khẩu</label><?php echo $resultCfPass ?></div>
                  <input name="cfpassword" type="password" id="form3Example5" placeholder="Xác nhận mật khẩu" class="<?php echo $warningCfPassWord ?> form-control" />
                </div>
                <!-- Email input -->
                <div class=" mb-4">
                  <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example3">Địa chỉ email</label><?php echo $emailAvailable ?></div>
                  <input name="email" type="email" id="form3Example3" placeholder="Địa chỉ email" class="<?php echo $warningEmail ?> form-control" />
                </div>
                <!-- Phone -->
                <div class=" mb-4">
                  <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example3">Số điện thoại</label><?php echo $phoneAvailable ?></div>
                  <input name="phone" type="phone" id="form3Example3" placeholder="Số điện thoại" class="<?php echo $warningPhone ?> form-control" />
                </div>
                <!-- Avatar -->
                <div class=" mb-4">
                  <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example3">Avatar</label><?php echo $avatarAvailable ?></div>
                  <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                </div>


                <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Đăng ký">

                <div class="text-center">
                  <p>Bạn đã có tài khoản? <a class="text-decoration-none" href="login.php">Đăng nhập</a></p>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>hoặc đăng ký với:</p>
                    <button type="button" class="border btn btn-link ">
                      <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="border btn btn-link ">
                      <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="border btn btn-link ">
                      <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="border btn btn-link ">
                      <i class="fab fa-github"></i>
                    </button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>