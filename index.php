<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Apteczka</title>
</head>

<body style="background-color: #FFFFFF">
<div style="text-align: center">
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">
<h2 style="text-align:center"><font color="#0A4A8A">Witaj w internetowej apteczce!</h2></font>
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">
<form action="zaloguj.php" method="post">
	<tr><td><img src="white.png" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
<td><img src="white.png" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
<td><img src="ludzik.jpg" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
<td><img src="white.png" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
<td><img src="white.png" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
<td><img src="LUDZIK2.jpg" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
<td><img src="white.png" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
<td><img src="white.png" class="img-fluid" target = "blank" alt="" width="150" height="150" ></td>
</tr>
<h4 style="text-align:center"><font color="#123A61"><a href="rejestracja.php">Zarejestruj się</a>, jeśli jesteś tutaj pierwszy raz. Stałych użytkowników zapraszamy do logowania:</font></h4>
	
<h4 style="text-align:center"><font color="#123A61">Login:<br /> <input type="text" name="login" /></font></h4>
<h4 style="text-align:center"><font color="#123A61">Hasło: <br /> <input type="password" name="haslo" /> </font></h4><br />
		<div align=center><input type="submit" class="btn btn-info" value="Zaloguj się" /></div>	
	</form>

<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
    
<hr style="width:1100px;">
	<h5>
   <h5 style="text-align:center"><font color="#797979">Apteczka Domowa Karolina Milewska & Magdalena Gorczowska</font></h5>
	</h5>
</body>
</html>