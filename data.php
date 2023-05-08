<?php
include("db.php");
/// chèn điểm
if(isset($_POST['id']))
{
$nh = $_POST['namhoc'];
$mamh=$_POST['mamon'];
$id = $_POST['id'];
$text=$_POST['text'];
$name = $_POST['column_name'];
$hocki=$_POST['hocki'];
$stmt = $con->prepare("update scores set $name='$text' where student_id='$id' and semester='$hocki' and school_year='$nh' and  subject_id='$mamh'");
$stmt->execute();
}
//select tên học sinh để nhập điểm ở trang nhập điểm pro
if(isset($_POST['nh']))
{
$nh = $_POST['nh'];
$mamh=$_POST['mamh'];
$lop1=$_POST['lop1'];
$hocki=$_POST['hocki'];
$stmt = $con->prepare("select * from scores where subject_id='$mamh' and semester='$hocki' and school_year='$nh' and classroom_id='$lop1'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo ' <tr class="tophead">
	<th width="300px;">ID STUDENT</th>
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
</tr>';
	 foreach($kq as $row)
	 {
		$idstu=$row['student_id'];
		$oe1=$row['oral_exam_1'];
		$oe2=$row['oral_exam_2'];
		$oe3=$row['oral_exam_3'];
		$e151=$row['exam_15m_1'];
		$e152=$row['exam_15m_2'];
		$e153=$row['exam_15m_3'];
		$e451=$row['exam_45m_1'];
		$e452=$row['exam_45m_2'];
		$e453=$row['exam_45m_3'];
		$fe=$row['final_exam'];
				echo ' 
				<tr>
				<td class="subjects">'.$idstu.'</td>
				<td class="oe1" contenteditable="true" data-id1="'.$idstu.'">'.$oe1.'
                            </td>
                <td class="oe2" contenteditable="true" data-id2="'.$idstu.'">'.$oe2.'
                            </td>
                <td class="oe3" contenteditable="true" data-id3="'.$idstu.'">'.$oe3.'
                            </td>
                <td class="e15m1" contenteditable="true" data-id4="'.$idstu.'">'.$e151.'
                            </td>
                <td class="e15m2" contenteditable="true" data-id5="'.$idstu.'">'.$e152.'
                            </td>
							</td>
                <td class="e15m3" contenteditable="true" data-id6="'.$idstu.'">'.$e153.'
                            </td>
							</td>
                <td class="e45m1" contenteditable="true" data-id7="'.$idstu.'">'.$e451.'
                            </td>
							</td>
                <td class="e45m2" contenteditable="true" data-id8="'.$idstu.'">'.$e452.'
                            </td>
							</td>
                <td class="e45m3" contenteditable="true" data-id9="'.$idstu.'">'.$e453.'
                            </td>
							</td>
                <td class="fe" contenteditable="true" data-id10="'.$idstu.'">'.$fe.'
                            </td>
							<td ></td>
							</tr>';
}
/*}
else
{
	echo ' <tr class="tophead">
                            <th width="180px">Họ và tên</th>
							  <th>Lớp</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                        </tr>';
}*/
}
////load điểm học sinh
if(isset($_POST['namhoc']))
{
$lop = $_POST['tenlop'];
$nh = $_POST['namhoc'];
$mamh=$_POST['mamonhoc'];
$hk=$_POST['hk'];
	$stmt = $con->prepare("select * from scores where subject_id='$mamh' and semester='$hk' and school_year='$nh' and classroom_id='$lop'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo ' <tr class="tophead">
	<th width="300px;">ID STUDENT</th>
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
</tr>';
	 foreach($kq as $row)
	 {	
		$idstu=$row['student_id'];
		$oe1=$row['oral_exam_1'];
		$oe2=$row['oral_exam_2'];
		$oe3=$row['oral_exam_3'];
		$e151=$row['exam_15m_1'];
		$e152=$row['exam_15m_2'];
		$e153=$row['exam_15m_3'];
		$e451=$row['exam_45m_1'];
		$e452=$row['exam_45m_2'];
		$e453=$row['exam_45m_3'];
		$fe=$row['final_exam'];
		$spa=$row['spa'];
		echo '      
		            <td>
		            <span style="display: inline-grid;width: 20px; text-align: center;">'.$idstu.'</span>
	                </td>
		            <td>
						<span style="display: inline-grid;width: 20px; text-align: center;">'.$oe1.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$oe2.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$oe3.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$e151.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$e152.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$e153.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$e451.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$e452.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$e453.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$fe.'</span>
					</td>
					<td>
					<span style="display: inline-grid;width: 20px; text-align: center;">'.$spa.'</span>
					</td>';
}
/*}
else
{
	echo '  <tr class="tophead">
                            <th width="180px">Họ và tên</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                            <th width="150px">Trung bình môn</th>
                        </tr>';
}*/
}
if(isset($_POST['mh']))
{
       $mh = $_POST['mh'];
        $stmt = $con->prepare("select * from teachers where subject_id='$mh'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {		
				$image=$row['image'];
	            $fullname=$row['first_name'].' '.$row['last_name'];
				$gender=$row['gender'];
				$phone=$row['phone'];
				$email=$row['email'];
				$dob=$row['date_of_birth'];
				$jd=$row['joining_date'];
				$degree=$row['degree'];
				$cic=$row['citizen_identity_card'];
				$address=$row['address'].', '.$row['state'].', '.$row['city'];
				echo ' 
				<div id="dngv">
                 <div class="row">
                     <div class="col-sm-3">
                         <div class="profile-userpic">
                              <img src="img/'.$image.'" class="img-responsive" style="object-fit: cover;">
                         </div>                  
                      </div>
                      <div class="col-sm-9">
				            <div class="form-horizontal">
                                <div class="form-body">
                                      <div class="form-group">
                                         <label class="col-xs-6"><span lang="sv-mssv">FULL NAME</span>: <span class="bold">'.$fullname.'</span></label>
								         <label class="col-xs-6"><span lang="sv-mssv">GENDER</span>: <span class="bold">'.$gender.'</span></label>
                                      </div>
                                      <div class="form-group">
                                         <label class="col-xs-6"><span lang="sv-mssv">PHONE</span>: <span class="bold">'.$phone.'</span></label>
                                         <label class="col-xs-6"><span lang="sv-mssv">EMAIL</span>: <span class="bold">'.$email.'</span></label>
									  </div>
									  <div class="form-group">
										 <label class="col-xs-6"><span lang="sv-mssv">DATE OF BIRTH</span>: <span class="bold">'.$dob.'</span></label>
										 <label class="col-xs-6"><span lang="sv-mssv">DEGREE</span>: <span class="bold">'.$degree.'</span></label>
									  </div>
                                  </div>
                              </div>
                        </div>
		           </div>
               </div>
			   ';
}
}
?>