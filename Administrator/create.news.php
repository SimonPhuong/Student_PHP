<?php
ob_start();
include('includes/config.php');
?>
<?php

// Kiểm tra xem biểu mẫu đã được gửi đi hay chưa
if (isset($_POST['create_news_btn'])) 
{
    // Lấy dữ liệu từ biểu mẫu
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $current_time = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO news (category_id, title, content, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt_execute = $stmt->execute([$category_id, $title, $content, $current_time]);

    session_start();
    if ($stmt_execute) {
        $_SESSION['msg'] = "Created successfully!";
        header('Location: news.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Error!";
        header('Location: news.php');
        exit(0);
    }

    
}
?>
<div class="table-content table-basic">
    <div class="card ot-card">
        <div class="card-body">
            <!-- notification -->
            <div class="col-sm-4">
                <div id="error-alert" class="alert alert-danger" role="alert" style="display: none;">
                    <span id="errors" style="color: red;"></span>
                </div>
            </div>


            <form method="POST" action="" onsubmit="return validateForm()">
                <?php
                    $queryCategories = $con->query('SELECT * FROM categories');
                    $categories = $queryCategories->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="col-4">
                    <div class="form-group mb-3">
                        <label class="form-label">
                            <h5>Category</h5>
                        </label>
                        <select class="form-control ot-form-control ot-input mt-2" name="category_id" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>">
                                <?php echo $category['category_name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group mb-3">
                        <label class="form-label">
                            <h5>Title</h5>
                        </label>
                        <input type="text" class="form-control ot-form-control ot-input mt-2" name="title" value=""
                            placeholder="Enter Title" required>
                        <span id="title_error" style="color: red"></span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">
                        <h5>Content</h5>
                    </label>
                    <textarea id="content" name="content" class="ckeditor" required></textarea>

                    <span id="content_error" style="color: red"></span>
                </div>
                <button style="float: right;" type="submit" class="btn-submit" name="create_news_btn">Create</button>
            </form>
        </div>
    </div>
</div>
<script>
function validateForm() {
    var title = document.getElementsByName('title')[0].value;
    var content = document.getElementsByName('content')[0].value;

    var hasError = false;


    // var specialCharacters = /[!@#$%^&*(),.?":{}|<>]/;
    if (title.length < 8) {
        document.getElementById('title_error').textContent = 'Title cannot be less than 8 characters.';
        hasError = true;
    } else {
        document.getElementById('title_error').textContent = '';
    }

    if (content.length < 50) {
        document.getElementById('content_error').textContent = 'Content cannot be less than 50 characters.';
        hasError = true;
    } else {
        document.getElementById('content_error').textContent = '';
    }

    // Nếu có lỗi, ngăn chặn việc submit và hiển thị thông báo lỗi chung
    if (hasError) {
        document.getElementById('error-alert').textContent =
            'Please fill in the correct information.';
        document.getElementById('error-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('error-alert').style.display = 'none';
    }

    // Nếu không có lỗi, cho phép submit form
    return true;
}
</script>
<?php
$title = '<a href="category.php">category </a>';
$subTitle = 'Create category';
$content = ob_get_clean();
require 'layout.php';
?>