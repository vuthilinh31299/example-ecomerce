<?php
$mysql = mysqli_connect('localhost','root','','ecommerce2') ;


if(isset($_POST['btldangky'])){
   $user = $_POST['txt1'];
   $phone=$_POST['txt2'];
   $diachi=$_POST['txt3'];
   $ghichu=$_POST['txt4'];
   $insert = "insert into oders(username,phone,diachi,ghichu) values('".$user."','".$phone."'
   ,'".$diachi."','".$ghichu."')";
  $sql="select*from oders";
  $result = mysqli_query($mysql,$sql);
//kiểm tra xem biến $resual có dữ liệu hay ko
if(!$result)
{
    die ("câu vấn bị sai");
}
$row = mysqli_num_rows($result);
if(!$user||!$phone||!$diachi||!$ghichu)
  {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
  }
  
  $addmember= mysqli_query($mysql,$insert);
   if ($addmember)
       echo "Quá trình mua hang thanh cong. <a href='index.php'>Về trang chủ</a>";
   else
       echo "Có lỗi xảy ra trong quá trình mua. <a href='muahang.php'>Thử lại</a>";
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
  
  <form action=""method="post">
          <center><h3>Thông tin người nhận </h3></center>
          <table border="1" align="center" style="width:350px;border-collapse:collapse;background-color:white;text-align:left">           
             <tr>
                  <td>Tên Người Nhận</td>
                  <td><input type="text"name="txt1"></td>
              </tr>
              <tr>
                  <td>Điện Thoại</td>
                  <td><input type="text"name="txt2" required =""></td>
              </tr>
              <tr>
                  <td>Địa chỉ</td>
                  <td><input type="text"name="txt3"required =""></td>
              </tr>
              <tr>
                  <td>Ghi Chú</td>
                  <td><textarea name="txt4" required =""></textarea></td>
              </tr>
              <tr>
                  <td><input type="submit" name="btldangky" values="Đăng ký"></td>
              </tr>
          </table>
      </form>
  </body>
  </html>
