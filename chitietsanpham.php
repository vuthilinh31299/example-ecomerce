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
?>

<?php
// lấy id của thể loại sản phẩm cần hiển thị 
$id=$_GET['id'];
//truy vấnvaof cơ sở dữ liệu lấy ra dữ liệu
    $sqlselect="select * from products where product_id ='".$id."'";
    $ketqua = mysqli_query($dbc,$sqlselect);
    if($ketqua){
		echo	"<div class='product_list'>";
		while ($row=mysqli_fetch_array($ketqua)){
   		echo	"<div class='product_item'>";
      	
        echo    "<img src='images/".$row[3]."' width='300' height='300'> <br>";
        echo	 "<h3 style ='color:red;'>".$row[1]."</h3>";echo "<br>";
        echo    "mô tả: ".$row[5];
        echo    "<br>giá: ".$row[4]."usd";
		echo    "<br><a href="."oders.php?id=".$row[0].">Thêm vào giỏ hàng</a><br><br></div> ";
	}
			echo" </div>";
					}
        
?>

<?php /* PAGE CONTENT ENDS HERE! */

// Include the footer file to complete the template:
require ('includes/footer.php');
?>

