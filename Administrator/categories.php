<?php
ob_start();
include('includes/config.php');
?>
<?php
if (isset($_POST['submit'])) 
{
    // Lấy dữ liệu từ biểu mẫu
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO categories (category_name) VALUES (?)";
    $stmt = $con->prepare($query);
    $stmt->execute([$category_name]);
    
    session_start();
    if ($stmt) {
        $_SESSION['msg'] = "Created successfully!";
        header('Location: categories.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Error!";
        header('Location: categories.php');
        exit(0);
    }
}
if (isset($_POST['delete_category'])) {
    $category_id = $_POST['delete_category'];

    try {
        // Start transaction
        $con->beginTransaction();

        $query = "SELECT * FROM teachers WHERE category_id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$category_id]);
        $teachers = $stmt->fetchAll();
        
        // Update teachers with matching category_id
        $query = "UPDATE teachers SET category_id = 18 WHERE category_id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$category_id]);

        // Delete record in teachers table
        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$category_id]);
        

        // Commit the transaction
        $con->commit();


        session_start();
        $_SESSION['msg'] = "Deleted successfully!";
        header('Location: categories.php');
        exit(0);
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurred
        $con->rollback();

        session_start();
        $_SESSION['msg'] = "Error!";
        header('Location: categories.php');
        exit(0);
    }
}
?>

<div class="table-content table-basic">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between">
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

                <div class="col-4 d-flex">
                    <div class="align-self-flex-start">
                        <form action="" method="POST" id="category-form">
                            <h3 style="color:dimgray">Create category</h3>
                            <div class="form-group d-flex gap-2">
                                <input type="text" class="form-control" name="category_name" placeholder="Category name"
                                    value="" required>
                                <button style="float: right;" type="submit" class="btn-submit"
                                    name="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-5">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Category name</th>
                                    <th colspan="2">
                                        <center>Active</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="tbody">
                                <?php
                                    $cnt = 1;
                                    $limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
                                    
                                    $records = $con->prepare("SELECT COUNT(*) FROM categories");
                                    $records->execute();
                                    
                                    $total_records = $records->fetchColumn();
                                    
                                    $total_pages = ceil($total_records/$limit);
                                    
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start = ($current_page - 1) * $limit;
                                    $end = $start + $limit - 1;



                                    $query = "SELECT * FROM categories ORDER BY id ASC LIMIT :start, :limit";
                                    $stmt = $con->prepare($query);
                                    $stmt->bindParam(':start', $start, PDO::PARAM_INT);
                                    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                                    $stmt->execute();
                                    
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                    { $category_id = $row['id'];
                                        $category_name = $row['category_name'];
                                        $count_teacher = isset($teacher_counts[$category_id]) ? $teacher_counts[$category_id] : 0;
                                        ?>

                                <tr>
                                    <td><?= $cnt ?></td>
                                    <td><b><?= $row['category_name']?></b></td>

                                    <td align="center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#id<?= $row['id'] ?>">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                    <div class="modal fade mt-5" id="id<?= $row['id'] ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit category
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <input type="text" class="form-control"
                                                        value="<?= $row['category_name'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td align="center">
                                        <form action="" method="POST" style="display: inline-block;">
                                            <button type="submit" class="btn btn-danger" name="delete_category"
                                                value="<?= $row['id']; ?>"
                                                onclick="return confirm('Are you sure you want to delete this category?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    $cnt++;
                                } ?>

                            </tbody>
                        </table>
                        <div class="mt-5" style="display: flex; justify-content: end">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item">
                                        <?php if($current_page > 1 ) : ?>
                                        <a class="page-link" href="?page=<?php
                                        if($current_page > 1){
                                            echo $current_page-1;
                                        }
                                    ?>">
                                            «
                                        </a>
                                        <?php endif; ?>
                                    </li>


                                    <li class="page-item">
                                        <?php
                                            for ($page = 1; $page <= $total_pages; $page++) {
                                                if ($page == $current_page) {
                                                    echo "<li class='page-item active'><a class='page-link' href='#'>".$page."</a></li>";
                                                } else {
                                                    echo "<li class='page-item'><a class='page-link' href=' ?page=".$page."&limit=".$limit." '>".$page."</a></li>";
                                                }
                                            }
                                        ?>
                                    </li>


                                    <li class="page-item">
                                        <?php if($current_page < $total_pages ) : ?>
                                        <a class="page-link" href="?page=<?php 
                                    if($current_page < $total_pages){
                                        echo $current_page+1;
                                    }
                                    ?>">
                                            »
                                        </a>
                                        <?php endif; ?>
                                    </li>

                                    <!-- <?php
                                        if ($current_page > 1) {
                                            echo "<li class='page-item'><a class='page-link' href='?page=".($current_page-1)."'>Previous</a></li>";
                                        }
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($i == $current_page) {
                                                echo "<li class='page-item active'><a class='page-link' href='#'>".$i."</a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
                                            }
                                        }
                            
                            // Liên kết trang kế tiếp
                            if ($current_page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($current_page+1)."'>Next</a></li>";
                            }
                            
                            
                            ?> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<?php
    $stmt = $con->prepare("SELECT * FROM categories WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
$title = 'Categories';
$content = ob_get_clean();
require 'layout.php';
?>
?>