<?php
$mysql = mysqli_connect('localhost','root','','ecommercre') ;
if(isset($_POST['luu'])){
   $user = $_POST['username'];
   $pass=$_POST['password'];
   $email=$_POST['email'];
   $type=$_POST['aaaa'];
   $firstname=$_POST['firstname'];
   $lastname=$_POST['lastname'];
   $pass = md5($pass);
   $insert = "insert into users(username,pass,email,firstname,lastname,type) values('".$user."','".$pass."'
   ,'".$email."','".$firstname."','".$lastname."','".$type."')";
  $sql="select*from users";
  $result = mysqli_query($mysql,$sql);
//kiểm tra xem biến $resual có dữ liệu hay ko
if(!$result)
{
    die ("câu vấn bị sai");
}
$row = mysqli_num_rows($result);
if(!$user||!$pass||!$email||!$type||!$firstname||!$lastname)
  {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
  }
  else{
    if($row)
    {
       while($rows=mysqli_fetch_array($result))
       {
           if($rows['username']==$user)
           {
               echo "Tai khoan da ton tai, Vui long nhap tai khoan khac. <a href='javascript: history.go(-1)'>Trở lại</a>";
               exit;
           }
       }
    }
    $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
   
if(!preg_match($partten ,$email, $matchs)){
    echo "Email sai dinh dang, Vui long nhap tai khoan khac. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;}
  $addmember= mysqli_query($mysql,$insert);
   if ($addmember)
       echo "Quá trình đăng ký thành công. <a href='dulieu.php'>Về trang chủ</a>";
   else
       echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangnhap.php'>Thử lại</a>";
  }

// trong trường hợp có cơ sở dữ liệu thì in ra amnf hình 
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
<form action="" method="POST">
<table border="1" align="center" style="width:350px;border-collapse:collapse;background-color:white;text-align:left">
<tr><td colspan="5" align="center" style="color:red"><h2>DANG KY TAI KHOAN</h2></td></tr>
        <tr>
            <td>Username</td>
            <td ><input type="text" size="28px" name="username" id="username" ></td>
            
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" size="28px" name="password" id="password"></td>
            
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="28px" name="email" id="email"></td>
            
        </tr>
        <tr>
            <td>FirstName</td>
            <td><input type="text" size="28px" name="firstname" id="firstname"></td>
            
        </tr>
        <tr>
            <td>LastName</td>
            <td><input type="text" size="28px" name="lastname" id="lastname"></td>
            
        </tr>
        <tr>
            <td>Type</td>
            <td><select name="aaaa">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </td>
</tr>
<tr><td colspan="2" align="center"><input type="submit" name="luu" value="Dang ky"></td></tr>
    </table></form>
</body>
</html>
