<?php
// Require the configuration before any PHP code as the configuration controls error reporting:
require('includes/config.inc.php');
// The config file also starts the session.
// To test the sidebars:
//$_SESSION['user_id'] = 1;
//$_SESSION['user_admin'] = true;

// Require the database connection:
require ('mysql.inc.php'); 

// Next block added in Chapter 4:
// If it's a POST request, handle the login attempt:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('includes/login.inc.php');
}

// Include the header file:
include ('includes/header.php');

/* PAGE CONTENT STARTS HERE! */
?>
<style>
.product_item {
float:left;
width:33%;
display:block;
text-align: center;
}
</style>
<h3>Chào Mừng</h3>
<a href="them.php">Thêm sản phẩm</a>
<?php
    if(isset($_SESSION['user_admin']))
    {
    	$sqlselect= "select * from products ";
	    $ketqua= mysqli_query($dbc,$sqlselect);
    }
    elseif(isset($_SESSION['user_id']))
    {
        echo "Bạn phải là admin mới xem đc noi dung này";
    }
    else
    {
    	echo "Bạn phải đăng nhập đế xem thông tin đầy đủ";
    }
?>
<table>
	<?php
	if(isset($_SESSION['user_admin']))
	if($ketqua){
		echo	"<div class='product_list'>";
		while ($row=mysqli_fetch_array($ketqua)){
		echo	"<div class='product_item'>";
		echo	 "<h3 style ='color:red;'>".$row[1]."</h3>";echo "<br>";
		echo "<br>";
		echo    "<img src='images/".$row[3]."' width='150' height='150'><br>";
		echo    "mô tả: ".$row[5];
		echo    "<br>giá: ".$row[4]."vnđ";
		echo    "<br><a href="."order.php?id=".$row[0].">Order</a><br><br></div>";
		}
		echo" </div>";
		}
	?>
</table>
<?php /* PAGE CONTENT ENDS HERE! */

// Include the footer file to complete the template:
require ('includes/footer.php');
?>

