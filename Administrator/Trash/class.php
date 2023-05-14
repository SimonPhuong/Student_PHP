<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App title -->
    <title>Administrator | Lớp</title>

    <!-- Summernote css -->
    <link href="plugins/summernote/summernote.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery filer css -->
    <link href="plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
 <script>
function getLop(val) {
    $.ajax({
        type: "POST",
        url: "get_lop.php",
        data:'lop_id='+val,
        success: function(data){
            $("#lop").html(data);
        }
    });
}
function getStudent(val){
    $.ajax({
        type: "POST",
        url: "get_hs.php",
        data: 'lop='+val,
        success: function(data) {
            $("#marksdata").html(data);
        }
    });
}
</script>
</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php');?>
        <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php');?>
        <!-- Left Sidebar End -->



        
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Danh sách lớp </h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        Admin
                                    </li>
                                    
                                    <li class="active">
                                        Lớp
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form method="POST" id="addStudent" enctype="multipart/form-data">
                                        <div class="form-group m-b-20">
                                        <label for="exampleInputEmail1">Khối</label>
                                        <select class="form-control" name="khoi" id="khoi" onChange="getLop(this.value);" required>
                                        <option value="">Chọn khối </option>
<?php
// Feching active categories
$ret=mysqli_query($con,"select makhoilop,tenkhoi,soluonghs,nienkhoa from khoilop");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['makhoilop']);?>"><?php echo htmlentities($result['tenkhoi']);?></option>
<?php } ?>

</select> 
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Lớp</label>
<input type="hidden" name="action" value="getStudent">
<select class="form-control" name="lop" id="lop" onChange="getStudent(this.value);" required>
    <option value="">Hãy chọn khối</option>
</select> 
</div>


<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Xem</button>
                                    </form>
                                </div>
                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">
                                <div class="m-b-30">
                                    <h4> Danh sách học sinh</h4>
                                </div>
                            <div id="marksdata"></div>
                            </div>
                        </div>
                    </div>


                </div> <!-- container -->

            </div> <!-- content -->

        <?php include('includes/footer.php');?>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>
        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>    


<script>
    $(document).ready(function() {
        $('#addStudent').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
            url: 'get_hs.php',
            type: 'post',
            data: $('#addStudent').serialize(),
            dataType: 'json',
                
            success: function(data) {
                console.log(data);
                if(data['status'] == "1"){
                allhtml=  
                        "<div class='table-responsive'>"+
                        "<table class='table m-0 table-colored-bordered table-bordered-primary'><thead>"+ 
                        "<tr>"+
                        "<th scope='col'>#</th>"+
                        "<th scope='col'>Họ tên</th>"+
                        "<th scope='col'>Ngày sinh</th>"+
                        "<th scope='col'>Nơi sinh</th>"+
                        "<th scope='col'>Số điện thoại</th>"+
                        "<th scope='col'>E-mail</th>"+
                        "</tr>"+
                        "</thead>"+
                    "<tbody>";
                
            
                    stdlist='';
                    var counter=0;
                    for(stdkey in data['std_list']) {
                    console.log(stdkey);
                              stdlist +="<tr>"+
                                "<td>"+(++counter)+"</td>"+
                                "<td>"+data['std_list'][stdkey].hoten+"</td>"+
                                "<td>"+data['std_list'][stdkey].ngaysinh+"</td>"+
                                "<td>"+data['std_list'][stdkey].noisinh+"</td>"+
                                "<td>"+data['std_list'][stdkey].sdt+"</td>"+
                                "<td>"+data['std_list'][stdkey].email+"</td>"+
                            "</tr>";
                           }
                        allhtml += stdlist+"</tbody>"+
                        "</table>"+
                        "</div>";
           

                $('#marksdata').html(allhtml);
              }else{
                 $('#marksdata').html("Không tìm thấy dữ liệu!");
              }
           },
           error:function(){
              alert('error');
           }
           
    });
});
});
</script>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
  <script src="plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="plugins/summernote/summernote.min.js"></script>

    


    </body>
</html>
<?php } ?>