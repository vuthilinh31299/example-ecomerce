<?php
// kết nối cơ sở dữ liệu
$con = mysqli_connect('localhost','root','','ecommerce2');
$select = "Select * from users ";
$a = mysqli_query($con,$select);
$row = mysqli_num_rows($a);
//lấy dữ liệu ở trên form 
if(isset($_POST['insert']))
{
    $user = $_POST['username'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $type=$_POST['type'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    if(empty($_POST['firstname'])|| empty($_POST['lastname'])||empty($_POST['username'])||empty($_POST['email'])|| empty($_POST['type'])||empty($_POST['password']))
    {
        echo"phải nhập đầy đủ dữ liệu vào các ô";
    }
    else
    {
        
        // khai báo câu lệnh truy vấn chèn dữ liệu(insert)
        $insert = "insert into users(username,pass,email,first_name,last_name,type) values('".$user."','".$pass."','".$email."','".$firstname."','".$lastname."','".$type."')";
        
        mysqli_query($con,$insert);
        header("Location: users.php");
    
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
        
            $insert="delete from users where id = '".$id."'";
            mysqli_query($con,$insert);
            header("Location: users.php");
        }
        
    }
    if(isset($_POST['update']))
    {
    $user = $_POST['username'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $type=$_POST['type'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $id = $_GET['id'];
    $name = $_GET['save'];
        if($name=="0")
        {
            $message = "Vui long chon du lieu can sua";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
    $insert="update users set username ='".$user ."',type ='".$type ."',email ='".$email ."',pass ='".$pass."',first_name ='".$firstname."',last_name ='".$lastname."'where id ='" .$id."'";
    mysqli_query($con,$insert);
    header("Location: users.php");
        }
    }
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
<p style="color:red;text-align:center;font-size:20px"><strong>USERS</strong></p>
<b>First name</b> <input type="text" name="firstname" ></td></tr>
<td colspan ="7"><b>Last name</b> <input type="text" name="lastname" ></td></tr>
<td colspan ="7"><b>User name</b> <input type="text" name="username" ></td></tr>
<td colspan ="7"><b>Email</b> <input type="text" name="email" ></td></tr>
<td colspan ="7"><b>Pass</b> <input type="text" name="password" ></td></tr>
<tr>
<td>Type</td>
<td colspan="7"><select name="type">
    <option value="admin">Admin</option>
    <option value="member">Member</option>
    </select>
    </td>
</tr>

<tr><td>    
<input type="submit" name="insert" value="Insert"  style="width:90px;height:26px"></td><td>
<input type="submit" name="delete" value="Delete"  style="width:90px;height:26px"></td><td >
<input type="submit" name="update" value="Update"  style="width:90px;height:26px"></td></tr>
<tr><td colspan="3" align="center">
    <table border="1"  style="width:500px;border-collapse:collapse;background-color:white;text-align:center">
<tr><td colspan="3" align="center" style="color:red;text-align:center"><h2>USERS</h2></td></tr>
        <tr>
            <td>ID</td>
            <td>Type</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Firstname</td>
            <td>Lastname</td>
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
                <td>".$rows['type']."</td>
                <td>".$rows['username']."</td>
                <td>".$rows['email']."</td>
                <td>".$rows['pass']."</td>
                <td>".$rows['first_name']."</td>
                <td>".$rows['last_name']."</td>
                <td><a href="."users.php?id=".$rows['id'].">Chọn</a></td>
                </tr>";
            }
        }
        echo  "<a href='index.php'>Về trang chủ</a>";
        ?>
    </table>
    
	
