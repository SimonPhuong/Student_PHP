<?php
$query = "SELECT classroom_name FROM classrooms WHERE id = :classroom_id LIMIT 1";
    $statement = $con->prepare($query);
    $statement->bindParam(':classroom_id', $classroomId);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['classroom_name'];
?>