<?php
include('includes/config.php');
$gradeId = $_GET['gradeId'];

// Truy vấn cơ sở dữ liệu để lấy danh sách lớp học tương ứng với khối lớp
$query = "SELECT * FROM classrooms WHERE grade_id = :gradeId";
$stmt = $con->prepare($query);
// $stmt->bindParam(':gradeId', $gradeId);
$stmt->bindValue(':gradeId', intval($gradeId), PDO::PARAM_INT);
$stmt->execute();
$classrooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Trả về danh sách lớp học dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($classrooms);
?>