			<!-- END CONTENT -->
			<p><br clear="all" /></p>
		</div>
		
		<div class="sidebar">	
			
			<!-- SIDEBAR -->
			
<?php // Show the user info or the login form:
 if (isset($_SESSION['user_id'])) {

	// Show basic user options:
	// Includes references to some bonus material discussed in Chapter 5!
	echo '<div class="title">
				<h4>Manage Your Account</h4>
			</div>
			<ul>
			<li><a href="renew.php" title="Renew Your Account">Renew Account</a></li>
			<li><a href="doimatkhau.php" title="Change Your Password">Change Password</a></li>
			<li><a href="favorites.php" title="View Your Favorite Pages">Favorites</a></li>
			<li><a href="history.php" title="View Your History">History</a></li>
			<li><a href="recommendations.php" title="View Your Recommendations">Recommendations</a></li>
			<li><a href="logout.php" title="Logout">Logout</a></li>
			</ul>
			';
			
	// Show admin options, if appropriate:
	if (isset($_SESSION['user_admin'])) {
		echo '<div class="title">
					<h4>Administration</h4>
				</div>
				<ul>
				<li><a href="insert.php" title="Add a Page">Add</a></li>
				<li><a href="delete.php" title="Add a PDF">Delete</a></li>
				<li><a href="update.php" title="Blah">Update</a></li>
				<li><a href="thempage.php" title="Blah">Thêm Danh mục</a></li>
				<li><a href="oder.php" title="Blah">Oder</a></li>
				<li><a href="users.php" title="Blah">Thêm tài khoản</a></li>
				</ul>
				';		
	}
					
} else { // Show the login form:
	
	require ('login_form.inc.php');
	
}
?>

			<div class="title">
				<h4>Content</h4>
			</div>
			<ul>
<?php // Dynamically generate the content links:
$q = 'SELECT * FROM categories ORDER BY category';
$r = mysqli_query($dbc, $q);
while (list($id, $category) = mysqli_fetch_array($r, MYSQLI_NUM)) {
	echo '<li><a href="category.php?id=' . $id . '" title="' . $category . '">' . $category . '</a></li>';
}
?>
			<li><a href="pdfs.php" title="PDF Guides">PDF Guides</a></li>
			</ul>
	
		</div>
		
		<div class="footer">
			<p><a href="site_map.php" title="Site Map">Site Map</a> | <a href="policies.php" title="Site Policies">Policies</a> &nbsp; - &nbsp; &copy; Knowledge is Power &nbsp; - &nbsp; Design by <a href="http://www.spyka.net">spyka webmaster</a></p> 
		</div>	
	</div>
</div>
</body>
</html>