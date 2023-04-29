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
$sql = "update diem set $name='$text' where mahocsinh='$id' and hocki=1 and namhoc='$nh' and  mamonhoc='$mamh'";
$query = mysqli_query($con,$sql);
}
//select tên học sinh để nhập điểm ở trang nhập điểm pro
if(isset($_POST['nh']))
{
$nh = $_POST['nh'];
$mamh=$_POST['mamh'];
$lop1=$_POST['lop1'];
$sql = "select * from diem where mamonhoc='$mamh' and hocki=1 and namhoc='$nh' and lop='$lop1'";
$query = mysqli_query($con,$sql);
$num = mysqli_num_rows($query);
if($num > 0){
	echo ' <tr class="tophead">
                            <th width="180px">Họ và tên</th>
							  <th>Lớp</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                        </tr>';
while($row=mysqli_fetch_array($query))
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
}
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
}
}
////load điểm học sinh
if(isset($_POST['namhoc']))
{
$lop = $_POST['tenlop'];
$nh = $_POST['namhoc'];
$mamh=$_POST['mamonhoc'];
//$sql = "select * from hocsinh where lop='10A1'";
$sql = "select * from diem where mamonhoc='$mamh' and hocki=1 and namhoc='$nh' and lop='$lop'";
$query = mysqli_query($con,$sql);
$num = mysqli_num_rows($query);
if($num > 0){
	echo ' <tr class="tophead">
                            <th width="180px">Họ và tên</th>
                            <th>Điểm miệng</th>
                            <th>Điểm 15 phút</th>
                            <th>Điểm 1 tiết</th>
                            <th>Giữa kỳ</th>
                            <th>Cuối kỳ</th>
                            <th width="150px">Trung bình môn</th>
                        </tr>';
while($row=mysqli_fetch_array($query))
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
}
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
}
}
if(isset($_POST['mh']))
{
$mh = $_POST['mh'];
$sql = "select * from giaovien where bomon='$mh'";
$query = mysqli_query($con,$sql);
$num = mysqli_num_rows($query);
if($num > 0){
while($row=mysqli_fetch_array($query))
{
	$magiaovien=$row['magiaovien'];
				$dc=$row['diachi'];
				$hoten=$row['hoten'];
				
				$noisinh=$row['noisinh'];
				$ngaysinh=$row['ngaysinh'];
				$sdt=$row['sdt'];
				$hinh=$row['hinh'];
				$gt=$row['gioitinh'];
				$kn=$row['kinhnghiem'];
				echo ' 
				<div id="dngv">
                 <div class="row">
                     <div class="col-sm-3">
                         <div class="profile-userpic">
                              <img src="img/'.$hinh.'" class="img-responsive" style="object-fit: cover;">
                         </div>                  
                      </div>
                      <div class="col-sm-9">
				            <div class="form-horizontal">
                                <div class="form-body">
                                      <div class="form-group">
                                         <label class="col-xs-6"><span lang="sv-mssv">Họ tên</span>: <span class="bold">'.$hoten.'</span></label>
								         <label class="col-xs-6"><span lang="sv-mssv">Kinh nghiệm</span>: <span class="bold">'.$kn.'</span></label>
                                      </div>
                                      <div class="form-group">
                                         <label class="col-xs-6"><span lang="sv-mssv">Nơi sinh</span>: <span class="bold">'.$noisinh.'</span></label>
                                         <label class="col-xs-6"><span lang="sv-mssv">Ngày sinh</span>: <span class="bold">'.$ngaysinh.'</span></label>
									  </div>
									  <div class="form-group">
										 <label class="col-xs-6"><span lang="sv-mssv">Giới tính</span>: <span class="bold">'.$gt.'</span></label>
										 <label class="col-xs-6"><span lang="sv-mssv">Số điện thoại</span>: <span class="bold">'.$sdt.'</span></label>
									  </div>
                                  </div>
                              </div>
                        </div>
		           </div>
               </div>
			   ';
}
}
else
{
echo 'ĐANG CẬP NHẬT DỮ LIỆU';
}
}
?>