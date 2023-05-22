<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
  {
    // Getting username and password
    
    $id_user=$_POST['id_user'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username and password
    $stmt = $con->prepare("SELECT * FROM users WHERE id_user = :id_user");
    $stmt->bindParam(':id_user', $id_user);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) {
        $hashpassword = $row['password'];
        if (password_verify($password, $hashpassword)) {
            if ($row['is_admin'] == 1) {
                $_SESSION['login'] = $id_user;

                header('Location: index.php');
                exit();
            }
        } else {
            $_SESSION['msg'] = "Incorrect account!";
            header('Location: login.php');
            exit(0);
        }
    } else {
        $_SESSION['msg'] = "Incorrect account!";
        header('Location: login.php');
        exit(0);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body class="theme-3">
    <div class="auth-wrapper auth-v3">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2">
                    <a class="navbar-brand" href="#">
                        <img src="./assets/images/LNH_logo.png" alt="" class="logo w-50">
                    </a>
                    <div class="collapse navbar-collapse" style="flex-grow: 0;">
                        <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary my-1 me-2"
                                    href="https://thpt-locninh-binhphuoc.edu.vn">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Privacy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="card">
                <div class="row align-items-center text-start">
                    <div class="col-xl-6">
                        <div class="card-body">
                            <div class="">
                                <h2 class="mb-4 f-w-600" align="center">Login</h2>
                            </div>
                            <form id="" class="mb-3" action="" method="POST" onsubmit="return validateForm()">
                                <?php 
                                    $token = bin2hex(random_bytes(16));
                                    $_SESSION['csrf_token'] = $token;
                                ?>
                                <input type="hidden" name="csrf_token" value="<?php echo $token ?>">
                                <div class="">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Your ID</label>
                                        <input class="form-control" type="text" name="id_user"
                                            placeholder="Enter your ID" required>
                                        <span id="id_user_error" style="color: red"></span>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Enter your password" required>
                                        <span id="password_error" style="color: red"></span>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" name="login" id="button"
                                            class="btn-login btn btn-primary btn-block mt-2">Login</button>
                                    </div>
                                </div>
                            </form>
                            <?php if(isset($_SESSION['msg'])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span><?= $_SESSION['msg']; ?></span>
                            </div>
                            <?php  endif ?>
                            <?php unset($_SESSION['msg']) ?>
                        </div>
                    </div>
                    <div class="col-xl-6 img-card-side">
                        <div class="auth-img-content">
                            <img src="./assets/images/img-auth-3.svg" alt="" class="img-fluid">
                            <h3 class="text-white mb-4 mt-5">
                                “A Winner Never Stops Trying”
                            </h3>
                            <p class="text-white" style="margin-left: 2.4rem">
                                Never stop learning because life never stops teaching.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="auth-footer">
                <div class="row">
                    <p style="vertical-align: text-bottom">Copyright &copy; <?php echo date("Y"); ?> <b> <br> Developed
                            By: Lam Hung Phuong </b></p>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function validateForm() {
    var id_user = document.getElementsByName('id_user')[0].value;

    var hasError = false;

    // Kiểm tra first_name có ký tự đặc biệt
    var specialCharacters = /[!@#$%^&*(),.?":{}|<>]/;
    if (specialCharacters.test(id_user)) {
        document.getElementById('id_user_error').textContent = 'Id cannot contain special characters.';
        return false
    } else {
        document.getElementById('id_user_error').textContent = '';
    }


    // Nếu không có lỗi, cho phép submit form
    return true;
}
</script>

</html>