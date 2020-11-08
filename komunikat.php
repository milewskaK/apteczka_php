
<?php

$data = date('Y-m-d');

if($wynik = zapytanieDoBazy($mojePolaczenie, $ApteczkaSelect)) {

if(($wynik->num_rows)>0) {  
    while($wiersz = $wynik->fetch_assoc()) { 
    include "inc/naglTabApteczkaWysw.php";
  
    printf("<tr><td> %d </td><td> %s </td><td> %s </td><td> %s </td> <td> %s </td> <td> %d </td><td> %4.2f </td> <td><a href=\"edytujapteczke.php?id_leku=%d\"> Edytuj </a></td> <td><a href=\"usunzapteczki.php?id_leku=%d\"> Utylizuj </a></td> <td><a href=\"dodajdohistorii.php?id_leku=%d\"> Przenieś do zużytych </a></td> </tr>", $wiersz['id_leku'], $wiersz['NazwaHandlowa'], $wiersz['Postac'], $wiersz['KodKreskowy'], $wiersz['Waznosc'], $wiersz['Ilosc'], $wiersz['Cena'], $wiersz['id_leku'], $wiersz['id_leku'], $wiersz['id_leku']);

    echo "</tbody></table>"; 
    if($wiersz['Waznosc']<$data) {
        echo "<script language='javascript' type='text/javascript'>alert('Masz przeterminowany lek!'); </script>";
    }

    }
 

}
}
?>