<!DOCTYPE html> 
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
?>
<html lang="pl-PL">
	<?php
		$lang = "pl";
		include "lang/$lang/txt.php";
	?>
	<head>
		<meta charset="UTF-8"> 
		<title><?php echo $txtTytulAplikacji?></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">		
		<link rel="stylesheet" href="CSS/style.css">
	</head>
<body>

