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
$stmt = $con->prepare("update diem set $name='$text' where mahocsinh='$id' and hocki='$hocki' and namhoc='$nh' and  mamonhoc='$mamh'");
$stmt->execute();
}
//select tên học sinh để nhập điểm ở trang nhập điểm pro
if(isset($_POST['nh']))
{
$nh = $_POST['nh'];
$mamh=$_POST['mamh'];
$lop1=$_POST['lop1'];
$hocki=$_POST['hocki'];
$stmt = $con->prepare("select * from diem where mamonhoc='$mamh' and hocki='$hocki' and namhoc='$nh' and lop='$lop1'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo ' <tr class="tophead">
                            <th width="180px">Họ và tên</th>
							  <th>Lớp</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                        </tr>';
	 foreach($kq as $row)
	 {
	$mieng=$row['diemmieng'];
				$muoilamphut=$row['diem15phut'];
				$mottiet=$row['diem1tiet'];
				$gk=$row['diemgk'];
				$ck=$row['diemck'];
				$tbmon=$row['diemtbmon'];
				$tbcaki=$row['diemtbcaki'];
				$hocluc=$row['hocluc'];
				$hanhkiem=$row['hanhkiem'];
				$ht=$row['hoten'];
				$nh=$row['namhoc'];
				$mamh=$row['mamonhoc'];
				$hk=$row['hocki'];
				$mahs=$row['mahocsinh'];
				$lop=$row['lop'];
				$tbm=($mieng+$muoilamphut+$mottiet+$gk+$ck)/5;
				echo ' 
				<tr>
				<td class="subjects">'.$ht.'</td>
				<td class="subjects">'.$lop.'</td>
				<td class="diemmieng" contenteditable="true" data-id1="'.$mahs.'">'.$mieng.'
                            </td>
                <td class="diem15phut" contenteditable="true" data-id2="'.$mahs.'">'.$muoilamphut.'
                            </td>
                <td class="diem1tiet" contenteditable="true" data-id3="'.$mahs.'">'.$mottiet.'
                            </td>
                <td class="diemgk" contenteditable="true" data-id4="'.$mahs.'">'.$gk.'
                            </td>
                <td class="diemck" contenteditable="true" data-id5="'.$mahs.'">'.$ck.'
                            </td>
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
	$stmt = $con->prepare("select * from diem where mamonhoc='$mamh' and hocki='$hk' and namhoc='$nh' and lop='$lop'");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$kq=$stmt->fetchALL();
	echo ' <tr class="tophead">
                            <th width="180px">Họ và tên</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                            <th width="150px">Trung bình môn</th>
                        </tr>';
	 foreach($kq as $row)
	 {	
	$mieng=$row['diemmieng'];
				$muoilamphut=$row['diem15phut'];
				$mottiet=$row['diem1tiet'];
				$gk=$row['diemgk'];
				$ck=$row['diemck'];
				$tbmon=$row['diemtbmon'];
				$tbcaki=$row['diemtbcaki'];
				$hocluc=$row['hocluc'];
				$hanhkiem=$row['hanhkiem'];
				$ht=$row['hoten'];
				$nh=$row['namhoc'];
				$mamh=$row['mamonhoc'];
				$hk=$row['hocki'];
				$tbm=($mieng+$muoilamphut+$mottiet+$gk+$ck)/5;
				echo ' 
				<tr>
				<td class="subjects">'.$ht.'</td>
				<td>
                                <span style="display: inline-grid;width: 20px; text-align: center;">'.$mieng.'</span>
                            </td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;">'.$muoilamphut.'</span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;">'.$mottiet.'</span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;">'.$gk.'</span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;">'.$ck.'</span>
							</td>
							<td>
							<span style="display: inline-grid;width: 20px; text-align: center;">'.$tbm.'</span>
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