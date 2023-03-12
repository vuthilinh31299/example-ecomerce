<?php

// This is the registration page for the site.
// This file both displays and processes the registration form.
// This script is begun in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:

	require ('includes/config.inc.php');
// The config file also starts the session.

// Include the header file:
$page_title = 'Add Products';
include ('includes/header.php');

// Require the database connection:
require ('mysql.inc.php'); 

// For storing registration errors:
$search = "Select * from categories ";
$a = mysqli_query($dbc,$search);
$row = mysqli_num_rows($a);
// if(isset($_POST['add'])){
// lệnh insert thành viên dăng í mới vào cơ sở dư dữ liệu
// $firstname =$_POST['firstname'];
// $lastname =$_POST['lastname'];
// $usertname =$_POST['username'];
// $email =$_POST['email'];
// $pass =$_POST['password'];
// $sqlinsert="insert into users(type,username,email,pass,first_name,last_name) value ('member','".$usertname."','".$email."','".$pass."','".$firstname."','".$lastname."')";
// //echo $sqlinsert;
// mysqli_query($dbc,$sqlinsert);
// $name=$_POST['name'];
// echo "đăng kí thành công";
// echo $_POST['lastname'];
// echo $_POST['name'];
// }

// if($_POST['categories']=="Another")
// {
// echo "Anal";
// }
// Need the form functions script, which defines create_form_input():
    if(isset($_POST['insert']))
    {
        
        $name = $_POST['categoryname'];
        if(!$name)
        {
            $message = "Vui long k de trong du lieu";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $insert="insert into categories (category) value('".$name."')";
            mysqli_query($dbc,$insert);
            // echo "Insert thanh cong. <a href=category1.php>Nhap vao day </a>";
            header("Location: category1.php");
        }
    }
    if(isset($_POST['delete']))
    {
        
        $name = $_GET['save'];
        if($name=="0")
        {
            $message = "Vui long chon du lieu can xoa";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $insert="delete from categories where id = '".$name."'";
            mysqli_query($dbc,$insert);
            header("Location: category1.php");
        }
    }
    if(isset($_POST['update']))
    {
        $category = $_POST['categoryname'];
        $name = $_GET['save'];
        if($name=="0")
        {
            $message = "Vui long chon du lieu can sua";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $insert="update categories set category='".$category."' where id = '".$name."'";
            mysqli_query($dbc,$insert);
            header("Location: category1.php");
        }
    }
require ('includes/form_functions.inc.php');
?>
<style>

.product_item {
	float:left;
	width:33%;
	display:block;
	text-align: center; 
 }

</style>
<form action="" method="post">
<table border="1" align="center" style=";border-collapse:collapse;text-align:center">
<tr><td colspan="7">
<p style="color:red;text-align:center;font-size:20px"><strong>CATEGORY LIST</strong></p>
<b>Category name</b> <input type="text" name="categoryname" ></td></tr>
<tr><td>    
<input type="submit" name="insert" value="Insert"  style="width:90px;height:26px"></td><td>
<input type="submit" name="delete" value="Delete"  style="width:90px;height:26px"></td><td >
<input type="submit" name="update" value="Update"  style="width:90px;height:26px"></td></tr>
<tr><td colspan="3" align="center">
    <table border="1"  style="width:500px;border-collapse:collapse;background-color:yellow;text-align:center">
<tr><td colspan="3" align="center" style="color:red;text-align:center"><h2>Category</h2></td></tr>
        <tr>
            <td>ID</td>
            <td>Category</td>
            <td>Check</td>
        </tr>
        <?php
        if($row)
        {
            while($rows=mysqli_fetch_array($a))
            {
                // in ra các dữ liệu theo dòng
                echo"<tr>
                <td>".$rows['id']."</td>
                <td>".$rows['category']."</td>
                <td><a href="."category1.php?save=".$rows['id'].">Choose</a></td>
                </tr>";
            }
        }
        // đóng kết nôi csdl
        // mysqli_close($con);
        ?>
    </table>
    </td></tr>
    <tr><td>
    <input type="submit" name="deleteall" value="Delete All"  style="width:90px;height:26px"></td><td colspan="2">
        <div class ="product_item">
<input type="submit" name="1" value="1"  style="width:60px;height:26px"></div> <div class ="product_item">
<input type="submit" name="2" value="2"  style="width:60px;height:26px"></div> <div class ="product_item">
<input type="submit" name="3" value="3"  style="width:60px;height:26px"></td></tr></div>
</table>
<!-- <form action="addthem.php" method="post" accept-charset="utf-8" style="padding-left:100px">
Categories
<select name="name">
	<option value = "None">None</option>;
	<?php
$q = 'SELECT * FROM categories ORDER BY category';
$r = mysqli_query($dbc, $q);
while (list($id, $category) = mysqli_fetch_array($r, MYSQLI_NUM)) {
	echo '<option value="' . $category . '">' . $category . '</option>';
}?>

</select>
<br><br>
<hr>
</hr>
<h6>
Or Insert another Categories</h6>
<b>New Catogories</b>
<input type="text" name="catogories"><br> -->
<!-- <p>Product Name</p>
<input type="text" name="username"><br>
<p>Categories_ID </p>
<input type="text" name="email"><br>
<p>Picture</p>
<input type="password" name="password"><br>
<p>Price</p>
<input type="password" name="password"><br>
<p>Description</p>
<input type="password" name="password"><br>
<input type="submit" value="Xac nhan" name="submit">
		 -->
</form>

<?php // Include the HTML footer:
include ('includes/footer.php');
?>