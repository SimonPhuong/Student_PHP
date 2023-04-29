
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo_db";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
<title>Chọn môn</title>
<script type="text/javascript" src="../../../dropdown-selection-data-load-php/script/getData.js"></script>
</head>
<body class="">
<div class="container" style="min-height:500px;">
	<div class=''>
	</div>
    <div class="container">
	<h2>Chọn môn</h2>		
	
	<div class="page-header">
        <h3>
			<select id="employee" class="form-control" >
				<option value="" selected="selected">Select Employee Name</option>
				<?php
				$sql = "SELECT id, employee_name, employee_salary, employee_age FROM employee";
				$resultset = mysqli_query($conn, $sql);
				while( $rows = mysqli_fetch_assoc($resultset) ) { 
				?>
				<option value="<?php echo $rows["id"]; ?>"><?php echo $rows["employee_name"]; ?></option>
				<?php }	?>
			</select>
        </h3>	
    </div>	
	<div class="hidden" id="errorMassage"></div>
	<table class="table table-striped hidden" id="recordListing">
		<thead>
		  <tr>
			<th>Id</th>
			<th>Name</th>
			<th>Age</th>
			<th>Salary</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td id="empId"></td>
			<td id="empName"></td>
			<td id="empAge"></td>
			<td id="empSalary"></td>
		  </tr>
		</tbody>			
	</table>      
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body>
</html>

