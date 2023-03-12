<?php
$con = mysqli_connect('localhost','root','','ecommerce2');
$select = "Select * from oderdetail ";
$a = mysqli_query($con,$select);
$row = mysqli_num_rows($a);
if(isset($_POST['insert']))
{
    $product_id = $_POST["product_id"];
    $user_id = $_POST["user_id"];
    if(empty($_POST['product_id'])||empty($_POST['user_id']))
    {
        echo"phải nhập đầy đủ dữ liệu vào các ô";
    }
    else
    {
    $insert="insert into oderdetail (product_id,user_id) value('".$product_id."','".$user_id."')";
    mysqli_query($con,$insert);
    header("Location: oder.php");
    }
}
if(isset($_POST['delete']))
    {
        $id = $_GET['id'];
            $insert="delete from oderdetail where id = '".$id."'";
            mysqli_query($con,$insert);
            header("Location:oder.php");
    }
if(isset($_POST['update']))
    {
        $product_id = $_POST["product_id"];
        $user_id = $_POST["user_id"];
        $id = $_GET['id'];
            $insert="update oderdetail set product_id='".$product_id."',user_id ='".$user_id ."' where id = '".$id."'";
            mysqli_query($con,$insert);
            header("Location: oder.php");
    
    }

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
<form action="" method="post">
<table border="1" align="center" style=";border-collapse:collapse;text-align:center">
<tr><td colspan="7">
<p style="color:red;text-align:center;font-size:20px"><strong>ODERDETAIL</strong></p>
<b>Product_Id</b> <input type="text" name="product_id" ></td></tr>
<td colspan ="7"><b>User_id</b> <input type="text" name="user_id" ></td></tr>
<tr><td>    
<input type="submit" name="insert" value="Insert"  style="width:90px;height:26px"></td><td>
<input type="submit" name="delete" value="Delete"  style="width:90px;height:26px"></td><td >
<input type="submit" name="update" value="Update"  style="width:90px;height:26px"></td></tr>
<tr><td colspan="3" align="center">
    <table border="1"  style="width:500px;border-collapse:collapse;background-color:white;text-align:center">
<tr><td colspan="3" align="center" style="color:red;text-align:center"><h2>ODERDETAIL</h2></td></tr>
        <tr>
            <td>ID</td>
            <td>Product_id</td>
            <td>User_id</td>
            <td>Chọn</td>
        </tr>
        <?php
        if($row)
        {
            while($rows=mysqli_fetch_array($a))
            {
                // in ra các dữ liệu theo dòng
                echo"<tr>
                <td>".$rows['id']."</td>
                <td>".$rows['product_id']."</td>
                <td>".$rows['user_id']."</td>
                <td><a href="."oder.php?id=".$rows['id'].">Chọn</a></td>
                </tr>";
            }
        }
        echo  "<a href='index.php'>Về trang chủ</a>";
        ?>
    </table>
    
	


