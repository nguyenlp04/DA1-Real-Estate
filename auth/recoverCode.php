<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/css/auth.css">
  <link rel="stylesheet" href="./assets/css/auth.css">
  <title>Đặt lại mật khẩu</title>
  
</head>

<body >
<section class="background-radial-gradient overflow-hidden">

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
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
          <h2 class="fw-bold mb-5 text-center">Nhập mã bảo mật</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
              <div class="">
                  <div class="">
                     <div class="d-flex justify-content-between"><label class="form-label text-dark m-0 mb-2" for="form3Example2">Vui lòng kiểm tra mã trong email của bạn. Mã này gồm 4 số. </label><?php   ?></div> 
                    <input name="codeRecover" type="text" id="form3Example2" placeholder="Nhập mã" class="<?php echo $resultUser ?> form-control" />
                  </div>
                </div>
           
                <div class="float-end m-0 p-0 mt-4">
                    <button type="button" class="btn btn-success"><a href="forgotPassword" class="text-light text-decoration-none">Quay lại</a></button>
                    <button type="submit" name="submit" class="btn btn-primary"><a href="changePass" class="text-white text-decoration-none">Tiếp tục</a></button>
                   
                </div>
              
             
              
            </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>
