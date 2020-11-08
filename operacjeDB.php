<?php
    session_start();

    if(!isset($_SESSION['zalogowany']))
        header("Location: ./");

    include "inc/nagl.php";
    include "inc/baza.php";
    include "inc/zapytania.php";

    if(($mojePolaczenie = polaczenie()) == NULL){
        header("Location: ./");
    }

    if(!isset($_POST['kodOperacji']) && !isset($_GET['kodOperacji']))
        header("Location: ./");
    
    if(!isset($_POST['kodOperacji']))
        $kodOperacji = $_POST['kodOperacji'];
    else
        $kodOperacji = $_GET['kodOperacji'];

    $kodOperacji = (int) $kodOperacji;
   

    switch ($kodOperacji){
        case 1021:
            $szablon = $mojePolaczenie->prepare($UPRupdate);
            $szablon->bind_param("dsd", $val1, $val2, $val3);
            $val1 = $_POST['kod'];
            $val2 = $_POST['aktor'];
            $val3 = $_POST['id'];
            $szablon->execute();
            echo "zmieniono " . $mojePolaczenie->affected_rows . "rekord[y �w]<br>";
            $szablon->close();
            echo '<a href="gra.php?operacja=101">POWR�T</a>';
        break;
        case 103:
            if(isset($_POST['kod']) && $_POST['aktor']){
                $szablon = $mojePolaczenie->prepare($UPRinsert);
                $szablon->bind_param("ds", $val1, $val2);
                $val1 = $_POST['kod'];
                $val2 = $_POST['aktor'];
                $szablon->execute();
            }
            echo "Dodano " . $mojePolaczenie->affected_rows . "rekord�w<br>";
            $szablon->close();
            echo '<a href="gra.php?operacja=101">POWR�T</a>';
            break;
        case 104:
            $szablon = $mojePolaczenie->prepare($UPRdelete);
            $szablon->bind_param("d", $val1);
            $val1 = $_GET['id'];
            $szablon->execute();
            echo "Usuni�to " . $mojePolaczenie->affected_rows . " rekodr[y �w]<br>";
            $szablon->close();
            echo '<a href="gra.php?operacja=101>POWR�T</a>';
            break;
 
        
        default:
            header("Location: ./");
    }
    include "inc/stopka.php";
?>