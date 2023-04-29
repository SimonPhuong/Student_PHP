<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
{box-sizing: border-box;}
/* Nút Để Mở Chatbox */
 .nut-mo-chatbox {
   background-color: #555;
   color: white;
   padding: 16px 20px;
   border: none;
   cursor: pointer;
   opacity: 0.8;
   position: fixed;
   bottom: 23px;
   right: 28px;
   width: 280px;
 }
/* Ẩn chatbox mặc định */
 .Chatbox {
   display: none;
   position: fixed;
   bottom: 0;
   right: 15px;
   border: 3px solid #f1f1f1;
   z-index: 9;
 }
/* Thêm style cho form */
 .form-container {
   max-width: 300px;
   padding: 10px;
   background-color: white;
 }
/* thiết lập style textarea */
 .form-container textarea {
   width: 100%;
   padding: 15px;
   margin: 5px 0 22px 0;
   border: none;
   background: #f1f1f1;
   resize: none;
   min-height: 200px;
 }
/*thiết lập style cho textarea khi được focus */
 .form-container textarea:focus {
   background-color: #ddd;
   outline: none;
 }
/* Thiết lập style cho nút trong form*/
 .form-container .btn {
   background-color: #4CAF50;
   color: white;
   padding: 16px 20px;
   border: none;
   cursor: pointer;
   width: 100%;
   margin-bottom:10px;
   opacity: 0.8;
 }/* Thiết lập màu nền cho nút đóng chatbox */
 .form-container .nut-dong-chatbox {
   background-color: red;
 }
/* Thêm hiệu ứng hover cho nút*/
 .form-container .btn:hover, .nut-mo-chatbox:hover {
   opacity: 1;
 }
</style>
<script>
/*Hàm Mở Form*/
 function moForm() {
   document.getElementById("myForm").style.display = "block";
 }
 /*Hàm Đóng Form*/
 function dongForm() {
   document.getElementById("myForm").style.display = "none";
 }
</script>
<body>
<button class="nut-mo-chatbox" onclick="moForm()">Chat</button>
 <div class="Chatbox" id="myForm">
   <form action="" class="form-container">
     <h1>Chatbox</h1>
    <label for="msg"><b>Lời Nhắn</b></label>
     <textarea placeholder="Bạn hãy nhập lời nhắn.." name="msg" required></textarea>
    <button type="submit" class="btn">Gửi</button>
     <button type="button" class="btn nut-dong-chatbox" onclick="dongForm()">Đóng</button>
   </form>
</body>
</html>