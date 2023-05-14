<?php
ob_start();
include('includes/config.php');
?>
<?php

// Kiểm tra xem biểu mẫu đã được gửi đi hay chưa
if (isset($_POST['create_student_btn'])) 
{
    // Lấy dữ liệu từ biểu mẫu
    $id_user = $_POST['id_user'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $groups = $_POST['groups'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $grade_id = $_POST['grade'];
    $classroom_id = $_POST['classroom'];

    
    $query = "INSERT INTO users (id_user, password, groups, is_student) VALUES (?, ?, ?, 1)";
    $stmt = $con->prepare($query);
    $stmt_execute = $stmt->execute([$id_user, $password, $groups]);

    $user_id = $con->lastInsertId();
  
    $query = "INSERT INTO students (first_name, last_name, user_id, grade_id, classroom_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt_execute = $stmt->execute([$first_name, $last_name, $user_id , $grade_id, $classroom_id]);


    session_start();
    if ($stmt_execute) {
        $_SESSION['msg'] = "Created successfully!";
        header('Location: student.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Error!";
        header('Location: student.php');
        exit(0);
    }
}
?>
<script>
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
                        <input type="text" class="form-control ot-form-control ot-input mt-2" name="first_name" value=""
                            required>
                        <span id="first_name_error" style="color: red"></span>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group mb-3">
                        <label class="form-label">
                            <h5>Last Name</h5>
                        </label>
                        <input type="text" class="form-control ot-form-control ot-input mt-2" name="last_name" value=""
                            required>
                        <span id="last_name_error" style="color: red"></span>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="grade">
                            <h5>Grade</h5>
                        </label>
                        <select class="form-control ot-form-control ot-input mt-2" name="grade" id="grade" required>
                            <option value="">Select Grade</option>
                            <?php
                                $query = "SELECT * FROM grades";
                                $stmt = $con->query($query);
                                $grades = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                foreach ($grades as $grade) {
                                    echo '<option value="' . $grade['id'] . '">' . $grade['grade_name'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="classroom">
                            <h5>Classroom</h5>
                        </label>
                        <select class="form-control ot-form-control ot-input mt-2" name="classroom" id="classroom"
                            required>
                            <option value="">Select Grade</option>
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
                        <input type="number" class="form-control ot-form-control ot-input" name="id_user" value=""
                            required>
                        <span id="id_user_error" style="color: red"></span>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control ot-form-control ot-input" name="password" value=""
                            required>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label class="form-label" for="groups">
                            <h5>Groups</h5>
                        </label>
                        <input name="groups" id="groups" class="form-control ot-form-control ot-input" value="Student"
                            readonly>
                        </input>
                    </div>
                </div>
            </div>
            <hr>
            <button style="float: right;" type="submit" class="btn-submit" name="create_student_btn">Create</button>
        </form>
    </div>
</div>
<script>
document.getElementById('grade').addEventListener('change', function() {
    var gradeId = this.value;
    var classroomSelect = document.getElementById('classroom');

    while (classroomSelect.firstChild) {
        classroomSelect.removeChild(classroomSelect.firstChild);
    }

    // Gửi yêu cầu AJAX đến tác vụ server-side để lấy danh sách lớp học tương ứng với khối lớp được chọn
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_classroom.php?gradeId=' + gradeId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var classrooms = JSON.parse(xhr.responseText);

            classrooms.forEach(function(classroom) {
                var option = document.createElement('option');
                option.value = classroom.id;
                option.textContent = classroom.classroom_name;
                classroomSelect.appendChild(option);
            });
        }
    };
    xhr.send();
});
</script>
<?php
$title = '<a href="student.php">Student </a>';
$subTitle = 'Create Student';
$content = ob_get_clean();
require 'layout.php';
?>