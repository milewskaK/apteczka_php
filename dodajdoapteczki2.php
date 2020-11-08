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

<div class="container">
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">
    <h2 style="text-align:center"><font color="#0A4A8A"><?php echo $txtNazwaProjektu; ?></h2></font>
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">
</div>


<?php
    include "inc/menu2.php";

?>

<?php
   if(($mojePolaczenie = polaczenie()) == NULL){
    echo $_SESSION['bladPolaczenia'];
}

//echo sprintf($ApteczkaDodajZListy, $_GET['id']);
if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($ApteczkaDodajZListy2, $_GET['id']))){
    echo "<div class=\"alert alert-primary\" role=\"alert\">";
    echo "Dodano rekord do apteczki, cofnij się do strony głównej";
    echo "</div>";
    echo "</tbody></table>";
    
    echo '<a href="gra2.php?operacja=301"><font color="#123A61">Powrót</a></font>';
}else
    echo $txtBladZapytania;
?>
<div class="container"><br>
<p><h4 style="text-align:center"><a href="wyloguj.php"><font color="#123A61">Wyloguj</font></a></h4></p>

<?php
    include "inc/stopka.php";
?>


