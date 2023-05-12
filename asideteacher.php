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
    <a href="indexteacher.php" class="active" title="Trang chủ">
        <span class="material-icons-sharp">dashboard</span>
        <h3>Dashboard</h3>
    </a>
    <a href="detailteacher.php" title="Thông tin chi tiết">
        <span class="material-icons-sharp">person_outline</span>
        <h3>View details</h3>
    </a>
    <a href="seestudentbyteacher.php" title="Xem học sinh của các lớp">
    <span class="material-icons-sharp">groups</span>
    <h3>See students in class</h3>
    </a>
    <a href="contactteacher.php" title="Gửi góp ý, liên hệ">
        <span class="material-icons-sharp">add_circle_outline</span>
        <h3>Contact</h3>
    </a>
    <a href="changepassteacher.php" title="Thay đổi mật khẩu">
        <span class="material-icons-sharp">add_circle_outline</span>
        <h3>Change the password</h3>
    </a>
    <a href="logout.php">
            <span class="material-icons-sharp">logout</span>
            <button class="form-control" type="submit" id="nut1" name="nut1">Log
                out</button>
    </a>
</div>
</aside>';
?>