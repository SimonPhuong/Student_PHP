<?php
ob_start();
include('includes/config.php');
?>
<?php
// Kiểm tra xem biểu mẫu đã được gửi đi hay chưa
if (isset($_POST['update_teacher_btn'])) 
{
    // Lấy dữ liệu từ biểu mẫu
    $id_user = $_POST['id_user'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $groups = $_POST['groups'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject_id = $_POST['subject'];

    // Cập nhật thông tin người dùng
    $query = "UPDATE users SET groups = ?, password = ? WHERE id_user = ?";
    $stmt = $con->prepare($query);
    $stmt->execute([$groups, $password, $id_user]);

    // Lấy user_id của giáo viên
    $query = "SELECT user_id FROM teachers WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->execute([$_GET['id']]);
    $user_id = $stmt->fetchColumn();

    // Cập nhật thông tin giáo viên
    $query = "UPDATE teachers SET first_name = ?, last_name = ?, subject_id = ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->execute([$first_name, $last_name, $subject_id, $_GET['id']]);

    session_start();
    if ($stmt) {
        $_SESSION['msg'] = "Updated successfully!";
        header('Location: teacher.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Error!";
        header('Location: teacher.php');
        exit(0);
    }
}

// Lấy thông tin giáo viên từ CSDL
$query = "SELECT t.*, u.groups FROM teachers t JOIN users u ON t.user_id = u.id_user WHERE t.id = ?";
$stmt = $con->prepare($query);
$stmt->execute([$_GET['id']]);
$teacher = $stmt->fetch(PDO::FETCH_ASSOC);

// Lấy danh sách môn học
$querySubjects = $con->query('SELECT * FROM subjects');
$subjects = $querySubjects->fetchAll(PDO::FETCH_ASSOC);
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var updateSuccess =
        <?php echo isset($_SESSION['update_success']) && $_SESSION['update_success'] ? 'true' : 'false'; ?>;
    if (updateSuccess) {
        document.getElementById('success-alert').style.display = 'block';
    }
});

function validateForm() {
    var firstName = document.getElementsByName('first_name')[0].value;
    var lastName = document.getElementsByName('last_name')[0].value;
    var idUser = document.getElementsByName('id_user')[0].value;

    var hasError = false;

    // Kiểm tra first_name có ký tự đặc biệt
    var specialCharacters = /[!@#$%^&*(),.?":{}|<>]/;
    if (specialCharacters.test(firstName)) {
        document.getElementById('first_name_error').textContent = 'First name cannot contain special characters.';
        hasError = true;
    } else {
        document.getElementById('first_name_error').textContent = '';
    }

    // Kiểm tra last_name có ký tự đặc biệt
    if (specialCharacters.test(lastName)) {
        document.getElementById('last_name_error').textContent = 'Last name cannot contain special characters.';
        hasError = true;
    } else {
        document.getElementById('last_name_error').textContent = '';
    }

    // Kiểm tra id_user có nhiều hơn 8 ký tự
    if (idUser.length > 8) {
        document.getElementById('id_user_error').textContent = 'ID cannot be longer than 8 characters.';
        hasError = true;
    } else {
        document.getElementById('id_user_error').textContent = '';
    }

    // Nếu có lỗi, ngăn chặn việc submit và hiển thị thông báo lỗi chung
    if (hasError) {
        document.getElementById('error-alert').textContent =
            'Error! Please fill in the correct information.';
        document.getElementById('error-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('error-alert').style.display = 'none';
    }

    // Nếu không có lỗi, cho phép submit form
    return true;
}
</script>

<div class="card ot-card">
    <div class="card-body">

        <div class="col-sm-4">
            <div id="error-alert" class="alert alert-danger" role="alert" style="display: none;">
                <span id="errors" style="color: red;"></span>
            </div>
        </div>
        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $stmt = $con->prepare("SELECT * FROM teachers 
                                    INNER JOIN users  ON teachers.user_id = users.id
                                    WHERE teachers.id = :teacher_id LIMIT 1");

            $stmt->bindParam(':teacher_id', $id);

            $stmt->execute();

            $teacher = $stmt->fetch(PDO::FETCH_ASSOC);

        }    
        ?>
        <form method="POST" action="" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-12">
                    <div class="form-title mb-3">
                        <h3>Basic details</h3>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 col-sm-3">
                    <div class="form-group mb-3">
                        <label class="form-label">
                            <h5>First Name</h5>
                        </label>
                        <input type="text" class="form-control ot-form-control ot-input mt-2" name="first_name"
                            value="<?= $teacher['first_name']; ?>" required>
                        <span id="first_name_error" style="color: red"></span>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group mb-3">
                        <label class="form-label">
                            <h5>Last Name</h5>
                        </label>
                        <input type="text" class="form-control ot-form-control ot-input mt-2" name="last_name"
                            value="<?= $teacher['last_name']; ?>" required>
                        <span id="last_name_error" style="color: red"></span>
                    </div>
                </div>

                <?php
                    $querySubjects = $con->query('SELECT * FROM subjects');
                    $subjects = $querySubjects->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="col-12 col-sm-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="subject">
                            <h5>Subjects</h5>
                        </label>
                        <select class="form-control ot-form-control ot-input mt-2" name="subject" required>
                            <option value="">Select Subject</option>
                            <?php foreach ($subjects as $subject): ?>
                            <option value="<?php echo $subject['id']; ?>"
                                <?php if ($teacher['subject_id'] == $subject['id']) echo 'selected'; ?>>
                                <?php echo $subject['subject_name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="form-title mb-3">
                        <h3>Login details</h3>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label class="form-label" for="id_user">ID</label>
                        <input type="number" class="form-control ot-form-control ot-input" name="id_user"
                            value="<?= $teacher['id_user']; ?>" readonly required>
                        <span id="id_user_error" style="color: red"></span>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control ot-form-control ot-input" name="password"
                            value="<?= $teacher['password'] ?>" required>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label class="form-label" for="groups">
                            <h5>Groups</h5>
                        </label>
                        <input name="groups" id="groups" class="form-control ot-form-control ot-input" value="Teacher"
                            readonly>
                        </input>
                    </div>
                </div>
            </div>
            <hr>
            <button style="float: right;" type="submit" class="btn-submit" name="update_teacher_btn">Update</button>
        </form>
    </div>
</div>

<?php
$title = '<a href="teacher.php">Teacher </a>';
$subTitle = 'Edit Teacher';
$content = ob_get_clean();
require 'layout.php';
?>