<?php
class tmdt
{
     private function connect()
	{				
		$con=mysqli_connect("localhost","root","","detai");
  		if(!$con)
   		{
	   		die("Khong ket noi duoc den CSDL");
			exit();
		}
		else
		{			
			mysqli_set_charset($con,"utf8");
			return $con;
		}
	}

	public function themxoasua($sql)
	{
		$link=$this->connect();
		
            if (mysqli_query($link,$sql)) 
		   {
            return 1;
           } 
		   else 
		   {
                return 0;
           }
	}
	//load thông tin của học sinh
	public function loadtt($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$mahs=$row['mahocsinh'];
				$lop=$row['lop'];
				$hoten=$row['hoten'];
				$kh=$row['khoahoc'];
				$noisinh=$row['noisinh'];
				$ngaysinh=$row['ngaysinh'];
				$sdt=$row['sdt'];
				$hinh=$row['hinh'];
				$gt=$row['gioitinh'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Thông tin học sinh</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$hinh.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                <a href="suathongtin.php" class="color-active" lang="db-chitiet-button">Sửa thông tin</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Mã số học sinh</span>: <span class="bold">'.$mahs.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Lớp</span>: <span class="bold">'.$lop.'</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Họ tên</span>: <span class="bold">'.$hoten.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Khoá học</span>: <span class="bold">'.$kh.'</span></label>
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
                                </div>
                            </div>
                        </div>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	//load thông tin chi tiết của học sinh
	public function loadttchitiet($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$mahs=$row['mahocsinh'];
				$lop=$row['lop'];
				$hoten=$row['hoten'];
				$kh=$row['khoahoc'];
				$noisinh=$row['noisinh'];
				$ngaysinh=$row['ngaysinh'];
				$sdt=$row['sdt'];
				$hinh=$row['hinh'];
				$gt=$row['gioitinh'];
				$tt=$row['trangthai'];
				$nvt=$row['ngayvaotruong'];
				$dt=$row['dantoc'];
				$tongiao=$row['tongiao'];
				$cmnd=$row['socmnd'];
				$email=$row['email'];
				$khoi=$row['khoi'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Thông tin học sinh</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$hinh.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                <a href="suathongtin.php" class="color-active" lang="db-chitiet-button">Sửa thông tin</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Mã số học sinh</span>: <span class="bold">'.$mahs.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Lớp</span>: <span class="bold">'.$lop.'</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Họ tên</span>: <span class="bold">'.$hoten.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Khoá học</span>: <span class="bold">'.$kh.'</span></label>
                                                    </div>
													<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Trạng thái</span>: <span class="bold">'.$tt.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Ngày vào trường</span>: <span class="bold">'.$nvt.'</span></label>
														</div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Nơi sinh</span>: <span class="bold">'.$noisinh.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Ngày sinh</span>: <span class="bold">'.$ngaysinh.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Giới tính</span>: <span class="bold">'.$gt.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Số điện thoại</span>: <span class="bold">'.$sdt.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Trạng thái</span>: <span class="bold">'.$tt.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Khối</span>: <span class="bold">'.$khoi.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Số CMND</span>: <span class="bold">'.$cmnd.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Dân tộc</span>: <span class="bold">'.$dt.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Tôn giáo</span>: <span class="bold">'.$tongiao.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Email</span>: <span class="bold">'.$email.'</span></label>
														</div>
													
                                                    </div>
                                                </div>
                                            </div>
											 </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	public function loadttchitietgv($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$magv=$row['magiaovien'];
				$hoten=$row['hoten'];
				$gt=$row['gioitinh'];
				$dc=$row['diachi'];
				$sdt=$row['sdt'];
				$kn=$row['kinhnghiem'];
				$bm=$row['bomon'];
				$cv=$row['chucvu'];
				$ns=$row['ngaysinh'];
				$cmnd=$row['socmnd'];
				$dt=$row['dantoc'];
				$tg=$row['tongiao'];
				$noisinh=$row['noisinh'];
				$hinh=$row['hinh'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Thông tin giáo viên</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$hinh.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                <a href="suathongtingv.php" class="color-active" lang="db-chitiet-button">Sửa thông tin</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Mã giáo viên</span>: <span class="bold">'.$magv.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Họ và tên</span>: <span class="bold">'.$hoten.'</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Giới tinh</span>: <span class="bold">'.$gt.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Địa chỉ</span>: <span class="bold">'.$dc.'</span></label>
                                                    </div>
													<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Số điện thoại</span>: <span class="bold">'.$sdt.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Kinh nghiệm</span>: <span class="bold">'.$kn.'</span></label>
														</div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Bộ môn</span>: <span class="bold">'.$bm.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Chức vụ</span>: <span class="bold">'.$cv.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Ngày sinh</span>: <span class="bold">'.$ns.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Số CMND</span>: <span class="bold">'.$cmnd.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Dân tộc</span>: <span class="bold">'.$dt.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">Tôn giáo</span>: <span class="bold">'.$tg.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">Nơi sinh</span>: <span class="bold">'.$noisinh.'</span></label>
														<label 
														</div>
                                                    </div>
                                                </div>
                                            </div>
											 </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	////load thông tin học sinh để sửa
	public function suathongtin($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$mahs=$row['mahocsinh'];
				$hoten=$row['hoten'];
				$gt=$row['gioitinh'];
				$tt=$row['trangthai'];
				$nvt=$row['ngayvaotruong'];
				$diachi=$row['diachi'];
				$sdt=$row['sdt'];
				$kh=$row['khoahoc'];
				$ns=$row['ngaysinh'];
				$socmnd=$row['socmnd'];
				$dt=$row['dantoc'];
				$tg=$row['tongiao'];
				$noisinh=$row['noisinh'];
				$lop=$row['lop'];
				$hinh=$row['hinh'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Sửa thông tin học sinh</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$hinh.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                Chọn ảnh thay thế:
        <label for="myfile"></label>
        <input type="file" name="myfile" id="myfile" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> Mã học sinh:
														 <input type="text" name="txtmahs" id="txtmahs" class="form-control" value="'.$mahs.'" readonly="readonly" >
														</label>
                                                        <label class="col-xs-6"> Lớp:
														<input type="text" name="txtlop" id="txtlop" class="form-control" value="'.$lop.'"  readonly="readonly">
														</label>
                                                    </div>
													<div class="form-group">
														<label class="col-xs-6"> Trạng thái:
														<input type="text" name="txttt" id="txttt" class="form-control" value="'.$tt.'" readonly="readonly">
														</label>
														<label class="col-xs-6"> Ngày vào trường:
														<input type="date" name="txtnvt" id="txtnvt" class="form-control" value="'.$nvt.'" readonly="readonly">
														</label>
														</div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> Họ và tên:
														<input type="text" name="txthoten" id="txthoten" class="form-control">
														<div id="ktten">...</div>
														</label>
														 <label class="col-xs-6"> Số điện thoại:
														<input type="number" name="txtsdt" id="txtsdt" class="form-control">
														<div id="ktsdt">...</div>
														</label>
																
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> Địa chỉ:
														<input type="text" name="txtdc" id="txtdc" class="form-control">
														</label>
                                                       	<label class="col-xs-6"> Khóa học:
														<input type="text" name="txtkh" id="txtkh" class="form-control" value="'.$kh.'" readonly="readonly">
														</label>
                                                   			
														</div>
													  <div class="form-group">
                                                           <label class="col-xs-6"> Giới tính:
														
													    <select name="txtgt" id="txtgt" class="form-control">
														<option value="Nữ" selected="selected">Nữ</option>
                                                        <option value="Nam" selected="selected">Nam</option>
														
                                                        </select>
														</label>
                                                        <label class="col-xs-6"> Ngày sinh:
														<input type="date" name="txtns" id="txtns" class="form-control">
														</div> 
														 <div class="form-group">
                                                        <label class="col-xs-6"> Số CMND:
														<input type="text" name="txtcmnd" id="txtcmnd" class="form-control" >
														</label>
                                                        <label class="col-xs-6"> Dân tộc:
														<input type="text" name="txtdt" id="txtdt" class="form-control">
														</div>
														  <div class="form-group">
                                                        <label class="col-xs-6"> Tôn giáo:
														<input type="text" name="txttg" id="txttg" class="form-control">
														</label>
                                                        <label class="col-xs-6"> Nơi sinh:
														<select name="province" id="province" class="form-control">
        <option value="-1" selected="selected">Chọn tỉnh thành</option>
    </select>
    <select name="district" id="district" class="form-control" style="margin-top:10px;">
        <option value="-1" selected="selected">Chọn quận/huyện</option>
    </select>
    <select name="town" id="town" class="form-control" style="margin-top:10px;">
        <option value="-1" selected="selected" >Chọn phường/xã</option>
    </select>
	<input class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Xác nhận"/>
														</div>
													
                                                    </div>
                                                </div>
                                            </div>
											 </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	public function suathongtingv($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$hinh=$row['hinh'];
				$magv=$row['magiaovien'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Sửa thông tin giáo viên</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$hinh.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                  Chọn ảnh thay thế:
        <label for="myfile"></label>
        <input type="file" name="myfile" id="myfile" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> Mã giáo viên:
														 <input type="text" name="txtmagv" id="txtmagv" class="form-control" value="'.$magv.'" readonly="readonly" >
														</label>
                                                        <label class="col-xs-6"> Họ và tên:
														<input type="text" name="txthoten" id="txthoten" class="form-control" >
														</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> Giới tính:
														<input type="text" name="txtgt" id="txtgt" class="form-control">
														</label>
                                                        <label class="col-xs-6"> Địa chỉ: 
														<input type="text" name="txtdc" id="txtdc" class="form-control">
														</label>
                                                    </div>
													<div class="form-group">
														<label class="col-xs-6"> Số điện thoại:
														<input type="text" name="txtsdt" id="txtsdt" class="form-control">
														</label>
														<label class="col-xs-6"> Kinh nghiệm:
														<input type="text" name="txtkn" id="txtkn" class="form-control">
														</label>
														</div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> Chức vụ:
														<input type="text" name="txtcv" id="txtcv" class="form-control">
														</label>
                                                        <label class="col-xs-6"> Ngày sinh:
														<input type="date" name="txtns" id="txtns" class="form-control">
														</div>
													  <div class="form-group">
                                                        <label class="col-xs-6"> Số CMND:
														<input type="text" name="txtcmnd" id="txtcmnd" class="form-control" >
														</label>
                                                        <label class="col-xs-6"> Dân tộc:
														<input type="date" name="txtdt" id="txtdt" class="form-control">
														</div> 
														 <div class="form-group">
                                                        <label class="col-xs-6"> Tôn giáo:
														<input type="text" name="txttg" id="txttg" class="form-control" >
														
														</label>
                                                        <label class="col-xs-6"> Nơi sinh:
														<select name="province" id="province" class="form-control">
        <option value="-1" selected="selected">Chọn tỉnh thành</option>
    </select>
    <select name="district" id="district" class="form-control" style="margin-top:10px;">
        <option value="-1" selected="selected">Chọn quận/huyện</option>
    </select>
    <select name="town" id="town" class="form-control" style="margin-top:10px;">
        <option value="-1" selected="selected" >Chọn phường/xã</option>
    </select>
	<input class="btn btn-primary d-grid w-100" type="submit" name="button" id="button" value="Xác nhận"/>
														</div>
														 
                                                    </div>
                                                </div>
                                            </div>
											 </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	///load điểm hs khi hs muốn xem điểm của mình
	public function loaddiem($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
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
				$tbm=($mieng+$muoilamphut+$mottiet+$gk+$ck)/5;
				echo ' <td>
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
                            <td><span style="display: inline-grid;width: 20px; text-align: center;">'.$tbm.'</span></td>';
			}
		}
		else
		{
			echo ' <td>
                                <span style="display: inline-grid;width: 20px; text-align: center;"></span>
                            </td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td></td>';
		}
	}
	public function loadttgv($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$magiaovien=$row['magiaovien'];
				$dc=$row['diachi'];
				$hoten=$row['hoten'];
				$kh=$row['khoahoc'];
				$noisinh=$row['noisinh'];
				$ngaysinh=$row['ngaysinh'];
				$sdt=$row['sdt'];
				$hinh=$row['hinh'];
				$gt=$row['gioitinh'];
				$kn=$row['kinhnghiem'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Thông tin giáo viên</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$hinh.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                <a href="suathongtingv.php" class="color-active" lang="db-chitiet-button">Sửa thông tin</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">Mã giáo viên</span>: <span class="bold">'.$magiaovien.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">Địa chỉ</span>: <span class="bold">'.$dc.'</span></label>
                                                    </div>
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
                                </div>
                            </div>
                        </div>
						<hr></hr>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	///load tin tức 	 bên học sinh	
	public function loadtintuc($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$matt=$row['matintuc'];
				$tieude=$row['tieude'];
				$nd=$row['noidung'];
				echo '<a href="xemtt.php?matt='.$matt.'">
				<div id="tt">
				'.$tieude.'
				</div></a> ';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	///load tin tức bên giáo viên
		public function loadtintucgv($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$matt=$row['matintuc'];
				$tieude=$row['tieude'];
				$nd=$row['noidung'];
				echo '<a href="xemttgv.php?matt='.$matt.'">
				<div id="tt">
				'.$tieude.'
				</div></a> ';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	//load chi tiết tin tức
	public function loadcttintuc($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$matt=$row['matintuc'];
				$tieude=$row['tieude'];
				$nd=$row['noidung'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h2 style="text-align:center;margin:0 auto;">'.$tieude.'</h2>
                                    </div> 
									<div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-12">
				                      <p style="font-size:20px;color:black;">'.$nd.'</p>
                                             
											 
										  </div>
                                           </div>
								    </div>
                             </div>
                         </div>
                       </div>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
		public function laycot($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		$giatri='';
		if($i>0)
		{
				while($row=mysqli_fetch_array($kq))
			{
				$id=$row[0];
				$giatri=$id;
			}
		}
		return $giatri;
	}
	///////////////////////////load mon để đăng tin tức
	public function loadmon1($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$bm=$row['tenmon'];
				$mm=$row['mamonhoc'];
				echo '<input type="text" name="txtmon" id="txtmon" class="form-control" value="'.$bm.'" readonly="readonly">';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	public function loadkhoi($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$bm=$row['tenkhoi'];
				$mk=$row['makhoi'];
				echo '<option value="'.$mk.'">'.$bm.'</option>';
			}
		}
		else
		{
			echo "Đang cập nhật dữ liệu";
		}
	}
	/////////load điểm học sinh trong bảng điểm của giáo viên
	public function loaddiemhs($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
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
							<a href="suadiem.php?ht='.$ht.'&nh='.$nh.'&mamh='.$mamh.'&hk='.$hk.'">Sửa điểm</a>
							</td>
							<td>
							<span style="display: inline-grid;width: 20px; text-align: center;">'.$tbm.'</span>
							</td>
							</tr>';
			}
		}
	}	
	///////////
	public function loadmamon($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$mamh=$row['mamonhoc'];
				$ten=$row['tenmon'];
			echo'
			<h2 style="margin:0 auto;">Môn học:</h2>
			<input type="text" value="'.$ten.'" readonly="readonly" class="form-control" style="margin:0 auto; width:100px; text-align:center;"/>
			<h2 style="margin:0 auto;">Mã môn học:</h2>
			<input type="text" name="txtmamh" id="txtmamh" value="'.$mamh.'" readonly="readonly" class="form-control" style="margin:0 auto; width:100px;text-align:center;"/>
			';			
			}
		}
	}
	/////load điểm hs lên để sửa 
	public function loaddiemhsedit($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$mieng=$row['diemmieng'];
				$mottiet=$row['diem1tiet'];
				$diem15p=$row['diem15phut'];
				$gk=$row['diemgk'];
				$ck=$row['diemck'];
				$tbmon=$row['diemtbmon'];
				$tbcaki=$row['diemtbcaki'];
				$hocluc=$row['hocluc'];
				$hanhkiem=$row['hanhkiem'];
				echo ' 
                      <h3>Điểm miệng:</h3>
                     <input type="number" class="form-control" id="txtdm" name="txtdm" value="'.$mieng.'"/>
                      <h3>Điểm 1 tiết:</h3>
                     <input type="number" class="form-control" id="txt45" name="txt45" value="'.$mottiet.'"/>
					    <h3>Điểm 15 phút</h3>
                     <input type="number" class="form-control" id="tx15" name="txt15" value="'.$diem15p.'"/>
                      <h3>Điểm giữa kì:</h3>
                     <input type="number" class="form-control" id="txtgk" name="txtgk" value="'.$gk.'"/>
                      <h3>Điểm cuối kì:<h3>
                     <input type="number" class="form-control" id="txtck" name="txtck" value="'.$ck.'"/>
                     <button id="nut" type="submit" name="button" id="button" value="Xác nhận">Xác nhận</button>
                    ';
			}
		}
	}	
	/////load môn để đăng tài liệu
		public function loadmonh($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			 echo '<select name="mon" id="mon" class="form-control">';
			while($row=mysqli_fetch_array($kq))
			{
				$bm=$row['tenmon'];
			echo'<option value="'.$bm.'"selected="selected">'.$bm.'</option>';			
			}
			echo "</select>";
		}
	}
	////load mật khảu cũ để so khớp khi thay đổi pass
		public function loadpasscu($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$pass=$row['pass'];
			echo' <input type="hidden" class="form-control" id="txtpasscu" name="txtpasscu" value="'.$pass.'"/>';			
			}
		}
	}
	////LOAD HỌC SINH ĐỂ NHẬP ĐIỂM
			public function loadtenhs($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			 echo '<select name="hoten" id="hoten" class="form-control">';
			while($row=mysqli_fetch_array($kq))
			{
				$bm=$row['hoten'];
				$mahs=$row['mahocsinh'];
			echo'<option value="'.$mahs.'"selected="selected">'.$bm.'</option>';			
			}
			echo "</select>";
		}
		else
		{
			echo '<select name="hoten" id="hoten" class="form-control"></select>';
		}
	}
	////load lớp học để nhập điểm
		public function loadlop($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			echo '<select name="lop" id="lop" class="form-control">';
			while($row=mysqli_fetch_array($kq))
			{
				$lop=$row['tenlop'];
			echo' <option value="'.$lop.'"selected="selected">'.$lop.'</option>';			
			}
			echo "</select>";
		}
	}
	////load mã học sinh từ tên để nhập điểm
		public function loadmahs($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$mahs=$row['mahocsinh'];
			echo'<input type="text" class="form-control" id="txtmahs" name="txtmahs" value="'.$mahs.'"/>';			
			}
		}
	}
	///LOAD CÔNG NỢ
	public function loadcn($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$macn=$row['macongno'];
				$ndthu=$row['noidungthu'];
				$sotien=$row['sotien'];
				$mg=$row['miengiam'];
				$kt=$row['khautru'];
				$cn=$row['congno'];
				$trangthai=$row['trangthai'];
				$mahs=$row['mahocsinh'];
				echo '
				<tr class="tophead"> 
				<th>
                                <span style="text-align: center;">'.$macn.'</span>
                            </th>
                            <th>
							<span style="display: inline-grid;text-align: center;">'.$ndthu.'</span>
							</th>
                            <th>
							<span style="display: inline-grid; text-align: center;">'.$sotien.'</span>
							</th>
                            <th>
							<span style="display: inline-grid; text-align: center;">'.$mg.'</span>
							</th>
                            <th>
							<span style="display: inline-grid; text-align: center;">'.$kt.'</span>
							</th>
                            <th>					<span style="display: inline-grid; text-align: center;">'.$cn.'</span></th>
							 <th>					<span style="display: inline-grid; text-align: center;">'.$trangthai.'</span></th>
							  <th>					<span style="display: inline-grid; text-align: center;">'.$mahs.'</span></th>
							  </tr>
							';
			}
		}
		else
		{
			echo ' <td>
                                <span style="display: inline-grid;width: 20px; text-align: center;"></span>
                            </td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td>
							<span style="display: inline-grid;width: 20px; text-align: center;"></span>
							</td>
                            <td></td>';
		}
	}
	///load tài liệu cho học sinh xem
	public function loadtailieu($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
			{
				$macn=$row['tieude'];
				$tenmon=$row['tenmon'];
				$tentl=$row['tentailieu'];
				$khoi=$row['khoi'];
				$link=$row['link'];
				echo '
				<a href="'.$link.'">
				<div id="tailieu">
			    <img src="img/tailieu.jpg" style="height:150px;width:80%;margin: 0 auto;">
				<h3>Tên tài liệu:'.$tentl.'</h3>
				<h3>Môn học:'.$tenmon.'</h3>
				</div>
				</a>
							';
			}
		}
		else
		{
			echo ' Đang cập nhật dữ liệu';
		}
	}
	///load diem hoc sinh pro
	public function loaddiemhspro($sql)
	{
		$link=$this->connect();
		$kq=mysqli_query($link,$sql);
		mysqli_close($link);
		$i=mysqli_num_rows($kq);
		if($i>0)
		{
			while($row=mysqli_fetch_array($kq))
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
                                <input type="number" name="txtsdt" id="txtsdt" class="form-control" style=" margin:0 auto;">
                            </td>
                            <td>
							<input type="number" name="txtsdt" id="txtsdt" class="form-control" style=" margin:0 auto;">
							</td>
                            <td>
							<input type="number" name="txtsdt" id="txtsdt" class="form-control" style=" margin:0 auto;">
							</td>
                            <td>
							<input type="number" name="txtsdt" id="txtsdt" class="form-control" style=" margin:0 auto;">
							</td>
                            <td>
							<input type="number" name="txtsdt" id="txtsdt" class="form-control" style=" margin:0 auto;">
							</td>
							</tr>';
			}
		}
	}	
}
?>