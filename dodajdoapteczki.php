<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	   
?>
<?php
    include "inc/nagl.php";
    include "inc/baza.php";
    include "inc/zapytania.php";
?>

<body style="background-color: #FFFFFF">
<div style="text-align: center">
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">
<h2 style="text-align:center"><font color="#0A4A8A">Moja domowa apteczka</h2></font>
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">


<?php
    include "inc/menu1.php";

?>

<?php
   if(($mojePolaczenie = polaczenie()) == NULL){
    echo $_SESSION['bladPolaczenia'];
}

//echo sprintf($ApteczkaDodajZListy, $_GET['id']);
if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($ApteczkaDodajZListy, $_GET['id']))){

    echo "<div class=\"alert alert-primary\" role=\"alert\">";
    echo "Dodano rekord do apteczki, cofnij się do strony głównej";
    echo "</div>";
    echo "</tbody></table>";
    
    echo '<a href="gra.php?operacja=301"><font color="#123A61">Powrót</a></font>';
}else
    echo $txtBladZapytania;
        
?>
    
</div><font>
<div class="container"><br>
<p><h4 style="text-align:center"><a href="wyloguj.php"><font color="#123A61">Wyloguj</font></a></h4></p>

<?php
    include "inc/stopka.php";
?>
