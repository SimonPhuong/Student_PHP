<?php
include('includes/config.php');
if(!empty($_POST["lop_id"])) 
{
 $id=intval($_POST['lop_id']);
$query=mysqli_query($con,"SELECT * FROM lophoc WHERE makhoilop=$id ");
?>
<option value="">Chọn lớp</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['tenlop']); ?>"><?php echo htmlentities($row['tenlop']); ?></option>
  <?php
 }
}
?>