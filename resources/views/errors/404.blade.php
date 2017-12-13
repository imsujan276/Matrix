<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>404 ERROR</title>
</head>
<body>
	<?php 
		header("Refresh:3;url=".url('/'));
	?>
	<center>
		<h1>
			The page You Are Requsting is Not Found.
		</h1>
		<h3>
			Redirecting to Home Page.....
		</h3>
	</center>

</body>
</html>