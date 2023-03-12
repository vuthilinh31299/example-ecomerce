<?php
require('includes/config.inc.php');
require ('mysql.inc.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('includes/login.inc.php');
}
include ('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSSALL/indexx.css">
	<title>Document</title>
</head>
<body>
<div class="column-layout">
 <?php 
 		$sql_select= "select distinct product_id, user_id from cart where user_id='".$_SESSION['user_id']."'";
 		$ketqua=mysqli_query($dbc,$sql_select);
		$row=mysqli_fetch_row($ketqua);
		while ($row=mysqli_fetch_array($ketqua)) {				
				$sql_select2="select * from products where product_id='".$row[0]."'";
				$ketqua2=mysqli_query($dbc,$sql_select2);
				$sql_soluong="select count(product_id) from cart where product_id='".$row[0]."'";
				while ($row2=mysqli_fetch_array($ketqua2)) {
					$soluong=mysqli_query($dbc,$sql_soluong);
					$sl=mysqli_fetch_row($soluong);		
					echo 
					'<div class="column-item">
					<h4><center>'.$row2[1].'</center></h4>
					<a href=item.php?idd='.$row2['product_id'].'><img style="width:150px" height="175px" src="'.$row2[3].'"/></a>
					<h4><center>'.$row2['price'].'$'.'</center></h4>
					<center><h4>  <a href=xoa_cart.php?idsp='.$row2['product_id'].'>Delete</a></h4></center></div>';
					}
		}
  ?>
</div>          	 
</body>
</html>
<?php
require ('includes/footer.php');
?>