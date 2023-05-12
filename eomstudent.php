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
                            <a href="#" title="Lịch theo tuần" langid="Lichtheotuan">
                                <div class="box-df">
                                    <div class="icon">
                                        <span class="material-icons-sharp">calendar_month</span>
                                    </div>
                                    <span lang="menusinhvien-8-vt">Schedule</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="featured-item">
                            <a href="learningoutcomes.php" title="Kết quả học tập" langid="Ketquahoctap">
                                <div class="box-df">
                                    <div class="icon">
                                        <span class="material-icons-sharp">leaderboard</span>
                                    </div>
                                    <span lang="menusinhvien-8-vt">Learning outcomes</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="featured-item">
                            <a href="document.php" title="Tài liệu" langid="Tintuc">
                                <div class="box-df">
                                    <div class="icon">
                                        <span class="material-icons-sharp">description</span>
                                    </div>
                                    <span lang="menusinhvien-8-vt">Study document</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="featured-item">
                            <a href="debt.php" title="Công nợ" langid="Congno">
                                <div class="box-df">
                                    <div class="icon">
                                        <span class="material-icons-sharp">attach_money</span>
                                    </div>
                                    <span lang="menusinhvien-8-vt">Debts</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row"
                    style="box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993); margin-top:10px; border-radius:10px">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>News</h5>';
                                ?>
                                <?php
						$p->loadnews();
						?>
                        <?php
                            echo'</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        ';
?>