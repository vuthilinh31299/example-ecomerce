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
 .dathang {
   float:right;
   width:250px;
   display:block;
   text-align: center;
   margin-right: auto;
 }
</style>
<?php
    $product_id=$_GET['id'];
	$user_id=$_SESSION['user_id'];
	$sql_Insert ="Insert into oderdetail (product_id,user_id)values ('$product_id','$user_id')";
	mysqli_query($dbc,$sql_Insert);
?>

<table border="1"> 
<br>
        <h2>Danh Sách Giỏ Hàng</h2>
        <br>
        <br>
            <tr>
                <td>ID</td>
                <td>Tên Sản Phẩm</td>
                <td>Ảnh Sản Phẩm</td>
				<td>số lượng</td>
				<td>Đơn Giá</td>
                <td> Xóa</td>
            </tr>
<?php

$sql_select= "select distinct product_id, user_id from oderdetail where user_id='".$_SESSION['user_id']."'";
$ketqua=mysqli_query($dbc,$sql_select);
$row=mysqli_fetch_row($ketqua);
while ($row=mysqli_fetch_array($ketqua)) {
// code...
	   $sql_select2="select * from products where product_id='".$row[0]."'";
	   $soluong = "select count(product_id) from oderdetail where product_id='" .$row[0]."'";
	   $ketqua2=mysqli_query($dbc,$sql_select2);
	   //$row2=mysqli_fetch_row($ketqua2);
	   while ($row2=mysqli_fetch_array($ketqua2)) {
	   // code...	
	   $tongsoluong = mysqli_query($dbc, $soluong);
	   $x = mysqli_fetch_row($tongsoluong);
	   echo "<tr>
	   <td>".$row2[0]."</td>
	   <td>". $row2[1]."</td>
	   <td>"."<img src='images/".$row2[3]."' width='180' height='180'>"."</td>
	   <td> $x[0]</td>
	   <td>". $row2[4].' dola'."</td>
	   <td><a href="."xoagiohang.php?id=".$row2[0].">Xóa</a></td>
	   </tr>";
       echo "<tr>
       <td><a href="."muahang.php?id=".$row['product_id'].">Đặt hàng</a></td>
       </tr>";
		   }
}
?>

</table>   

	<?php /* PAGE CONTENT ENDS HERE! */

// Include the footer file to complete the template:
require ('includes/footer.php');
?>