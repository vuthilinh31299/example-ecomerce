<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php 
if (isset($page_title)) { 
		echo $page_title; 
} else { 
		echo 'Knowledge is Power: And It Pays to Know'; 
} 
?></title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>
<body>
<div id="wrap">
	<div class="header">
		<!-- TITLE -->
		<h1><a href="index.php">Knowledge is Power</a></h1>
		<h2>and it pays to know</h2>
		<!-- END TITLE -->
	<div id="nav">
		<ul>
			<!-- MENU -->
			<?php // Dynamically create header menus...
			
			// Array of labels and pages (without extensions):
			$pages = array (
				'Home' => 'index.php',
				'About' => '#',
				'Contact' => '#',
				'Register' => 'register.php'
			);

			// The page being viewed:
			$this_page = basename($_SERVER['PHP_SELF']);
			
			// Create each menu item:
			foreach ($pages as $k => $v) {
				
				// Start the item:
				echo '<li';
				
				// Add the class if it's the current page:
				if ($this_page == $v) echo ' class="selected"';
				
				// Complete the item:
				echo '><a href="' . $v . '"><span>' . $k . '</span></a></li>
				';
				
			} // End of FOREACH loop.
			?>
			<!-- END MENU -->
		</ul>
	</div>
	<div class="page">
		<div class="content">
		
			<!-- CONTENT -->
			