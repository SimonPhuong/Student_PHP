<?php
ob_start();
include('includes/config.php');
?>
<?php
if (isset($_POST['delete_student'])) {
    $student_id = $_POST['delete_student'];


    try {
        // Get user_id from students table
        $query = "SELECT user_id FROM students WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$student_id]);
        $user_id = $stmt->fetchColumn();

        // Delete record in students table
        $query = "DELETE FROM students WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$student_id]);



        // Delete related records in users table
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$user_id]);

        session_start();
        $_SESSION['msg'] = "Deleted successfully!";
        header('Location: student.php');
        exit(0);
    } catch (PDOException $e) {
        // Rollback the transaction if an error occurred
        $con->rollback();

        session_start();
        $_SESSION['msg'] = "Error!";
        header('Location: student.php');
        exit(0);
    }
}
?>

<div class="table-content table-basic">
    <div class="card">
        <div class="card-body">
            <!-- Notification -->
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
            <!-- toolbar table start -->
            <div
                class="table-toolbar d-flex flex-wrap flex-xl-row justify-content-center justify-content-xxl-between align-content-center pb-3">
                <div class="align-self-center">
                    <div class="d-flex flex-wrap gap-2 flex-lg-row justify-content-center align-content-center">
                        <!-- show per page -->
                        <div class="align-self-center">
                            <label>
                                <select class="form-select d-inline-block" id="entries" onchange="usersDatatable()">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>

                        <div class="align-self-center d-flex flex-wrap gap-2">
                            <!-- add btn -->

                            <div class="align-self-center">
                                <a href="create.student.php" role="button" class="btn-add" data-bs-toggle="tooltip"
                                    data-bs-placement="right">
                                    <span><i class="fa-solid fa-plus"></i> </span>
                                    <span class="d-none d-xl-inline">Create</span>
                                </a>
                            </div>
                        </div>

                        <!-- search -->
                        <div class="align-self-center">
                            <div class="search-box d-flex">
                                <input class="form-control" placeholder="Search name or ID" name="search"
                                    id="searchInput" onkeydown="handleSearch(event)" autocomplete="off">
                                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- toolbar table end -->


            <!--  table start -->
            <div class="table-responsive">
                <table class="table table-bordered" id="table">
                    <thead class="thead">
                        <tr>
                            <th class="sorting_asc">
                                <div class="check-box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="all_check" />
                                    </div>
                                </div>
                            </th>
                            <th>#</th>
                            <th class="sorting_desc">ID</th>
                            <th class="sorting_desc">First Name</th>
                            <th class="sorting_desc">Last Name</th>
                            <th class="sorting_desc">Gender</th>
                            <th class="sorting_desc">Grade</th>
                            <th class="sorting_desc">Class</th>
                            <th colspan="2">
                                <center>Contact</center>
                            </th>
                            <th colspan="2">
                                <center>Action</center>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php 
                            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
                            $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';

                            $records = $con->prepare("SELECT COUNT(*) FROM students 
                                                        WHERE (first_name LIKE CONCAT('%', :searchKeyword, '%'))
                                                        OR (last_name LIKE CONCAT('%', :searchKeyword, '%'))");
                            $records->bindParam(':searchKeyword', $searchKeyword);
                            $records->execute();
                            $total_records = $records->fetchColumn();

                            $total_pages = ceil($total_records/$limit);
                            
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($current_page - 1) * $limit;
                            $end = $start + $limit - 1;

                            $cnt=($limit * ($current_page - 1)) + 1;;

                            $query = $con->prepare("SELECT s.id, s.first_name, s.last_name, s.gender, s.phone, s.email, c.classroom_name, g.grade_name, u.id_user 
                                                    FROM students s INNER JOIN classrooms c ON s.classroom_id = c.id
                                                    INNER JOIN users u ON s.user_id = u.id
                                                    INNER JOIN grades g ON s.grade_id = g.id
                                                    WHERE (s.first_name LIKE CONCAT('%', :searchKeyword, '%'))
                                                    OR (s.last_name LIKE CONCAT('%', :searchKeyword, '%'))
                                                    ORDER BY s.first_name ASC  
                                                    LIMIT :start, :limit");
                            $query->bindParam(':searchKeyword', $searchKeyword);
                            $query->bindParam(':start', $start, PDO::PARAM_INT);
                            $query->bindParam(':limit', $limit, PDO::PARAM_INT);
                            $query->execute();
                            while($row = $query->fetch(PDO::FETCH_ASSOC))
                            {
                        ?>
                        <tr>
                            <td>
                                <div class="check-box">
                                    <div class="form-check">
                                        <input class="form-check-input column_id" id="" onclick="" type="checkbox"
                                            name="column_id[]">
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $cnt?></td>
                            <td><?php echo $row['id_user'] ?></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['grade_name'] ?></td>
                            <td><?php echo $row['classroom_name'] ?></td>
                            <td>0<?php echo $row['phone'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td>
                                <center>
                                    <a href="edit-student.php?id=<?= $row['id']; ?>" class="btn btn-warning"><i
                                            class="fa fa-pencil"></i>
                                    </a>
                            </td>
                            <td>
                                <center>
                                    <form action="" method="POST">
                                        <button type="submit" class="btn btn-danger" name="delete_student"
                                            value="<?= $row['id']; ?>"
                                            onclick="return confirm('Are you sure you want to delete this student?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
                                            echo "<li class='page-item'><a class='page-link' href='?page=".$page."&limit=".$limit."&search=".$searchKeyword."'>".$page."</a></li>";
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
            <!--  table end -->
        </div>
    </div>
</div>
<script>
function handleSearch(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        usersDatatable()
    }
}

function usersDatatable() {
    var searchKeyword = document.getElementById("searchInput").value;
    var limit = document.getElementById("entries").value;

    var url = "?page=1&limit=" + limit;

    if (searchKeyword.trim() !== "") {
        url += "&search=" + encodeURIComponent(searchKeyword);
    }

    window.location.href = url;
}

document.getElementById("entries").value = "<?php echo $limit; ?>";

document.getElementsByName("search")[0].value =
    "<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>";

document.getElementById('all_check').addEventListener('click', function() {
    var checkboxes = document.querySelectorAll('.column_id');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
    }
});
</script>
<?php
$title = 'Student';
$content = ob_get_clean();
require 'layout.php';
?>