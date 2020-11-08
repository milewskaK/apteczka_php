
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
include "inc/menu1.php";
echo '<p>[<a href="wyloguj.php">wyloguj</a>]</p>';
?>

<?php
if(($mojePolaczenie = polaczenie()) == NULL){
echo $_SESSION['bladPolaczenia'];
}

$szablon = $mojePolaczenie->prepare($ApteczkaUpdate);
            $szablon->bind_param("sddd", $val5, $val6, $val3, $val1);
            $val5 = $_POST['Waznosc'];
            $val6 = $_POST['Ilosc'];
            $val3 = $_POST['Cena'];
            $val1 = $_POST['id_leku'];
            
            $szablon->execute();
            echo "Zmieniono elementy apteczki - Ważność, Ilość, Cena/szt. - cofnij się do strony głównej.<br>";
            $szablon->close();
            echo '<a href="gra.php?operacja=301">POWRÓT DO APTECZKI</a>';