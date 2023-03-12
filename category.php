<?php
// Require the configuration before any PHP code as the configuration controls error reporting:
require('includes/config.inc.php');//lệnh gọi
// The config file also starts the session.

// To test the sidebars:
//$_SESSION['user_id'] = 1;
//$_SESSION['user_admin'] = true;

// Require the database connection:
require ('mysql.inc.php'); //tệp kết nối cơ sở dữ liệu

// Next block added in Chapter 4:
// If it's a POST request, handle the login attempt:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('includes/login.inc.php');
}

// Include the header file:
include ('includes/header.php');

/* PAGE CONTENT STARTS HERE! */
$id=$_GET['id'];
$sqlselect="select * from products where category_id='".$id."'";
?>

<style>

.product_item {
	float:left;
	width:33%;
	display:block;
	text-align: center; 
 }

</style>
<h3>Chào mừng</h3>
<form action="" method="get">
	<input type="hidden" name="id" value="<?php echo $id;?> ">
	<select name="gia">
		<option value="1">Giá tăng dần</option>
		<option value="2">Giá giảm dần</option>
    </select>
    <input type="submit" name="luu" value="Tìm kiếm ">
</form>
<?php

// lấy id của thể loại sản phẩm cần hiển thị 

if(isset($_GET['luu']))
{
	$id=$_GET['id'];
	$a = $_GET['gia'];
	if($a=="1")
	{
		$sqlselect="select * from products where category_id='".$id."' order by price ASC";
		
	}
	else
	{
		$sqlselect="select * from products where category_id='".$id."' order by price DESC";
		
	}
}
//truy vấnvaof cơ sở dữ liệu lấy ra dữ liệu
$ketqua = mysqli_query($dbc,$sqlselect);
$row = mysqli_fetch_row($ketqua);

if($ketqua){
	echo	"<div class='product_list'>";
	while ($row=mysqli_fetch_array($ketqua)){
	   echo	"<div class='product_item'>";
	  echo	 "<h3 style ='color:red;'>".$row[1]."</h3>";echo "<br>";
	echo    "<img src='images/".$row[3]."' width='150' height='150'> <br>";
	echo    "mô tả: ".$row[5];
	echo    "<br>giá: ".$row[4]."usd";
	echo    "<br><a href="."chitietsanpham.php?id=".$row[0].">Chi tiết</a><br><br></div> ";
}
		echo" </div>";
				}
			

				?>
<?php /* PAGE CONTENT ENDS HERE! */

// Include the footer file to complete the template:
require ('includes/footer.php');
?>

