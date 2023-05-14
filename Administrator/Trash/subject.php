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

    <title>Administrator | Bộ môn</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/getData.js"></script>

</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php');?>
        <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php');?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
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
                                        <a href="#">...</a>
                                    </li>
                                    <li>
                                        <a href="#">Add Post </a>
                                    </li>
                                    <li class="active">
                                        Add Post
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
                                <form  method="POST" id="addTeacher">  
                                <input type="hidden" name="action" value="getTeacher">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <label>Chọn môn</label>
                                                <select class="form-control" name="bomon" id="bomon">
                                                    <option value="toán">Toán</option>
                                                    <option value="Ngữ Văn">Ngữ Văn</option>
                                                    <option value="Sinh học">Sinh học</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">Xem</button>
                                </form>
                                    </div>
                                </div>
                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">
                                <div class='m-b-30'>
                                    <h4> Danh sách giáo viên </h4>
                                    <div id="marksdata"></div>    
                                </div>
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
            $('#addTeacher').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                url: 'get_gv.php',
                type: 'post',
                data: $('#addTeacher').serialize(),
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
                                    "<th scope='col'>Trình độ</th>"+
                                    "<th scope='col'>Số điện thoại</th>"+
                                    "<th scope='col'>E-mail</th>"+
                                "</tr>"+
                            "</thead>"+
                                "<tbody>";
                    
                
                    stdlist='';
                    var counter=0;
                    for(stdkey in data['std_list']) {
                    console.log(stdkey);
                    stdlist +=
                                "<tr>"+
                                    "<td>"+(++counter)+"</td>"+
                                    "<td>"+data['std_list'][stdkey].hoten+"</td>"+
                                    "<td>"+data['std_list'][stdkey].ngaysinh+"</td>"+
                                    "<td>"+data['std_list'][stdkey].trinhdo+"</td>"+
                                    "<td>"+data['std_list'][stdkey].sdt+"</td>"+
                                    "<td>"+data['std_list'][stdkey].email+"</td>"+
                                "</tr>";
                            }
                    allhtml += 
                    stdlist +
                                "</tbody>"+
                            "</table>"+
                        "</div>";
               

                    $('#marksdata').html(allhtml);
                  }else{
                     $('#marksdata').html("No Students Found!");
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

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>



</body>
</html>
<?php } ?>