<?php
//lấy cái id của bản ghi cần update
$masua =$_GET['id'];
//tạo kết nối đến csdl 
$con = mysqli_connect('localhost','root','','ecommerce2');
// khai báo truy vấn lấy dữ liệu ra để sửa
$sqlselect="select*from products where product_id='".$masua."'";
// thực thi việc lấy ra dữ liệu , lưu vào kết quả 
$ketqua = mysqli_query($con,$sqlselect);
// kiểm tra xem có lấy dc bản ghi dữ liệu nào ra không
if(!$ketqua)
{
    echo"câu lệnh truy vấn bị sai";
}
// lấy số bản ghi lấy ra được
$sodong = mysqli_num_rows($ketqua);
// hiển thị dữ liệu cần sửa vào biến rows
$rows = mysqli_fetch_array($ketqua);
// kiểm tra khi người dùng nhấn vào nút lưu
if(isset($_POST['luu']))
{
    //lấy các dữ liệu text box
    $name = $_POST["name"];
    $category_id=$_POST["category_id"];
    $picture=$_POST["picture"];
    $price = $_POST["price"];
    $description=$_POST["description"];
    // viết câu lẹnh truy vấn cập nhật
    $sqlupdate = "update products set product_name ='".$name ."',category_id ='".$category_id ."',picture ='".$picture ."',price ='".$price."',description ='".$description."'where product_id ='" .$masua."'";
    // thực thi truy vấn
    mysqli_query($con,$sqlupdate);

    //
    header("Location: index.php");
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
    <form action="" method="post">
        <table boder ="1">
            <tr>
<td>Id</td>
<td>tên sản phẩm</td>
<td>id danh mục</td>
<td>ảnh</td>
<td>Giá</td>
<td>Mô tả</td>

            </tr>
            <tr>
                <td><input type ="text" name="id" value="<?php echo $masua;?>"></td>
                <td><input type ="text" name="name" value="<?php echo $rows['product_name'];?>"></td>
                <td><input type ="text" name="category_id" value="<?php echo $rows['category_id'];?>" ></td>
                <td><input type ="text" name="picture" value="<?php echo $rows['picture'];?>"></td>
                <td><input type ="text" name="price" value="<?php echo $rows['price'];?>" ></td>
                <td><input type ="text" name="description" value="<?php echo $rows['description'];?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="luu" value ="lưu lại"></td>
            </tr>
        </table>
    </form>
</body>
</html>