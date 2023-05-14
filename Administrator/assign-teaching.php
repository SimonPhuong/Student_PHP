<?php
ob_start();
include('includes/config.php');
?>

<?php
if (isset($_POST['save_btn'])) {
    $teacherIds = $_POST['teacher_id'];
    
    foreach ($teacherIds as $classroomId => $subjectTeachers) {
        foreach ($subjectTeachers as $subjectId => $teacherId) {
            if (!empty($teacherId)) {
                // Kiểm tra xem giáo viên đã được phân công cho lớp học và môn học nào hay chưa
                $teacherClassroomQuery = "SELECT * FROM teacher_classrooms WHERE classroom_id = :classroom_id AND subject_id = :subject_id LIMIT 1";
                $teacherClassroomStatement = $con->prepare($teacherClassroomQuery);
                $teacherClassroomStatement->bindParam(':classroom_id', $classroomId);
                $teacherClassroomStatement->bindParam(':subject_id', $subjectId);
                $teacherClassroomStatement->execute();
                $teacherClassroom = $teacherClassroomStatement->fetch(PDO::FETCH_ASSOC);
        
                $query = "SELECT classroom_name FROM classrooms WHERE id = :classroom_id LIMIT 1";
                $statement = $con->prepare($query);
                $statement->bindParam(':classroom_id', $classroomId);
                $statement->execute();
                $classroom_name = $statement->fetch(PDO::FETCH_ASSOC)['classroom_name'];
                
                // Nếu giáo viên chưa được phân công thì lưu lại
                if (!$teacherClassroom) {
                    $insertQuery = "INSERT INTO teacher_classrooms (teacher_id, classroom_id, classroom_name, subject_id) VALUES (:teacher_id, :classroom_id, :classroom_name, :subject_id)";
                    $insertStatement = $con->prepare($insertQuery);
                    $insertStatement->bindParam(':teacher_id', $teacherId);
                    $insertStatement->bindParam(':classroom_id', $classroomId);
                    $insertStatement->bindParam(':classroom_name', $classroom_name);
                    $insertStatement->bindParam(':subject_id', $subjectId);
                    $insertStatement->execute();
                } else {
                    // Nếu giáo viên đã được phân công, thực hiện update
                    $updateQuery = "UPDATE teacher_classrooms SET teacher_id = :teacher_id WHERE classroom_id = :classroom_id AND subject_id = :subject_id";
                    $updateStatement = $con->prepare($updateQuery);
                    $updateStatement->bindParam(':teacher_id', $teacherId);
                    $updateStatement->bindParam(':classroom_id', $classroomId);
                    $updateStatement->bindParam(':subject_id', $subjectId);
                    $updateStatement->execute();
                }
            }
        }
    }
    session_start();
    if ($insertStatement || $updateStatement) {
        $_SESSION['msg'] = "Successfully!";
        header('Location: assign-teaching.php');
        exit(0);
    } else {
        $_SESSION['msg'] = "Error!";
        header('Location: assign-teaching.php');
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
            <form method="POST" action="" class="form">
                <div class="table-responsive">
                    <?php
                        $query = "SELECT * FROM subjects";
                        $statement = $con->prepare($query);
                        $statement->execute();
                        $subjects = $statement->fetchAll(PDO::FETCH_ASSOC);

                        $query = "SELECT * FROM classrooms";
                        $statement = $con->prepare($query);
                        $statement->execute();
                        $classrooms = $statement->fetchAll(PDO::FETCH_ASSOC);

                        $query = "SELECT * FROM teachers";
                        $statement = $con->prepare($query);
                        $statement->execute();
                        $teachers = $statement->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <table class="table table-bordered" id="table">
                        <thead class="thead">
                            <tr>
                                <th>Class</th>
                                <?php foreach ($subjects as $subject) 
                                {
                                    echo '<th style="min-width: 200px;">' . $subject['subject_name'] . '</th>';
                                }
                                ?>
                            </tr>
                        </thead>

                        <tbody class="tbody">

                            <?php
                                foreach ($classrooms as $classroom) {
                                    echo '<tr>' ;
                                    echo '<td>' . $classroom['classroom_name'] . '</td>';
                                    foreach ($subjects as $subject) {
                                        echo '<td>';
                                        echo '<select name="teacher_id[' . $classroom['id'] . '][' . $subject['id'] . ']" class="form-control">';
                                        echo '<option value="">Select teacher</option>';
                                        foreach ($teachers as $teacher) {
                                            if ($teacher['subject_id'] == $subject['id']) {
                                                $teacher_classroom_query = "SELECT * FROM teacher_classrooms WHERE classroom_id = :classroom_id AND subject_id = :subject_id LIMIT 1";
                                                $teacher_classroom_statement = $con->prepare($teacher_classroom_query);
                                                $teacher_classroom_statement->bindParam(':classroom_id', $classroom['id']);
                                                $teacher_classroom_statement->bindParam(':subject_id', $subject['id']);
                                                $teacher_classroom_statement->execute();
                                                $teacher_classroom = $teacher_classroom_statement->fetch(PDO::FETCH_ASSOC);

                                                echo '<option value="' . $teacher['id'] . '"';
                                                if ($teacher_classroom && $teacher_classroom['teacher_id'] == $teacher['id']) {
                                                    echo ' selected';
                                                }
                                                echo '>' . $teacher['last_name'] . '</option>';
                                            }
                                        }
                                        echo '</select>';
                                        echo '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>

                        </tbody>
                    </table>
                    <button type="submit" class="mt-5 btn btn-submit" id="submit-button" style=""
                        name="save_btn">Save</button>
            </form>
        </div>
    </div>
</div>
<?php
$title = 'Assign Teaching';
$content = ob_get_clean();
require 'layout.php';
?>