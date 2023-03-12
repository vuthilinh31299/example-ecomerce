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

?>
<?php 
	$product_id=$_GET['idsp'];
	$user_id=$_SESSION['user_id'];
	$sql_Insert="Insert into Oderdetail(product_id, user_id) values('$product_id','$user_id')";
	mysqli_query($dbc, $sql_Insert);
 ?>
<table border="1"> 
 <?php 
 		$sql_select= "select distinct product_id, user_id from Oderdetail where user_id='".$_SESSION['user_id']."'";
 		$ketqua=mysqli_query($dbc,$sql_select);
		$row=mysqli_fetch_row($ketqua);
		while ($row=mysqli_fetch_array($ketqua)) {
		// code...
			echo "<tr>";
			echo "<td>";
				
				$sql_select2="select * from products where product_id='".$row[0]."'";
				$ketqua2=mysqli_query($dbc,$sql_select2);
				$sql_soluong="select count(product_id) from oderdetail where product_id='".$row[0]."'";

				//$row2=mysqli_fetch_row($ketqua2);
				while ($row2=mysqli_fetch_array($ketqua2)) {
					$soluong=mysqli_query($dbc,$sql_soluong);
					$sl=mysqli_fetch_row($soluong);
				// code...					
						echo "<h3 style='color: red;'>".$row2[1]."</h3>"; 
						echo "<img src='".$row2[3]."' width='150' height='150'>"; 
						echo $row2[4]; 
						echo $row2[5]."</br>"; 		
						echo $sl[0];		
						echo "<a href='dathang.php?idsp=".$row2[0]."'></a>";echo "<br>";

					}
			echo "</td>";
			echo "</tr>";

		}
  ?>
  </table>
<?php
require ('includes/footer.php');
?>