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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning outcomes</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/learning.css">
      <link rel="stylesheet" href="css/login.css">
<style>
.w-100 {
    width: 20% !important;
	margin-top:20px;
	margin-bottom:20px;
}
</style>
</head> 
<body>
    <main>
        <div class="soLienLacDienTu">
            <form method="post" action="" id="form-solienlac">
                <table cellspacing="0" cellpadding="0" style="width: 100%">
                    <tbody>
            <!--Kết quả học tập HK1-->
                        <tr>
                            <td align="left">
                                <div class="info" style="margin-bottom: 10px;">LEARNING OUTCOMES</div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="190">Choose a school year:</td>
                            <td align="left">
                                   <select name="namhoc" id="namhoc" class="form-control" style="margin-top:10px;">
                               <option value="2022-2023" selected="selected">2022-2023</option>
                               <option value="2023-2024" selected="selected">2023-2024</option>
                               <option value="2024-2025" selected="selected">2024-2025</option>
                                 </select>
                            </td>
                        </tr>
                            <td width="190"></td>
                            <td align="left">
                               <input class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Confirm"/>
                               <a href="index.php"><input class="btn btn-primary d-grid w-100" type="button" name="button" id="button" value="Back to homepage"/></a>
                            </td>
                        </tr>
                    </tbody>
                </table>


            <!---------------Bảng điểm-------------->
            <form id="formAuthentication" class="mb-3" action="" method="POST">
            <div id="bangDiem">

                <!--Bảng điểm HK1-->
                <div class="title"><b>SEMESTER 1 ACADEMIC RESULTS</b></div>
                <?php $p->loadid($layid) ?>
                <table class="center">
                    <tbody>
                        <tr class="tophead">
                            <th width="300px">SUBJECT</th>
                            <th>ORAL EXAM 1</th>
                            <th>ORAL EXAM 2</th>
                            <th>ORAL EXAM 3</th>
                            <th>EXAM 15M 1</th>
                            <th>EXAM 15M 2</th>
                            <th>EXAM 15M 3</th>
                            <th>EXAM 45M 1</th>
                            <th>EXAM 45M 2</th>
                            <th>EXAM 45M 3</th>
                            <th>FINAL EXAM</th>
                            <th>SPA</th>
                        </tr>

                        <tr>
                            <td class="subjects">Maths</td>
                           <?php
                           $hk=1;
                           $mamh=1;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
						   $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Physics</td>
                            <?php
                           $hk=1;
                           $mamh=2;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Chemistry</td>
                            <?php
                           $hk=1;
                           $mamh=3;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Biology</td>
                            <?php
                           $hk=1;
                           $mamh=4;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Informatics</td>
                            <?php
                           $hk=1;
                           $mamh=5;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Literature</td>
                            <?php
                           $hk=1;
                           $mamh=6;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">History</td>
                            <?php
                           $hk=1;
                           $mamh=7;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Geography</td>
                            <?php
                           $hk=1;
                           $mamh=8;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Foreign Language</td>
                            <?php
                           $hk=1;
                           $mamh=9;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Civic Education</td>
                            <?php
                           $hk=1;
                           $mamh=10;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>
                        
                        <tr>
                            <td class="subjects">Technology</td>
                            <?php
                           $hk=1;
                           $mamh=11;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Physical Education</td>
                            <?php
                           $hk=1;
                           $mamh=12;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">National Defense Education</td>
                            <?php
                           $hk=1;
                           $mamh=13;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                    </tbody>
                </table>
                
                <!--Thành tích HK1-->
                <div class="title"><b>Academic Achievements Semester 1</b></div>

                <table class="center">
                    <tbody>
                        <tr colspan="2" style="border-top:1px solid #CCC">
                            <td width="300px">Điểm trung bình</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Xếp hạng</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Danh hiệu</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Hạnh kiểm</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Học lực</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                

                <!--Bảng điểm HK2-->
                <div class="title"><b>SEMESTER 2 ACADEMIC RESULTS

</b></div>
                
                <table class="center">
                    <tbody>
                        <tr class="tophead">
                            <th width="300px;">SUBJECT</th>
                            <th>ORAL EXAM 1</th>
                            <th>ORAL EXAM 2</th>
                            <th>ORAL EXAM 3</th>
                            <th>EXAM 15M 1</th>
                            <th>EXAM 15M 2</th>
                            <th>EXAM 15M 3</th>
                            <th>EXAM 45M 1</th>
                            <th>EXAM 45M 2</th>
                            <th>EXAM 45M 3</th>
                            <th>FINAL EXAM</th>
                            <th>SPA</th>
                        </tr>

                        <tr>
                            <td class="subjects">Maths</td>
                           <?php
                           $hk=2;
                           $mamh=1;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
						   $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Physics</td>
                            <?php
                           $hk=2;
                           $mamh=2;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Chemistry</td>
                            <?php
                           $hk=2;
                           $mamh=3;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Biology</td>
                            <?php
                           $hk=2;
                           $mamh=4;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Informatics</td>
                            <?php
                           $hk=2;
                           $mamh=5;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Literature</td>
                            <?php
                           $hk=2;
                           $mamh=6;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">History</td>
                            <?php
                           $hk=2;
                           $mamh=7;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Geography</td>
                            <?php
                           $hk=2;
                           $mamh=8;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Foreign Language</td>
                            <?php
                           $hk=2;
                           $mamh=9;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Civic Education</td>
                            <?php
                           $hk=2;
                           $mamh=10;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>
                        
                        <tr>
                            <td class="subjects">Technology</td>
                            <?php
                           $hk=2;
                           $mamh=11;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">Physical Education</td>
                            <?php
                           $hk=2;
                           $mamh=12;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>

                        <tr>
                            <td class="subjects">National Defense Education</td>
                            <?php
                           $hk=2;
                           $mamh=13;
                           if(isset($_POST['button']))
                           {
						   switch($_POST['button'])
                 {
	              case 'Confirm':
	               {
					   $nh=$_REQUEST['namhoc'];
                       $id=$_REQUEST['id'];
                       $p->loadscore($id,$mamh,$hk,$nh);
				   }
				 }
                }
						   ?>
                        </tr>
                    </tbody>
                </table>
                </form>
            </div>        
        </div>
    </main>
</body>
</html>
