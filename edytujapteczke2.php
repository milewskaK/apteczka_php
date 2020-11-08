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
<h2 style="text-align:center"><font color="#0A4A8A">Moja Apteczka Domowa</h2></font>
<hr style="height: 6px; width:1100px; background: #336699; border: 0px;">


<?php
    include "inc/menu2.php";

?>

<?php
   if(($mojePolaczenie = polaczenie()) == NULL){
    echo $_SESSION['bladPolaczenia'];
}



//echo sprintf($ApteczkaSelect12, $_GET['id_leku']);
            if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($ApteczkaSelect12, $_GET['id_leku']))){
                
                while($wiersz = $wynik->fetch_assoc())
                include "forms/frmDodajDoApteczki2.php";
                printf("<tr><td> %s </td><td> %s </td><td> %d </td> <td> %d </td></tr>", $wiersz['id_leku'], $wiersz['Waznosc'], $wiersz['Ilosc'], ($wiersz['Cena'] . "Zł"));
            echo "</tbody></table>";           
            }else
                echo $txtBladZapytania;
    
     
?>
<div class="container"><br>
<p><h4 style="text-align:center"><a href="wyloguj.php"><font color="#123A61">Wyloguj</font></a></h4></p>

<?php
    include "inc/stopka.php";
?>