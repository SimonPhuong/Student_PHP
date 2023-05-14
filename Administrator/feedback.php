<?php
ob_start();
include('includes/config.php');
?>
<?php
if (isset($_POST['delete_contact']))
{
    $contact_id = $_POST['delete_contact'];
    
    try {
        $query = "DELETE FROM contacts WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$contact_id]);

        session_start();
        $_SESSION['msg'] = "Deleted successfully";
        header('Location: feedback.php');
        exit(0);

    } catch (PDOException $e) {
        $con->rollback();

        session_start();
        $_SESSION['msg'] = "Error!";
        header('Location: feedback.php');
        exit(0);
    }
}
?>

<div class="table-content table-basic">
    <div class="card">
        <div class="card-body">
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

                        <!-- search -->
                        <div class="align-self-center">
                            <div class="search-box d-flex">
                                <input class="form-control" placeholder="Search title" name="search" id="searchInput"
                                    onkeydown="handleSearch(event)" autocomplete="off">
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
                            <th class="sorting_asc" style="width: 40px">
                                <div class="check-box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="all_check" />
                                    </div>
                                </div>
                            </th>
                            <th style="width: 50px">#</th>
                            <th class="sorting_desc">Headline</th>
                            <th class="sorting_desc" style="width: 100px">ID User</th>
                            <th class="sorting_desc" style="width: 100px">Group</th>
                            <th class="sorting_desc" style="width: 70px">Sent Date</th>
                            <th colspan="2">
                                <center>Action</center>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php 
                            $cnt=1;
                            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
                            $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';

                            $records = $con->prepare("SELECT COUNT(*) FROM news 
                                                        WHERE (title LIKE CONCAT('%', :searchKeyword, '%'))");
                            $records->bindParam(':searchKeyword', $searchKeyword);
                            $records->execute();
                            $total_records = $records->fetchColumn();

                            $total_pages = ceil($total_records/$limit);
                            
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($current_page - 1) * $limit;
                            $end = $start + $limit - 1;
                            $query = $con->prepare("SELECT contacts.*, users.id_user, users.groups FROM contacts
                                                    INNER JOIN users ON contacts.user_id = users.id
                                                    WHERE (contacts.headline LIKE CONCAT('%', :searchKeyword, '%'))
                                                    ORDER BY contacts.created_at DESC  
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
                            <td><?php echo $row['headline'] ?></td>
                            <td><?php echo $row['id_user'] ?></td>
                            <td><?php echo $row['groups'] ?></td>
                            <td><?php echo date_format(new DateTime($row['created_at']), 'd/m/Y - H:i') ?></td>
                            <td style="width: 50px">
                                <center>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#id<?= $row['id'] ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                            </td>
                            <div class="modal fade mt-5" id="id<?= $row['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                <?= $row['id_user']  ?> - <?= $row['groups'] ?>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <h6>
                                                <label for="">Headline: </label>
                                                <?= $row['headline'] ?>
                                            </h6>
                                            <hr>
                                            <p><?= $row['message'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td style="width: 50px">
                                <center>
                                    <form action="" method="POST">
                                        <button type="submit" class="btn btn-danger" name="delete_contact"
                                            value="<?= $row['id']; ?>"
                                            onclick="return confirm('Are you sure you want to delete this teacher?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                            </td>
                        </tr>
                        <?php
                            $cnt+=1;
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
$title = 'Feedback';
$content = ob_get_clean();
require 'layout.php';
?>