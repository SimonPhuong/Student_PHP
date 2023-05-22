<?php
ob_start();
include('includes/config.php');
?>
<?php
session_start();
error_reporting(0);
if (isset($_POST['change_password'])) 
{
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $id_user = $_SESSION['login'];

    $query = "SELECT password FROM users WHERE id_user = ?";
    $stmt = $con->prepare($query);
    $stmt->execute([$id_user]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($stmt) 
    {
        if (password_verify($current_password, $row['password'])) {
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            $query = "UPDATE users SET password = ? WHERE id_user = ?";
            $stmt = $con->prepare($query);
            $stmt->execute([$hashed_password, $id_user]);

            if ($stmt) {
                $_SESSION['msg'] = 'Change successfully!';
                header('Location: change-password.php');
                exit(0);
            } else {
                $_SESSION['msg'] = 'Error!';
                header('Location: change-password.php');
                exit(0);
            }
        } else {
            $_SESSION['msg'] = 'Incorrect current password.';
            header('Location: change-password.php');
            exit(0);
        }
    } else {
        $_SESSION['msg'] = 'User not found.';
        header('Location: change-password.php');
        exit(0);
    }
}
?>

<script>
function validateForm() {
    var currentPassword = document.getElementsByName('current_password')[0].value;
    var newPassword = document.getElementsByName('new_password')[0].value;
    var confirmPassword = document.getElementsByName('confirm_password')[0].value;

    var hasError = false;

    // Kiểm tra mật khẩu mới
    if (newPassword.length < 6) {
        document.getElementById('new_password_error').textContent = 'New password must be at least 6 characters long.';
        hasError = true;
    } else if (newPassword === currentPassword) {
        document.getElementById('new_password_error').textContent =
            'The new password cannot be the same as the current password.';
        hasError = true;
    } else {
        document.getElementById('new_password_error').textContent = '';
    }

    // Kiểm tra mật khẩu xác nhận
    if (confirmPassword !== newPassword) {
        document.getElementById('confirm_password_error').textContent =
            'Confirm password does not match the new password.';
        hasError = true;
    } else {
        document.getElementById('confirm_password_error').textContent = '';
    }

    if (hasError) {
        return false;
    }

    return true;
}
</script>


<div class="table-content table-basic">
    <div class="card">
        <div class="card-body">
            <!-- notification -->
            <div class="col-12 mb-5">
                <?php
                session_start();
                error_reporting(0);
                if(isset($_SESSION['msg'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['msg']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php  endif ?>
                <?php unset($_SESSION['msg']) ?>
            </div>

            <form method="POST" action="" onsubmit="return validateForm()">
                <div class="row mb-4">
                    <div class="col-12 col-sm-6">
                        <div class="form-group mb-3">
                            <label class="form-label">
                                <h5>Current password</h5>
                            </label>
                            <input type="text" class="form-control ot-form-control ot-input mt-2"
                                name="current_password" value="" required>
                            <span id="current_password_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-sm-6">
                        <div class="form-group mb-3">
                            <label class="form-label">
                                <h5>New password</h5>
                            </label>
                            <input type="text" class="form-control ot-form-control ot-input mt-2" name="new_password"
                                value="" required>
                            <span id="new_password_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-sm-6">
                        <div class="form-group mb-3">
                            <label class="form-label">
                                <h5>Confirm password</h5>
                            </label>
                            <input type="text" class="form-control ot-form-control ot-input mt-2"
                                name="confirm_password" value="" required>
                            <span id="confirm_password_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-submit" name="change_password">Change password</button>
            </form>
        </div>
    </div>
</div>
<?php
$id_user = $_SESSION['login'];

$query = "SELECT password FROM users WHERE id_user = ?";
$stmt = $con->prepare($query);
$stmt->execute([$id_user]);
$row = $stmt->fetchColumn();
echo $row;
echo $row['password'];
password_verify(123456, $row['password'])
?>

<?php
$title = 'Change password';
$content = ob_get_clean();
require 'layout.php';
?>