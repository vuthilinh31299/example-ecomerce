<?php
require('includes/config.inc.php');
require ('mysql.inc.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('includes/login.inc.php');
}
include ('includes/header.php');
$i=$_SESSION['user_id'];
if(isset($_POST['save']))
{
    $pass = $_POST['pass_n'];
    $sqlupdate = "update users set pass ='".$pass."' where id ='" .$i."'";
    mysqli_query($dbc,$sqlupdate);
    header('location:users.php');
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="CSSALL/registerss.css">
	<title>Document</title>
</head>
<body>
<form action="" method="POST">
<table border="1" align="center" style="width:350px;border-collapse:collapse;background-color:White;text-align:left">
<tr><td colspan="5" align="center" style="color:red"><h2>ĐỔI MẬT KHẨU</h2></td></tr>
        <tr>
            <td>Mật khẩu cũ</td>
            <td ><input type="text" size="28px" name="pass" id="pass" ></td>
            
        </tr>
        <tr>
            <td>Mật khẩu mới</td>
            <td><input type="password" size="28px" name="pass_n" id="pass_n"></td>
            
        </tr>
        <tr>
            <td>Nhập lại mật khẩu</td>
            <td><input type="text" size="28px" name="pass_nn" id="pass_nn"></td>
            
        </tr>
<tr><td colspan="2" align="center"><input type="submit" name="save" value="Save Change"></td></tr>
    </table>
    </form>
</body>
</html>
<?php /* PAGE CONTENT ENDS HERE! */

// Include the footer file to complete the template:
require ('includes/footer.php');
?>

