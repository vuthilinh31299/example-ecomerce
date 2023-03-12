<?php
$maxoa =$_GET['id'];
$con = mysqli_connect('localhost','root','','ecommerce2');
$sqldelete = "delete from products where product_id ='".$maxoa."'";
mysqli_query($con,$sqldelete);
header("Location: index.php");
?>