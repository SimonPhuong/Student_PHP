<?php
echo'
<div class="right">
<div class="theme-toggler">
    <span class="material-icons-sharp active">light_mode</span>
    <span class="material-icons-sharp">dark_mode</span>
</div>
<div class="featured">
    <div class="row">
        <div class="col-xs-6">
        <div class="featured-item">
            <a href="#" title="Lịch theo tuần" >
                <div class="box-df">
                    <div class="icon">
                        <span class="material-icons-sharp">calendar_month</span>
                    </div>
                    <span lang="menusinhvien-8-vt">Teaching schedule</span>
                </div>
            </a>
        </div>
        </div>
         <div class="col-xs-6">
        <div class="featured-item">
          <a  href="viewstudentgrades.php" title="Xem điểm học sinh" >
                <div class="box-df">
                    <div class="icon">
                        <span class="material-icons-sharp">calendar_month</span>
                    </div>
                    <span lang="menusinhvien-8-vt">View student grades</span>
                </div>
            </a>
        </div>
        </div>
         <div class="row">
        <div class="col-xs-12">
        <div class="featured-item">
            <a href="postdocument.php" title="Đăng tài liệu" >
                <div class="box-df">
                    <div class="icon">
                        <span class="material-icons-sharp">description</span>
                    </div>
                    <span lang="menusinhvien-8-vt">Post documents</span>
                </div>
            </a>
        </div>
        </div>
    </div>
    </div>
    <div class="row" style="box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993); margin-top:10px; border-radius:10px">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><h5>Tin tức</h5>';
                ?>
                                        <?php
            $p->loadnewsteacher();
            ?>
            <?php
            echo'
            </div>
            </div>
        </div>
    </div>

</div>
</div>';
?>