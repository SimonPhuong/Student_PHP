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
     <a href="index1.php" class="active">
        <span class="material-icons-sharp">dashboard</span>
        <h3>Dashboard</h3>
    </a><a href="thongtinchitietgv.php">
        <span class="material-icons-sharp">person_outline</span>
        <h3>View details</h3>
    </a><a href="seestudentbyteacher.php">
    <span class="material-icons-sharp">groups</span>
    <h3>See students in class</h3>
</a>
    <a href="guigopygv.php">
        <span class="material-icons-sharp">add_circle_outline</span>
        <h3>Contact</h3>
    </a>
    <a href="thaydoipassgv.php">
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