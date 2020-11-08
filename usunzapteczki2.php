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
<h2 style="text-align:center"><font color="#0A4A8A">Witaj w internetowej apteczce!</h2></font>
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">


<?php
    include "inc/menu2.php";

?>

<?php
   if(($mojePolaczenie = polaczenie()) == NULL){
    echo $_SESSION['bladPolaczenia'];
}

if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($ApteczkaDoUtylizacji2, $_GET['id_leku']))){
      
}else
    echo $txtBladZapytania;

//echo sprintf($ApteczkaDodajZListy, $_GET['id']);
if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($ApteczkaUsun2, $_GET['id_leku']))){
    echo "<div class=\"alert alert-primary\" role=\"alert\">";
    echo "Usunięto rekord " . $_GET['id_leku'] . " z apteczki i przeniesiono go do utylizacji, cofnij się do strony głównej";
    echo "</div>";
    echo "</tbody></table>";     
    
    echo '<a href="gra2.php?operacja=301"><font color="#123A61">Powrót do apteczki</a></font>';
}else
    echo $txtBladZapytania;
?>
<div class="container"><br>
<p><h4 style="text-align:center"><a href="wyloguj.php"><font color="#123A61">Wyloguj</font></a></h4></p>

<?php
    include "inc/stopka.php";
?>