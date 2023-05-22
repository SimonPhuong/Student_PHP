<?php
ob_start();
include('includes/config.php');
?>
<?php
if (isset($_POST['submit'])) 
{
    // Lấy dữ liệu từ biểu mẫu
    $classroom_name = $_POST['classroom_name'];

    $query = "INSERT INTO classrooms (classroom_name) VALUES (?)";
    $stmt = $con->prepare($query);
    $stmt->execute([$classroom_name]);
    
    session_start();
    if ($stmt) {
        $_SESSION['msg'] = "Created successfully!";
        header('Location: classrooms.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Error!";
        header('Location: classrooms.php');
        exit(0);
    }
}
if (isset($_POST['delete_classroom'])) {
    $classroom_id = $_POST['delete_classroom'];

    try {
        // Start transaction
        $con->beginTransaction();

        $query = "SELECT * FROM teachers WHERE classroom_id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$classroom_id]);
        $teachers = $stmt->fetchAll();
        
        // Update teachers with matching classroom_id
        $query = "UPDATE teachers SET classroom_id = 18 WHERE classroom_id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$classroom_id]);

        // Delete record in teachers table
        $query = "DELETE FROM classrooms WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$classroom_id]);
        

        // Commit the transaction
        $con->commit();


        session_start();
        $_SESSION['msg'] = "Deleted successfully!";
        header('Location: classrooms.php');
        exit(0);
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurred
        $con->rollback();

        session_start();
        $_SESSION['msg'] = "Error!";
        header('Location: classrooms.php');
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
                        <form action="" method="POST" id="classroom-form">
                            <h3 style="color:dimgray">Create classroom</h3>
                            <div class="form-group d-flex gap-2">
                                <input type="text" class="form-control" name="classroom_name"
                                    placeholder="Classroom name" value="" required>
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
                                    <th>Classroom name</th>
                                    <th colspan="2">
                                        <center>Active</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="tbody">
                                <?php
                                    $limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
                                    
                                    $records = $con->prepare("SELECT COUNT(*) FROM classrooms");
                                    $records->execute();
                                    
                                    $total_records = $records->fetchColumn();
                                    
                                    $total_pages = ceil($total_records/$limit);
                                    
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start = ($current_page - 1) * $limit;
                                    $end = $start + $limit - 1;

                                    $cnt=($limit * ($current_page - 1)) + 1;;

                                    $query = "SELECT * FROM classrooms ORDER BY id ASC LIMIT :start, :limit";
                                    $stmt = $con->prepare($query);
                                    $stmt->bindParam(':start', $start, PDO::PARAM_INT);
                                    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                                    $stmt->execute();
                                    
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                    { 
                                        $classroom_id = $row['id'];
                                        $classroom_name = $row['classroom_name'];
                                        $count_teacher = isset($teacher_counts[$classroom_id]) ? $teacher_counts[$classroom_id] : 0;
                                        ?>

                                <tr>
                                    <td><?= $cnt ?></td>
                                    <td><b><?= $row['classroom_name']?></b></td>

                                    <td align="center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#id<?= $classroom_id ?>">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                    <div class="modal fade mt-5" id="id<?= $classroom_id ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php
                                                    if (isset($_POST['update'])) {
                                                        $new_classroom_name = $_POST['new_classroom_name'];
                                                        $classroom_id = $_POST['classroom_id'];
                                                    
                                                        // Thực hiện câu truy vấn cập nhật tên môn học
                                                        $update_query = "UPDATE classrooms SET classroom_name = ? WHERE id = ?";
                                                        $update_stmt = $con->prepare($update_query);
                                                        $update_stmt->execute([$new_classroom_name, $classroom_id]);
                                                    
                                                        // Refresh trang sau khi cập nhật thành công
                                                        header("Refresh:0");
                                                    }
                                                ?>
                                                <form action="" method="POST">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                            classroom
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <input type="hidden" name="classroom_id"
                                                            value="<?= $classroom_id ?>">
                                                        <input type="text" class="form-control"
                                                            name="new_classroom_name"
                                                            value="<?= $row['classroom_name'] ?>">
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
                                            <button type="submit" class="btn btn-danger" name="delete_classroom"
                                                value="<?= $row['id']; ?>"
                                                onclick="return confirm('Are you sure you want to delete this classroom?')"><i
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
    $stmt = $con->prepare("SELECT * FROM classrooms WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!-- <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit classroom
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input type="text" class="form-control" value="<?= $row['classroom_name'] ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save
                    changes</button>
            </div>
        </div>
    </div>
</div> -->


<?php
$title = 'Classrooms';
$content = ob_get_clean();
require 'layout.php';
?>
?>