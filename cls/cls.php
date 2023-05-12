<?php
class tmdt
{
	//hàm kết nối pdo
	function connectpdo()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		
		try {
		  $con = new PDO("mysql:host=$servername;dbname=doan", $username, $password);
		  // set the PDO error mode to exception
		  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  //echo "Connected successfully";
		} catch(PDOException $e) {
		  //echo "Connection failed: " . $e->getMessage();
		}
		return $con;
	}
	///hàm gửi thông tin góp ý
	function sendcontact($layid,$nd)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("insert into contacts (user_id,message) values('$layid','$nd')");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
///hàm thay đổi mật khẩu
function chanepass($pass2,$layid)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("UPDATE taikhoanhs SET pass= '$pass2' WHERE mahocsinh ='$layid' LIMIT 1 ;");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
	//hàm thay đổi mật khẩu giáo viên
	function chanepassgv($pass2,$layid)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("UPDATE taikhoangv SET pass= '$pass2' WHERE magiaovien ='$layid' LIMIT 1 ;");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
	///hàm sửa thông tin học sinh
	function editstudent($id,$fn,$ln,$gender,$phone,$email,$dob,$cic,$nation,$religion,$address,$state,$city)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("update students set first_name='$fn',last_name='$ln',gender='$gender',phone=$phone,email='$email',date_of_birth='$dob',citizen_identity_card=$cic,nation='$nation',religion='$religion',address='$address',state='$state',city='$city' where id_student=$id");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
		///hàm sửa thông tin giáo viên
		function editteacher($id,$fn,$ln,$gender,$phone,$email,$dob,$cic,$nation,$religion,$address,$state,$city)
		{
			$dbh=$this->connectpdo();
			$stmt = $dbh->prepare("update teachers set first_name='$fn',last_name='$ln',gender='$gender',phone=$phone,email='$email',date_of_birth='$dob',citizen_identity_card=$cic,nation='$nation',religion='$religion',address='$address',state='$state',city='$city' where id_teacher=$id");
			//$stmt->bindParam(':value', $giatri);
			if($stmt->execute())
			{
				return 1;	
			}
			else
			{
				return 0;	
			}
		}
	//hàm sửa thông tin giáo viên
	function guigopygv($nd,$layid)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("insert into guigopy (mahocsinh,noidung,magiaovien) values('0','$nd','$layid')");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
	///đăng tài liệu
	function addfile($mon,$layid,$name,$khoi)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("insert into documents(subject,teacher_id,topic,grades) values('$mon',(select id from teachers where id_teacher='$layid'),'$name','$khoi')");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
	///upload ảnh để chỉnh sửa thông tin học sinh
	function addimagestudent($name,$layid)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("update students set image='$name' where id_student='$layid'");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
	///////upload ảnh để chỉnh sửa thông tin giáo viên
	function addimageteacher($name,$layid)
	{
		$dbh=$this->connectpdo();
		$stmt = $dbh->prepare("update teachers set image='$name' where id_teacher='$layid'");
		//$stmt->bindParam(':value', $giatri);
		if($stmt->execute())
		{
			return 1;	
		}
		else
		{
			return 0;	
		}
	}
	//load thông tin của học sinh
	public function loadstudent($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from students where id_student='$layid' limit 1");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
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
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Student Information</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$img.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                <a href="#" class="color-active" lang="db-chitiet-button">'.$fullname.'</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">ID STUDENT</span>: <span class="bold">'.$id_stu.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">FULL NAME</span>: <span class="bold">'.$fullname.'</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">GENDER</span>: <span class="bold">'.$gender.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">PHONE</span>: <span class="bold">'.$phone.'</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">EMAIL</span>: <span class="bold">'.$email.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">DATE OF BIRTH</span>: <span class="bold">'.$dob.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">ACADEMIC YEAR</span>: <span class="bold">'.$acayear.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">CITIZEN IDENTITY CARD</span>: <span class="bold">'.$cid.'</span></label>
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
	//load thông tin chi tiết của học sinh
	public function loaddetailstudent($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from students where id_student='$layid' limit 1");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
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
			echo'<div class="row" style="display:block">
					<div class="box-df profile-ds-info">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<span class="caption-subject bold" lang="db-thongtinsinhvien">Student Information</span>
								</div>
							</div>

							<div class="porlet-body">
								<div class="row">
									<div class="col-sm-3">
										<div class="profile-userpic">
											<img src="img/'.$img.'" class="img-responsive" style="object-fit: cover;">
										</div>
										<div class="text-center">
											<a href="editstudent.php" class="color-active" lang="db-chitiet-button">Edit information</a>
										</div>
									</div>

									<div class="col-sm-9">
			                            <div class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">ID STUDENT</span>: <span class="bold">'.$id_stu.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">FULL NAME</span>: <span class="bold">'.$fullname.'</span></label>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">GENDER</span>: <span class="bold">'.$gender.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">PHONE</span>: <span class="bold">'.$phone.'</span></label>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">EMAIL</span>: <span class="bold">'.$email.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">DATE OF BIRTH</span>: <span class="bold">'.$dob.'</span></label>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">ACADEMIC YEAR</span>: <span class="bold">'.$acayear.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">CITIZEN IDENTITY CARD</span>: <span class="bold">'.$cid.'</span></label>
												</div>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">NATION</span>: <span class="bold">'.$nation.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">RELIGION</span>: <span class="bold">'.$religion.'</span></label>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">ADDRESS</span>: <span class="bold">'.$address.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv"></span><span class="bold"></span></label>
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
	///load thông tin chi tiết giáo viên
	public function loaddetailteacher($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from teachers where id_teacher='$layid' limit 1");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
			$fullname=$row['first_name'].' '.$row['last_name'];
			$gender=$row['gender'];
			$phone=$row['phone'];
			$email=$row['email'];
			$dob=$row['date_of_birth'];
			$jd=$row['joining_date'];
			$degree=$row['degree'];
			$cic=$row['citizen_identity_card'];
			$nation=$row['nation'];
			$religion=$row['religion'];
			$address=$row['address'].', '.$row['state'].', '.$row['city'];
			$image=$row['image'];
			$idtea=$row['id_teacher'];
			echo ' <div class="row" style="display:block">
					<div class="box-df profile-ds-info">
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<span class="caption-subject bold" lang="db-thongtinsinhvien">Information teacher</span>
								</div>
							</div>

							<div class="porlet-body">
								<div class="row">
									<div class="col-sm-3">
										<div class="profile-userpic">
											<img src="img/'.$image.'" class="img-responsive" style="object-fit: cover;">
										</div>
										<div class="text-center">
											<a href="editteacher.php" class="color-active" lang="db-chitiet-button">Edit information</a>
										</div>
									</div>

									<div class="col-sm-9">
			<div class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">ID TEACHER</span>: <span class="bold">'.$idtea.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">FULL NAME</span>: <span class="bold">'.$fullname.'</span></label>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">GENDER</span>: <span class="bold">'.$gender.'</span></label>
														 <label class="col-xs-6"><span lang="sv-mssv">PHONE</span>: <span class="bold">'.$phone.'</span></label>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">EMAIL</span>: <span class="bold">'.$email.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">DATE OF BIRTH</span>: <span class="bold">'.$dob.'</span></label>
													</div>
													<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">DEGREE</span>: <span class="bold">'.$degree.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">CITIZEN IDENTITY CARD</span>: <span class="bold">'.$cic.'</span></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">JOINING DATE</span>: <span class="bold">'.$jd.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">NATION</span>: <span class="bold">'.$nation.'</span></label>
													</div>
													<div class="form-group">
													<label class="col-xs-6"><span lang="sv-mssv">RELIGION</span>: <span class="bold">'.$religion.'</span></label>
													<label class="col-xs-6"><span lang="sv-mssv">ADDRESS</span>: <span class="bold">'.$address.'</span></label>
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
	////load thông tin học sinh để sửa
	public function loadeditstudent($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from students where id_student='$layid' limit 1");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
			$id_stu=$row['id_student'];
			$fn=$row['first_name'];
			$ln=$row['last_name'];
			$gender=$row['gender'];
			$phone=$row['phone'];
			$email=$row['email'];
			$dob=$row['date_of_birth'];
			$acayear=$row['academic_year'];
			$cic=$row['citizen_identity_card'];
			$nation=$row['nation'];
			$religion=$row['religion'];
			$address=$row['address'];
			$state=$row['state'];
			$city=$row['city'];
			$img=$row['image'];
				echo ' 

                                        <div class="col-sm-9">
				                           <div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> ID STUDENT:
														 <input type="text" name="id" id="id" class="form-control" value="'.$id_stu.'" readonly="readonly" >
														</label>
                                                        <label class="col-xs-6"> GENDER(Male/Female/Unknown):';
														if($gender == 'Male'){
															
														echo
														'<select id="gender" name="gender" class="form-control">
														<option value="Male" selected>Male</option>
														<option value="Female">Female</option>
														<option value="Unknown"">Unknown</option>
														</select>'; }else if($gender == 'Female'){
															echo
															'<select id="gender" name="gender" class="form-control">
															<option value="Male">Male</option>
															<option value="Female" selected>Female</option>
															<option value="Unknown">Unknown</option>
															</select>';

														}else{
															echo
															'<select id="gender" name="gender" class="form-control">
															<option value="Male" >Male</option>
															<option value="Female">Female</option>
															<option value="Unknown" selected>Unknown</option>
															</select>';
														}

														echo'
														</label>
                                                    </div>
													<div class="form-group">
														<label class="col-xs-6"> FIRSTNAME:
														<input type="text" name="fn" id="fn" class="form-control" value="'.$fn.'"  >
														</label>
														<label class="col-xs-6"> LASTNAME:
														<input type="text" name="ln" id="ln" class="form-control" value="'.$ln.'" >
														</label>
														</div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> PHONE:
														<input type="number" name="phone" id="phone" class="form-control" value="'.$phone.'">
														<div id="ktten">...</div>
														</label>
														 <label class="col-xs-6"> EMAIL:
														<input type="text" name="email" id="email" class="form-control" value="'.$email.'">
														<div id="ktsdt">...</div>
														</label>
																
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> DATE OF BIRTH:
														<input type="date" name="dob" id="dob" class="form-control" value="'.$dob.'" required>
														</label>
                                                       	<label class="col-xs-6"> CITIZEN IDENTITY CARD:
														<input type="number" name="cic" id="cic" class="form-control" value="'.$cic.'" required>
														</label>
														</div>
														 <div class="form-group">
                                                        <label class="col-xs-6"> NATION:
														<input type="text" name="nation" id="nation" class="form-control" value="'.$nation.'" required>
														</label>
                                                        <label class="col-xs-6"> RELIGION:
														<input type="text" name="religion" id="religion" class="form-control" value="'.$religion.'" required>
														</div>
														  <div class="form-group">
                                                        <label class="col-xs-6"> ADDRESS:
														<input type="text" name="address" id="address" class="form-control" value="'.$address.'" required >
														</label>
                                                        <label class="col-xs-6"> STATE:
														<input type="text" name="state" id="state" class="form-control" value="'.$state.'" required>
														</label>
														<label class="col-xs-6"> CITY:
														<input type="text" name="city" id="city" class="form-control" value="'.$city.'" required>
														</label>
														<div class="form-group">
                                                        <label class="col-xs-12">
														<input type="hidden" name="img" id="img" class="form-control" value="'.$img.'" required>
														</label>
														</div>
	<input type="submit" name="button" id="button" value="Confirm"/>
														</div>
													
                                                    </div>
                                                </div>
                                            </div>
									    </div>';
			}
	}
	////load form sửa thông tin giáo viên
	public function loadeditteacher($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from teachers where id_teacher='$layid' limit 1");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
			$id_tea=$row['id_teacher'];
			$fn=$row['first_name'];
			$ln=$row['last_name'];
			$gender=$row['gender'];
			$phone=$row['phone'];
			$email=$row['email'];
			$dob=$row['date_of_birth'];
			$cic=$row['citizen_identity_card'];
			$nation=$row['nation'];
			$religion=$row['religion'];
			$address=$row['address'];
			$state=$row['state'];
			$city=$row['city'];
			$img=$row['image'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Edit Personal Information</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="text-center">
											Choose an alternate photo:
        <label for="myfile"></label>
        <input type="file" name="myfile" id="myfile" class="form-control" />
		<input class="btn btn-primary d-grid w-100" type="submit" name="button1" id="button1" value="Upload"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> ID TEACHER:
														 <input type="text" name="id" id="id" class="form-control" value="'.$id_tea.'" readonly="readonly" >
														</label>
                                                        <label class="col-xs-6"> GENDER(Male/Female/Unknown):';
														if($gender == 'Male'){
															
														echo
														'<select id="gender" name="gender" class="form-control">
														<option value="Male" selected>Male</option>
														<option value="Female">Female</option>
														<option value="Unknown"">Unknown</option>
														</select>'; }else if($gender == 'Female'){
															echo
															'<select id="gender" name="gender" class="form-control">
															<option value="Male">Male</option>
															<option value="Female" selected>Female</option>
															<option value="Unknown">Unknown</option>
															</select>';

														}else{
															echo
															'<select id="gender" name="gender" class="form-control">
															<option value="Male" >Male</option>
															<option value="Female">Female</option>
															<option value="Unknown" selected>Unknown</option>
															</select>';
														}

														echo'
														</label>
                                                    </div>
													<div class="form-group">
														<label class="col-xs-6"> FIRSTNAME:
														<input type="text" name="fn" id="fn" class="form-control" value="'.$fn.'" >
														</label>
														<label class="col-xs-6"> LASTNAME:
														<input type="text" name="ln" id="ln" class="form-control" value="'.$ln.'">
														</label>
														</div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> PHONE:
														<input type="number" name="phone" id="phone" class="form-control" value="'.$phone.'">
														<div id="ktten">...</div>
														</label>
														 <label class="col-xs-6"> EMAIL:
														<input type="text" name="email" id="email" class="form-control" value="'.$email.'">
														<div id="ktsdt">...</div>
														</label>
																
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"> DATE OF BIRTH:
														<input type="date" name="dob" id="dob" class="form-control" value="'.$dob.'">
														</label>
                                                       	<label class="col-xs-6"> CITIZEN IDENTITY CARD:
														<input type="number" name="cic" id="cic" class="form-control" value="'.$cic.'">
														</label>
														</div>
														 <div class="form-group">
                                                        <label class="col-xs-6"> NATION:
														<input type="text" name="nation" id="nation" class="form-control" value="'.$nation.'">
														</label>
                                                        <label class="col-xs-6"> RELIGION:
														<input type="text" name="religion" id="religion" class="form-control" value="'.$religion.'">
														</div>
														  <div class="form-group">
                                                        <label class="col-xs-4"> ADDRESS:
														<input type="text" name="address" id="address" class="form-control" value="'.$address.'">
														</label>
                                                        <label class="col-xs-4"> STATE:
														<input type="text" name="state" id="state" class="form-control" value="'.$state.'">
														</label>
														<label class="col-xs-4"> CITY:
														<input type="text" name="city" id="city" class="form-control" value="'.$city.'">
														</label>
														<div class="form-group">
                                                        <label class="col-xs-12">
														<input type="text" name="img" id="img" class="form-control" value="'.$img.'">
														</label>
														</div>
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
	///load điểm hs khi hs muốn xem điểm của mình
	public function loadscore($id,$mamh,$hk,$nh)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from scores where student_id='$id' and subject_id='$mamh' and semester='$hk' and school_year='$nh'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
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
				echo ' <td>
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
		}*/
	}
	//load id
	public function loadid($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from students where id_student='$layid'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
			$id=$row['id'];
			echo '<input value="'.$id.'" id="id" type="hidden" name="id" />';
			}
	}
	////load lớp trên trang see student
	public function loadclassseestudent($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from classrooms where id=(select classroom_id from students where id_student='$layid')");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
			$name=$row['classroom_name'];
			echo $name;
			}
	}
	////load lớp trên trang see student
	public function loadseestudent($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from students where classroom_id=(select classroom_id from students where id_student='$layid')");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
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
			echo '<tr class="tophead">
			<th width="300px;">'.$id_stu.'</th>
			<th>'.$fullname.'</th>
			<th>'.$gender.'</th>
			<th>'.$phone.'</th>
			<th>'.$email.'</th>
			<th>'.$dob.'</th>
			<th>'.$cid.'</th>
			<th>'.$nation.'</th>
			<th>'.$religion.'</th>
			<th>'.$address.'</th>
		</tr>';
			}
	}
	///load thông tin giáo viên
	public function loadteacher($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from teachers where id_teacher='$layid' limit 1");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$fullname=$row['first_name'].' '.$row['last_name'];
				$gender=$row['gender'];
				$phone=$row['phone'];
				$email=$row['email'];
				$dob=$row['date_of_birth'];
				$jd=$row['joining_date'];
				$degree=$row['degree'];
				$cic=$row['citizen_identity_card'];
				$nation=$row['nation'];
				$religion=$row['religion'];
				$address=$row['address'].', '.$row['state'].', '.$row['city'];
				$image=$row['image'];
				$idtea=$row['id_teacher'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold" lang="db-thongtinsinhvien">Information teacher</span>
                                    </div>
                                </div>

                                <div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="profile-userpic">
                                                <img src="img/'.$image.'" class="img-responsive" style="object-fit: cover;">
                                            </div>
                                            <div class="text-center">
                                                <a href="#" class="color-active" lang="db-chitiet-button">'.$fullname.'</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-9">
				<div class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">ID TEACHER</span>: <span class="bold">'.$idtea.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">FULL NAME</span>: <span class="bold">'.$fullname.'</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">GENDER</span>: <span class="bold">'.$gender.'</span></label>
															 <label class="col-xs-6"><span lang="sv-mssv">PHONE</span>: <span class="bold">'.$phone.'</span></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-6"><span lang="sv-mssv">EMAIL</span>: <span class="bold">'.$email.'</span></label>
                                                        <label class="col-xs-6"><span lang="sv-mssv">DATE OF BIRTH</span>: <span class="bold">'.$dob.'</span></label>
														</div>
														<div class="form-group">
														<label class="col-xs-6"><span lang="sv-mssv">DEGREE</span>: <span class="bold">'.$degree.'</span></label>
														<label class="col-xs-6"><span lang="sv-mssv">CITIZEN IDENTITY CARD</span>: <span class="bold">'.$cic.'</span></label>
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
	///load tin tức 	 bên học sinh	
	public function loadnews()
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from news");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$id=$row['id'];
				$cate=$row['category_id'];
				$title=$row['title'];
				echo '<a href="newsstudent.php?matt='.$id.'">
				<div id="tt">
				'.$title.'
				</div></a> ';
			}
	}
	///load tin tức bên giáo viên
		public function loadnewsteacher()
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from news");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$id=$row['id'];
				$cate=$row['category_id'];
				$title=$row['title'];
				echo '<a href="newsteacher.php?matt='.$id.'">
				<div id="tt">
				'.$title.'
				</div></a> ';
			}
	}
	//load chi tiết tin tức
	public function loaddetailnews($layidnews)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from news where id=".$layidnews."");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
			$id=$row['id'];
			$cate=$row['category_id'];
			$title=$row['title'];
			$content=$row['content'];
				echo ' <div class="row" style="display:block">
                        <div class="box-df profile-ds-info">
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h2 style="text-align:center;margin:0 auto;">'.$title.'</h2>
                                    </div> 
									<div class="porlet-body">
                                    <div class="row">
                                        <div class="col-sm-12">
				                      <p style="font-size:20px;color:black;">'.$content.'</p>
                                             
											 
										  </div>
                                           </div>
								    </div>
                             </div>
                         </div>
                       </div>';
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
	///////////////////////////load môn để đăng tài liệu
	public function loadsubfile($layid)
	{ 
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from subjects where id=(select subject_id from teachers where id_teacher=$layid)");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$subn=$row['subject_name'];
				echo '<input type="text" name="txtmon" id="txtmon" class="form-control" value="'.$subn.'" readonly="readonly">';
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
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from diem where mamonhoc=$mamon and hocki=2 and namhoc='$nh'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
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
							<a href="suadiem.php?ht='.$ht.'&nh='.$nh.'&mamh='.$mamh.'&hk='.$hk.'">Sửa điểm</a>
							</td>
							<td>
							<span style="display: inline-grid;width: 20px; text-align: center;">'.$tbm.'</span>
							</td>
							</tr>';
			}
	}	
	/////////// load mã môn và tên môn ở trang xem điểm của giáo viên
	public function loadidsub($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from subjects where id=(select subject_id from teachers where id_teacher=$layid)");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
			
				$id=$row['id'];
				$subn=$row['subject_name'];
			echo'
			<h2 style="margin:0 auto;">Subject:</h2>
			<input type="text" value="'.$subn.'" readonly="readonly" class="form-control" style="margin:0 auto; width:100px; text-align:center;"/>
			<input type="hidden" name="txtmamh" id="txtmamh" value="'.$id.'" readonly="readonly" class="form-control" style="margin:0 auto; width:100px;text-align:center;"/>
			';			
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
		public function loadsubject()
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from subjects");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
		echo '<select name="subject" id="subject" class="form-control">';
         foreach($kq as $row)
		 {
				$sub=$row['subject_name'];
				$id=$row['id'];
			echo'<option value="'.$id.'"selected="selected">'.$sub.'</option>';			
			}
			echo "</select>";
	}
	////load mật khảu cũ để so khớp khi thay đổi pass
		public function loadpasscu($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select pass from taikhoanhs where mahocsinh=".$layid."");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$pass=$row['pass'];
			echo' <input type="hidden" class="form-control" id="txtpasscu" name="txtpasscu" value="'.$pass.'"/>';			
		 }
	}
	////load mật khảu cũ để so khớp khi thay đổi pass của giáo viên
	public function loadpasscugv($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select pass from taikhoangv where magiaovien=".$layid."");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$pass=$row['pass'];
			echo' <input type="hidden" class="form-control" id="txtpasscu" name="txtpasscu" value="'.$pass.'"/>';			
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
		public function loadclass($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from  teacher_classrooms where teacher_id=(select id from teachers where id_teacher=$layid)");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
		echo '<select name="lop" id="lop" class="form-control">';
         foreach($kq as $row)
		 {
			    $id=$row['classroom_id'];
				$cn=$row['classroom_name'];
			echo' <option value="'.$id.'"selected="selected">'.$cn.'</option>';			
			}
			echo "</select>";
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
	public function loaddebt($layid)
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from debt where id_student='$layid'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$id=$row['id'];
				$content=$row['content'];
				$aom=$row['amount of money'];
				$dd=$row['deduct'];
				$sta=$row['status'];
				$idstu=$row['id_student'];
				echo '
				<tr class="tophead"> 
				<th>
                                <span style="text-align: center;">'.$id.'</span>
                            </th>
                            <th>
							<span style="display: inline-grid;text-align: center;">'.$content.'</span>
							</th>
                            <th>
							<span style="display: inline-grid; text-align: center;">'.$aom.'</span>
							</th>
                            <th>
							<span style="display: inline-grid; text-align: center;">'.$dd.'</span>
							</th>
                            <th>
							<span style="display: inline-grid; text-align: center;">'.$sta.'</span>
							</th>
							  <th><span style="display: inline-grid; text-align: center;">'.$idstu.'</span></th>
							  </tr>
							';
			}
		/*}
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
		}*/
	}
	///load tài liệu cho học sinh xem
	public function loaddoc()
	{
		$con=$this->connectpdo();
        $stmt = $con->prepare("select * from documents ");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$kq=$stmt->fetchALL();
         foreach($kq as $row)
		 {
				$topic=$row['topic'];
				$sub=$row['subject'];
				$file=$row['files'];
				echo '
				<a href="#">
				<div id="tailieu">
			    <img src="img/tailieu.jpg" style="height:150px;width:80%;margin: 0 auto;">
				<h3>Tên tài liệu:'.$file.'</h3>
				<h3>Môn học:'.$sub.'</h3>
				</div>
				</a>
							';
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