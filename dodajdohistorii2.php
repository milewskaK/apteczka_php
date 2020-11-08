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

//include "inc/naglTabApteczkaHistoria.php";
if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($ApteczkaDoHistorii2, $_GET['id_leku']))){
      
}else
    echo $txtBladZapytania;

if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($ApteczkaUsun2, $_GET['id_leku']))){
    echo "<div class=\"alert alert-primary\" role=\"alert\">";
    echo "Usunięto rekord " . $_GET['id_leku'] . " z apteczki i przeniesiono go do historii, przejdź do strony głównej";
    echo "</div>";
    echo "</tbody></table>";       
}else
    echo $txtBladZapytania;
?>
<div class="container"><br>
<p><h4 style="text-align:center"><a href="wyloguj.php"><font color="#123A61">Wyloguj</font></a></h4></p>

<?php
    include "inc/stopka.php";
?>