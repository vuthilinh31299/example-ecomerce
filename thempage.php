<?php
$con = mysqli_connect('localhost','root','','ecommerce2');
$select = "Select * from categories ";
$a = mysqli_query($con,$select);
$row = mysqli_num_rows($a);
if(isset($_POST['insert']))
{
    $name = $_POST["categoryname"];
    if(empty($_POST['categoryname']))
    {
        echo"phải nhập đầy đủ dữ liệu vào các ô";
    }
    else
    {
    $insert="insert into categories (category) value('".$name."')";
    mysqli_query($con,$insert);
    header("Location: thempage.php");
    }
}
if(isset($_POST['delete']))
    {
        
        $id = $_GET['id'];
        $name = $_GET['save'];
        if($name=="0")
        {
            $message = "Vui long chon du lieu can sua";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $insert="delete from categories where id = '".$id."'";
            mysqli_query($con,$insert);
            header("Location: thempage.php");
        }
    }
    
    if(isset($_POST['update']))
    {
        $category = $_POST['categoryname'];
        $id = $_GET['id'];
        $name = $_GET['save'];
        if($name=="0")
        {
            $message = "Vui long chon du lieu can sua";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $insert="update categories set category='".$category."' where id = '".$id."'";
            mysqli_query($con,$insert);
            header("Location: thempage.php");
        }
    
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
<p style="color:red;text-align:center;font-size:20px"><strong>CATEGORY LIST</strong></p>
<b>Category name</b> <input type="text" name="categoryname" ></td></tr>
<tr><td>    
<input type="submit" name="insert" value="Insert"  style="width:90px;height:26px"></td><td>
<input type="submit" name="delete" value="Delete"  style="width:90px;height:26px"></td><td >
<input type="submit" name="update" value="Update"  style="width:90px;height:26px"></td></tr>
<tr><td colspan="3" align="center">
    <table border="1"  style="width:500px;border-collapse:collapse;background-color:white;text-align:center">
<tr><td colspan="3" align="center" style="color:red;text-align:center"><h2>Category</h2></td></tr>
        <tr>
            <td>ID</td>
            <td>Category</td>
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
                <td>".$rows['category']."</td>
                <td><a href="."thempage.php?id=".$rows['id'].">Chọn</a></td>
                </tr>";
            }
        }
    echo  "<a href='index.php'>Về trang chủ</a>";
    ?>
</table>
	


