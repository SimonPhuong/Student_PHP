<?php
echo'
 <aside>
 <div class="top">
     <div class="logo">
         <img src="./img/github.png">
         <h2>VIE<span class="danger">EDU</span></h2>
     </div>
     <div class="close" id="close-btn">
         <span class="material-icons-sharp">close</span>
     </div>
 </div>
 <div class="sidebar">
     <a href="index.php" class="active" title="Trang chủ">
         <span class="material-icons-sharp">dashboard</span>
         <h3>Dashboard</h3>
     </a>
     <a href="detailstudent.php" title="Thông tin chi tiết">
         <span class="material-icons-sharp">person_outline</span>
         <h3>View details</h3>
     </a>
     <a href="editstudent.php" title="Chỉnh sửa thông tin">
    <span class="material-icons-sharp">edit</span>
    <h3>Edit infomation</h3>
    </a>
     <a href="seeteacher.php" title="Xem đội ngũ giáo viên">
         <span class="material-icons-sharp">school</span>
         <h3>See the team of teachers</h3>
     </a>
     <a href="seestudent.php"  title="Xem học sinh trong lớp của mình">
         <span class="material-icons-sharp">groups</span>
         <h3>See students in class</h3>
     </a>
     <a href="contactstudent.php" title="Gửi góp ý, liên hệ">
         <span class="material-icons-sharp">add_circle_outline</span>
         <h3>Contact</h3>
     </a>
     <a href="changepassstudent.php" title="Thay đổi mật khẩu">
         <span class="material-icons-sharp">add_circle_outline</span>
         <h3>Change the password</h3>
     </a>
     <a href="logout.php">
             <span class="material-icons-sharp">logout</span>
             <button class="form-control" type="submit" id="nut1" name="nut1" value="Đăng xuất">Log
                 out</button>
     </a>
 </div>
</aside>';
?>