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
    include "inc/menu1.php";
?>
<br>

    <div class="container"><h7 style="text-align:center"><font color="#123A61">

<?php
    $_SESSION['zalogowany'] = "a@b.c";

    if(isset($_SESSION['zalogowany']) && isset($_GET['operacja'])){
        if(($mojePolaczenie = polaczenie()) == NULL){
            echo $_SESSION['bladPolaczenia'];
        }

    $kodOperacji = $_GET['operacja'];


    switch($kodOperacji){
        case 101:
            if($wynik = zapytanieDoBazy($mojePolaczenie, $UPRselect)){
                include "inc/naglTabUprWysw.php";
                while($wiersz = $wynik->fetch_assoc())
                    printf("<tr><td>%d</td><td>%d</td><td>%s</td></tr>", $wiersz['id'], $wiersz['kod'], $wiersz['aktor']);
                echo "</tbody></table>";
               // $mojePolaczenie->close();
            }else
                echo $txtBladZapytania;
            break;
        case 102:
            if($wynik = zapytanieDoBazy($mojePolaczenie, $UPRselect)){
                include "inc/naglTabUprUsun.php";
                while($wiersz = $wynik->fetch_assoc())
                    printf("<tr><td>%d</td><td>%d</td><td>%s</td><td><a href=\"gra.php?id=%d&operacja=1021\">EDYCJA</a></td></tr>", $wiersz['id'], $wiersz['kod'], $wiersz['aktor'], $wiersz['id']);
                echo "</tbody></table>";
                //$mojePolaczenie->close();
            }else
                echo $txtBladZapytania;
            break;
        case 1021:
            echo sprintf($UPRselect1, $_GET['id']);
            if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($UPRselect1, $_GET['id']))){
                $wiersz = $wynik->fetch_assoc();
                include "forms/frmEdytujUprawnienia.php";
                //$mojePolaczenie->close();
            }else
                echo $txtBladZapytania;
            break;
        case 103:
            include "forms/frmDodajUprawnienia.php";
            break;
        case 104:
            if($wynik = zapytanieDoBazy($mojePolaczenie, $UPRselect)){
                include "inc/naglTabUprUsun.php";
                while($wiersz = $wynik->fetch_assoc())
                    printf("<tr><td>%d</td><td>%d</td><td>%s</td><td><a href=\"operacjeDB.php?id=%d&kodOperacji=104\">USUN</a></td></tr>", $wiersz['id'], $wiersz['kod'], $wiersz['aktor'], $wiersz['id']);
                echo "</tbody></table>";
                //$mojePolaczenie->close();
            }else
                echo $txtBladZapytania;
            break;

            case 301: //wyswietlanie apteczki 
                if($wynik = zapytanieDoBazy($mojePolaczenie, $ApteczkaSelect)){  
                    echo "<div class=\"alert alert-primary\" role=\"alert\">";
                    echo "To jest Twoja apteczka";
                    echo "</div>";  
                    include "komunikat.php";                   
          
                }else
                    echo $txtBladZapytania;
                break;
            case 501: //wyswietlanie historii
                if($wynik = zapytanieDoBazy($mojePolaczenie, $HistoriaSelect)){
                    echo "<div class=\"alert alert-primary\" role=\"alert\">";
                    echo "Historia Twojej apteczki";
                    echo "</div>";
                    include "inc/naglTabApteczkaHistoria.php";
                    while($wiersz = $wynik->fetch_assoc())
                        printf("<tr><td> %d </td><td> %s </td><td> %d </td> <td> %s </td>", $wiersz['id'], $wiersz['NazwaHandlowa'], $wiersz['Ilosc'], $wiersz['Waznosc']);
                    echo "</tbody></table>"; 
                    
                    //$mojePolaczenie->close();        
                }else
                    echo $txtBladZapytania;
                    
                if($wynik = zapytanieDoBazy($mojePolaczenie, $UtylizacjaSelect)){
                    include "inc/naglTabApteczkaUtylizacja.php";
                    while($wiersz = $wynik->fetch_assoc())
                        printf("<tr><td> %d </td><td> %s </td><td> %d </td> <td> %s </td>", $wiersz['id'], $wiersz['NazwaHandlowa'], $wiersz['Ilosc'], $wiersz['Waznosc']);
                        echo "</tbody></table>"; 
                        
                        //$mojePolaczenie->close();        
                    }else
                        echo $txtBladZapytania;

                break;


            case 4021:
                echo sprintf($APTselect1, $_GET['id_leku']);
                if($wynik = zapytanieDoBazy($mojePolaczenie, sprintf($APTselect1, $_GET['id_leku']))){
                    $wiersz = $wynik->fetch_assoc();
                    include "forms/frmDodajDoApteczki.php";
                    //$mojePolaczenie->close();
                }else
                    echo $txtBladZapytania;
                break;
        }   

    }
?>
</div><font></h7>
<div class="container"><br>
<p><h4 style="text-align:center"><a href="wyloguj.php"><font color="#123A61">Wyloguj</font></a></h4></p>

<?php
    include "inc/stopka.php";
?>