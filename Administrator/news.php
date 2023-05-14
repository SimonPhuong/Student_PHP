<?php
ob_start();
include('includes/config.php');
?>
<?php

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

                        <div class="align-self-center d-flex flex-wrap gap-2">
                            <!-- add btn -->

                            <div class="align-self-center">
                                <a href="create.news.php" role="button" class="btn-add" data-bs-toggle="tooltip"
                                    data-bs-placement="right">
                                    <span><i class="fa-solid fa-plus"></i> </span>
                                    <span class="d-none d-xl-inline">Create</span>
                                </a>
                            </div>
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
                            <th class="sorting_asc">
                                <div class="check-box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="all_check" />
                                    </div>
                                </div>
                            </th>
                            <th>#</th>
                            <th class="sorting_desc">Category</th>
                            <th class="sorting_desc">Title</th>
                            <th class="sorting_desc">Created At</th>
                            <th class="sorting_desc">Updated At</th>
                            <th colspan="2">
                                <center>Action</center>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php 
                            $cnt=1;
                            $limit = isset($_GET['limit']) ? $_GET['limit'] : 1;
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
                            $query = $con->prepare("SELECT news.*, categories.category_name  FROM news
                                                    INNER JOIN categories ON news.category_id = categories.id
                                                    WHERE (news.title LIKE CONCAT('%', :searchKeyword, '%'))
                                                    ORDER BY news.created_at DESC  
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
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td><?php echo $row['updated_at'] ?></td>
                            <td>
                                <center>
                                    <a href="edit-teacher.php?id=<?= $row['id']; ?>" class="btn btn-warning"><i
                                            class="fa fa-pencil"></i>
                                    </a>
                            </td>
                            <td>
                                <center>
                                    <form action="" method="POST">
                                        <button type="submit" class="btn btn-danger" name="delete_teacher"
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
$title = 'News';
$content = ob_get_clean();
require 'layout.php';
?>