<?php 

    require_once('includes/config.php');


    if(isset($_POST['action'])) {
        if($_POST['action'] == "getStudent") {
            $class = $_POST['lop'];

            $query = "SELECT * FROM hocsinh WHERE lop = '".$class."' ";
            
            $data = array();
            $std_all = $con->query($query);
            if($std_all->num_rows > 0) {
                $all_rows = [];

                while($users = $std_all->fetch_assoc()) {
                    array_push($all_rows, $users);
                }
                $data['status']='1';
                $data['std_list']=$all_rows;

            }else{
                $data['status']='0';
            }
            echo json_encode($data);
            }

        }

?>