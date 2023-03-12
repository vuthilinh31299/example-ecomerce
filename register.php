<?php

// This is the registration page for the site.
// This file both displays and processes the registration form.
// This script is begun in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:

	require ('includes/config.inc.php');
// The config file also starts the session.

// Include the header file:
$page_title = 'Register';
include ('includes/header.php');

// Require the database connection:
require ('mysql.inc.php'); 

// For storing registration errors:

if(isset($_POST['submit'])){
// lệnh insert thành viên dăng í mới vào cơ sở dư dữ liệu
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$usertname =$_POST['username'];
$email =$_POST['email'];
$pass =$_POST['password'];
$sqlinsert="insert into users(type,username,email,pass,first_name,last_name) value ('member','".$usertname."','".$email."','".$pass."','".$firstname."','".$lastname."')";
//echo $sqlinsert;
mysqli_query($dbc,$sqlinsert);
echo "đăng kí thành công";
}
	
// Need the form functions script, which defines create_form_input():
require ('includes/form_functions.inc.php');
?><h3>Register</h3>
<p>Access to the site's content is available to registered users at a cost of $10.00 (US) per year. Use the form below to begin the registration process. <strong>Note: All fields are required.</strong> After completing this form, you'll be presented with the opportunity to securely pay for your yearly subscription via <a href="http://www.paypal.com">PayPal</a>.</p>
<form action="register.php" method="post" accept-charset="utf-8" style="padding-left:100px">
<p>First Name</p>
<input type="text" name="firstname"><br>
<p>Last Name</p>
<input type="text" name="lastname"><br>
<p>User Name</p>
<input type="text" name="username"><br>
<p>Email</p>
<input type="text" name="email"><br>
<p>PassWord</p>
<input type="text" name="password"><br>
<input type="submit" value="Submit" name="submit">
		
	
</form>

<?php // Include the HTML footer:
include ('includes/footer.php');
?>

