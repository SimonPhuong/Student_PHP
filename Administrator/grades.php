<?php
ob_start();
include('includes/config.php');
?>
<?php
if (isset($_POST['submit'])) 
{
    // Lấy dữ liệu từ biểu mẫu
    $grade_name = $_POST['grade_name'];

    $query = "INSERT INTO grades (grade_name) VALUES (?)";
    $stmt = $con->prepare($query);
    $stmt->execute([$grade_name]);
    
    session_start();
    if ($stmt) {
        $_SESSION['msg'] = "Created successfully!";
        header('Location: grades.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Error!";
        header('Location: grades.php');
        exit(0);
    }
}
if (isset($_POST['delete_grade'])) {
    $grade_id = $_POST['delete_grade'];

    try {
        // Start transaction
        $con->beginTransaction();

        $query = "SELECT * FROM teachers WHERE grade_id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$grade_id]);
        $teachers = $stmt->fetchAll();
        
        // Update teachers with matching grade_id
        $query = "UPDATE teachers SET grade_id = 18 WHERE grade_id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$grade_id]);

        // Delete record in teachers table
        $query = "DELETE FROM grades WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$grade_id]);
        

        // Commit the transaction
        $con->commit();


        session_start();
        $_SESSION['msg'] = "Deleted successfully!";
        header('Location: grades.php');
        exit(0);
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurred
        $con->rollback();

        session_start();
        $_SESSION['msg'] = "Error!";
        header('Location: grades.php');
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
                        <form action="" method="POST" id="grade-form">
                            <h3 style="color:dimgray">Create grade</h3>
                            <div class="form-group d-flex gap-2">
                                <input type="text" class="form-control" name="grade_name" placeholder="Grade name"
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
                                    <th>Grade name</th>
                                    <th colspan="2">
                                        <center>Active</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="tbody">
                                <?php
                                    $cnt = 1;
                                    $limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
                                    
                                    $records = $con->prepare("SELECT COUNT(*) FROM grades");
                                    $records->execute();
                                    
                                    $total_records = $records->fetchColumn();
                                    
                                    $total_pages = ceil($total_records/$limit);
                                    
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start = ($current_page - 1) * $limit;
                                    $end = $start + $limit - 1;



                                    $query = "SELECT * FROM grades ORDER BY id ASC LIMIT :start, :limit";
                                    $stmt = $con->prepare($query);
                                    $stmt->bindParam(':start', $start, PDO::PARAM_INT);
                                    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                                    $stmt->execute();
                                    
                                    

                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                    { 
                                        $grade_id = $row['id'];
                                        $grade_name = $row['grade_name'];
                                        $count_teacher = isset($teacher_counts[$grade_id]) ? $teacher_counts[$grade_id] : 0;
                                        ?>

                                <tr>
                                    <td><?= $cnt ?></td>
                                    <td><b><?= $row['grade_name']?></b></td>

                                    <td align="center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#id<?= $grade_id ?>">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                    <div class="modal fade mt-5" id="id<?= $grade_id ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php
                                                    if (isset($_POST['update'])) {
                                                        $new_grade_name = $_POST['new_grade_name'];
                                                        $grade_id = $_POST['grade_id'];
                                                    
                                                        // Thực hiện câu truy vấn cập nhật tên môn học
                                                        $update_query = "UPDATE grades SET grade_name = ? WHERE id = ?";
                                                        $update_stmt = $con->prepare($update_query);
                                                        $update_stmt->execute([$new_grade_name, $grade_id]);
                                                    
                                                        // Refresh trang sau khi cập nhật thành công
                                                        header("Refresh:0");
                                                    }
                                                ?>
                                                <form action="" method="POST">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit grade
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <input type="hidden" name="grade_id" value="<?= $grade_id ?>">
                                                        <input type="text" class="form-control" name="new_grade_name"
                                                            value="<?= $row['grade_name'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="update">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <td align="center">
                                        <form action="" method="POST" style="display: inline-block;">
                                            <button type="submit" class="btn btn-danger" name="delete_grade"
                                                value="<?= $row['id']; ?>"
                                                onclick="return confirm('Are you sure you want to delete this grade?')"><i
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
    $stmt = $con->prepare("SELECT * FROM grades WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
$title = 'Grades';
$content = ob_get_clean();
require 'layout.php';
?>
?>