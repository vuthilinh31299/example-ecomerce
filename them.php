<?php
// kết nối cơ sở dữ liệu
$con = mysqli_connect('localhost','root','','ecommerce2');
//lấy dữ liệu ở trên form 
if(isset($_POST['luu']))
{
    if(empty($_POST['name'])|| empty($_POST['category_id'])||empty($_POST['picture'])|| empty($_POST['money'])||empty($_POST['mota']))
    {
        echo"phải nhập đầy đủ dữ liệu vào các ô";
    }
    else
    {
    $name = $_POST["name"];
    $category_id=$_POST["category_id"];
    $picture=$_POST["picture"];
    $money = $_POST["money"];
    $mota=$_POST["mota"];
    // khai báo câu lệnh truy vấn chèn dữ liệu(insert)
    $sqlInsert="insert into products(product_name,category_id,picture,price,description) 
    values('".$name."','".$category_id."','".$picture."','".$money."','".$mota."')";
    //thực thi câu lệnh truy vấn
    mysqli_query($con,$sqlInsert);
    echo $sqlInsert;
    header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method ="POST">
        <table align = "center" style="border:2px solid red; background-color:white;" >
        
        <tr>
            <td>Tên sản phẩm:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Mã danh mục sản phẩm:</td>
            <td><input type="text" name="category_id"></td>
        </tr>
        <tr>
            <td>Picture:</td>
            <td><input type="file" name="picture"></td>
        </tr>
        <tr>
            <td>giá tiền:</td>
            <td><input type="text" name="money"></td>
        </tr>
        <tr>
            <td>mô tả:</td>
            <td><input type="text" name="mota"></td>
        </tr>
        <tr>
            <td><input type="submit" name="luu" value="Lưu"></td>
        </tr>
        </table>
    </form>
</body>
</html>