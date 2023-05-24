<?php
include("../cls/db.php");
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
//select tên học sinh để nhập điểm ở trang nhập điểm
if(isset($_POST['nh']))
{
$nh = $_POST['nh'];
$mamh=$_POST['mamh'];
$lop1=$_POST['lop1'];
$hocki=$_POST['hocki'];
$stmt = $con->prepare("select first_name, last_name,oral_exam_1,oral_exam_2,oral_exam_3,exam_15m_1,exam_15m_2,exam_15m_3,exam_45m_1,exam_45m_2,exam_45m_3,final_exam ,student_id from students s join scores sc on sc.student_id=s.id where sc.subject_id='$mamh' and sc.semester='$hocki' and sc.school_year='$nh' and sc.classroom_id='$lop1'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo ' <tr class="tophead">
	<th width="300px;">STUDENT NAME</th>
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
		$fn=$row['first_name'].' '.$row['last_name'];
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
		$spa=(($oe1+$oe2+$oe3+$e151+$e152+$e153)+($e451+$e452+$e453)*2+$fe*3)/15;
		$spa=round(($spa*100)/100);
				echo ' 
				<tr>
				<td class="subjects">'.$fn.'</td>
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
							<td >'.$spa.'</td>
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
	$stmt = $con->prepare("select first_name, last_name,oral_exam_1,oral_exam_2,oral_exam_3,exam_15m_1,exam_15m_2,exam_15m_3,exam_45m_1,exam_45m_2,exam_45m_3,final_exam ,student_id from students s join scores sc on sc.student_id=s.id where sc.subject_id='$mamh' and sc.semester='$hk' and sc.school_year='$nh' and sc.classroom_id='$lop'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo ' <tr class="tophead">
	<th width="300px;">NAME</th>
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
		$fn=$row['first_name'].' '.$row['last_name'];
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
		$spa=(($oe1+$oe2+$oe3+$e151+$e152+$e153)+($e451+$e452+$e453)*2+$fe*3)/15;
		$spa=round(($spa*100)/100);
		echo '   <tr>   
		            <td>
		            <span style="display: inline-grid;width: 20px; text-align: center;">'.$fn.'</span>
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
					</td>
					</tr>';
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


//load giáo viên ở trang seeteacher.php
if(isset($_POST['sub']))
{
$sub = $_POST['sub'];
$stmt = $con->prepare("select * from teachers where subject_id='$sub'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo'
	<tr class="tophead">
	<th>STUDEN NAME</th>
	<th>GENDER</th>
	<th>PHONE</th>
	<th>EMAIL</th>
	<th>DATE OF BIRTH</th>
	<th>NATION</th>
    <th>RELIGION</th>
    <th>ADDRESS</th>
	<th>IMAGE</th>
</tr>
	';
	 foreach($kq as $row)
	 {
		$id_teacher=$row['id_teacher'];
				$fullname=$row['first_name'].' '.$row['last_name'];
				$gender=$row['gender'];
				$phone=$row['phone'];
				$email=$row['email'];
				$dob=$row['date_of_birth'];
				$cid=$row['citizen_identity_card'];
				$nation=$row['nation'];
				$religion=$row['religion'];
				$address=$row['address'].', '.$row['state'].', '.$row['city'];
				$img=$row['image'];
			echo '
			<tr class="tophead">
			<th>'.$fullname.'</th>
			<th>'.$gender.'</th>
			<th>'.$phone.'</th>
			<th>'.$email.'</th>
			<th>'.$dob.'</th>
			<th>'.$nation.'</th>
			<th>'.$religion.'</th>
			<th>'.$address.'</th>
			<th><img src="img/'.$img.'" class="img-responsive" style="object-fit: cover;" ></th>
			</tr>';
}
}
//load học sinh trong lớp dc chọn ở trang seestudentbyteacher.php
if(isset($_POST['lop']))
{
$lop = $_POST['lop'];
$stmt = $con->prepare("select * from students where classroom_id='$lop'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo'
	<tr class="tophead">
	<th>STUDEN NAME</th>
	<th>GENDER</th>
	<th>PHONE</th>
	<th>EMAIL</th>
	<th>DATE OF BIRTH</th>
	<th>CITIZEN IDENTITY CARD</th>
	<th>NATION</th>
    <th>RELIGION</th>
    <th>ADDRESS</th>
	<th>IMAGE</th>
</tr>
	';
	 foreach($kq as $row)
	 {
		$id_stu=$row['id_student'];
				$fullname=$row['first_name'].' '.$row['last_name'];
				$gender=$row['gender'];
				$phone=$row['phone'];
				$email=$row['email'];
				$dob=$row['date_of_birth'];
				$acayear=$row['academic_year'];
				$cid=$row['citizen_identity_card'];
				$nation=$row['nation'];
				$religion=$row['religion'];
				$address=$row['address'].', '.$row['state'].', '.$row['city'];
				$img=$row['image'];
			echo '
			<tr class="tophead">
			<th>'.$fullname.'</th>
			<th>'.$gender.'</th>
			<th>'.$phone.'</th>
			<th>'.$email.'</th>
			<th>'.$dob.'</th>
			<th>'.$cid.'</th>
			<th>'.$nation.'</th>
			<th>'.$religion.'</th>
			<th>'.$address.'</th>
			<th><img src="img/'.$img.'" class="img-responsive" style="object-fit: cover;" ></th>
			</tr>';
}
}
//load học sinh trong lớp dc chọn ở trang seestudentbyteacher.php
if(isset($_POST['passold']))
{
$passold = $_POST['passold'];
$passolden= $_POST['passoe'];
if (password_verify($passolden,$passold)) {
echo"<h3 style='color:green'>The old password is correct✓</h3>";
}
else
{
	echo"<h3 style='color:red'>Wrong old password!</h3>";
}
}
?>