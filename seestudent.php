<?php
session_start();
if(isset($_SESSION['user'])&& isset($_SESSION['pass']))
{
	include("cls/clslogin.php");
	$q=new login();
	$q->confirmlogin($_SESSION['user'],$_SESSION['pass']);
}
else
{
	header('location:login.php');
}
include("cls/cls.php");
$p=new tmdt();
$layid=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="ketquahoctap.css">
    <style>
    #nut1 {
        margin-right: 50px;
        height: 40px;
        float: right;
        width: 100px;
        border-radius: 10px;
        color: var(--color-danger);
        font-size: 15px;
    }

    #tt {
        margin-top: 20px;
        padding: 20px;
        background: #E5E5E5;
        height: auto;
        width: 90%;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    #tt:hover {
        margin-left: 1rem;
        box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
        transition: all 300ms ease;
    }
    .profile-userpic img {
    width: 150px;
    height: 150px;
    border-radius: 50%!important;
    float: none;
    margin: 0 auto;
    box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
    
}
    img:hover {
        width: 250px;
        height: 250px;
        box-shadow: 0 10px 10px 0 rgba(114, 109, 109, 0.993);
        transition: all 300ms ease;
    }

    a:hover {
        color: #00F;
    }
    aside .sidebar{
    background: white;
    display: flex;
    flex-direction: column;
    height: 80%;
    position: relative;
    top: 0.6rem;
	box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
    border-radius: 10px;
    margin-left: 10px;
} 

aside .top{
    background: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
	box-shadow: 0 2px 10px 0 rgba(114, 109, 109, 0.993);
    border-radius: 10px;
    margin-left: 10px;
    margin-top: 10px;
}
    </style>
</head>

<body>
    <div class="container">
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
                <a href="index.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a><a href="thongtinchitiet.php">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>View details</h3>
                </a><a href="doingugv.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>See the team of teachers</h3>
                </a>
                <a href="seestudent.php">
                    <span class="material-icons-sharp">groups</span>
                    <h3>See students in class</h3>
                </a>
                <a href="guigopy.php">
                    <span class="material-icons-sharp">add_circle_outline</span>
                    <h3>Contact</h3>
                </a>
                <a href="thaydoipass.php">
                    <span class="material-icons-sharp">add_circle_outline</span>
                    <h3>Change the password</h3>
                </a>
                <a href="logout.php">
                        <span class="material-icons-sharp">logout</span>
                        <button class="form-control" type="submit" id="nut1" name="nut1" value="Đăng xuất">Log
                            out</button>
                </a>
            </div>
        </aside>
        <!------------------- END OF ASIDE -------------------->
        <main>
            <div class=title><h1>SEE STUDENT IN CLASS</h1></div>

            <div class="main-section-content" id="contnet">
                <div class="row" style="display:block">
                <div class="box-df profile-ds-info">
                <form action="" method="POST">
                <h2>CLASS:<?php $p->loadclassseestudent($layid) ?></h2>    
                <table class="center" style="margin:0 auto; margin-top:30px;">
                    <tbody id="ten">
                    <tr class="tophead">
	<th width="300px;">ID STUDENT</th>
	<th>STUDEN NAME</th>
	<th>GENDER</th>
	<th>PHONE</th>
	<th>EMAIL</th>
	<th>DATE OF BIRTH</th>
	<th>CITIZEN IDENTITY CARD</th>
	<th>NATION</th>
    <th>RELIGION</th>
    <th>ADDRESS</th>
</tr>
<?php
$p->loadseestudent($layid);
?>
                    </tbody>
                </table>
                                        <div id="loadgv"></div>
                                          <script type="text/javascript">
					 $(document).ready(function() {
                        $("#subject").change(function()
						{
							var mh=$(this).val()
							$.ajax({
								url:"data.php",
								method:"POST",
								data:{mh:mh},
								success:function(data)
								{
									$("#loadgv").html(data);
								}
								});
						});
                    });
					 </script>
                   </form>
                </div>
            </div>
            </div>

        </main>
        <!-------------------- END OF MAIN ------------------->

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
                            <a href="ketquahoctap.php" title="Kết quả học tập" langid="Ketquahoctap">
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
                            <a href="xemtailieu.php" title="Tin tức" langid="Tintuc">
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
                            <a href="congno.php" title="Công nợ" langid="Congno">
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
                                <h5>News</h5>
                                <?php
						$p->loadnews();
						?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>

</html>