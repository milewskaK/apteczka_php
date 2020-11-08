
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
<h2><?php echo $txtNazwaProjektu; ?></h2>
</div>


<?php
include "inc/menu2.php";
echo '<p>[<a href="wyloguj.php">wyloguj</a>]</p>';
?>

<?php
if(($mojePolaczenie = polaczenie()) == NULL){
echo $_SESSION['bladPolaczenia'];
}


$NazwaHandlowa = $_POST['NazwaHandlowa'];
$Postac = $_POST['Postac'];
$KodKreskowy = $_POST['KodKreskowy'];
$zapytanie = "SELECT id,NazwaHandlowa,Postac,KodKreskowy FROM ListaLekow WHERE NazwaHandlowa LIKE '%$NazwaHandlowa%' AND Postac LIKE '%$Postac%' AND KodKreskowy LIKE '%$KodKreskowy%' ";

if($wynik = zapytanieDoBazy($mojePolaczenie, $zapytanie)){
    $wierszy = $wynik->num_rows;
    include "inc/naglTabSlowLekWyswAkcja.php";
    echo "<h5>Uzyskano $wierszy wiersz(e y)</h5>";
    if($wierszy>0) {
        while($row = $wynik->fetch_assoc()){
            if(isset($_POST['NazwaHandlowa']) && (isset($_POST['Postac'])) && (isset($_POST['KodKreskowy']))) {
                printf("<tr><td> %d </td><td> %s </td><td> %s </td><td> %s </td><td><a href=\"dodajdoapteczki2.php?id=%d\"> Dodaj do apteczki </a></td></tr>", $row["id"], $row["NazwaHandlowa"], $row["Postac"],  $row["KodKreskowy"], $row["id"]);
            }
        }
    }
}

?>