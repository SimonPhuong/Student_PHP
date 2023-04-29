<?php
include("cls/clslogin.php");
$p=new login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main class="wapper-login">
        <header class="header" style="background: #ffffff;">
            <div class="container">
                <div class="logo-login-main text-center">
                        <a href="/"><img src="img/logo_1.png"></a>
                </div>
            </div>
            <div style="clear:both;"></div>
        </header>

        <section class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <h1 class="txt-color-red login-header-big">Cổng thông tin học sinh THPT</h1>
                        <div class="hero">
                            <div class="pull-left login-desc-box-l">
                                <h4 class="paragraph-header">Kênh thông tin dành cho tất cả học sinh</h4>
                                <div class="login-app-icons">
                                    <a href="https://thpt-locninh-binhphuoc.edu.vn/" class="csw-btn-button" rel="nofollow" target="_blank" >Trang chủ THPT Lộc Ninh</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="mb-2" align="center"><b>Cổng thông tin học sinh</b></h4>
                              <p class="mb-4" align="center">Đăng nhập hệ thống</p>
                              <form id="formAuthentication" class="mb-3" action="" method="POST">
                                <div class="mb-3">
                                  <label for="email" class="form-label">Mã số giáo viên</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="txttdn"
                                    name="txttdn"
                                    placeholder="Nhập mã giáo viên"
                                    autofocus
                                  />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                  <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Mật khẩu</label>
                                  </div>
                                  <div class="input-group input-group-merge">
                                    <input
                                      type="password"
                                      id="txtpass"
                                      class="form-control"
                                      name="txtpass"
                                      placeholder="Nhập mật khẩu"
                                      aria-describedby="password"
                                    />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                  </div>
                                </div>
                                
                                <div class="mb-3">
                                  <button class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Đăng nhập">Đăng nhập</button>
                                  <?php
  switch($_POST['button'])
  {
	  case 'Đăng nhập':
	  {
		  $user=$_REQUEST['txttdn'];
		  $pass1=$_REQUEST['txtpass'];
		  $pass=md5($pass1);
		  if($user!='' && $pass!='')
		  {
			  if($p->mylogin1($user,$pass)==1)
			  {
				  header('location:index1.php');
			  }
		  }
		  else
		  {
			  echo 'Vui lòng nhập đầy đủ thông tin';
		  }
		  break;
	  }
	  
  }
  ?>
    <a href="login.php"><button class="btn btn-primary d-grid w-100" style=" margin-top:20px;" type="button">Đăng nhập dành cho học sinh</button></a>
                                </div>
                              </form>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>