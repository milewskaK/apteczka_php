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
    include "inc/menu2.php";

?>

<?php
   if(($mojePolaczenie = polaczenie()) == NULL){
    echo $_SESSION['bladPolaczenia'];
}

$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
$results_per_page = 50; //Liczba wynikow na strone
$skip = (($cur_page - 1) * $results_per_page); //liczba pomijanych wierszy na potrzeby stronicowania
$query = "SELECT id, NazwaHandlowa, Postac, KodKreskowy FROM ListaLekow";
$data = mysqli_query($mojePolaczenie, $query); //pobieramy wszystkie wiersze
//dopisujemy do wcze niejszego zapytania, klauzule LIMIT
$total = mysqli_num_rows($data); 
$num_pages = ceil($total / $results_per_page); //okreslenie liczby stron
$query .=  " LIMIT $skip, $results_per_page"; 
if($wynik = zapytanieDoBazy($mojePolaczenie, $query)){
   //liczba wierszy zapisana na potrzeby stronicowania

//wykonanie kwerendy

    echo "<div class=\"alert alert-primary\" role=\"alert\">";
    echo "Słownik leków";
    echo "</div>";
    include "inc/naglTabSlowLekWysw.php";
    while($wiersz = $wynik->fetch_assoc())
        printf("<tr><td> %d </td><td> %s </td><td> %s </td><td> %s </td></tr>", $wiersz['id'], $wiersz['NazwaHandlowa'], $wiersz['Postac'], $wiersz['KodKreskowy']);
        echo "</tbody></table>";
        $mojePolaczenie->close();  
//$result = mysqli_query($mojePolaczenie, $query);
function generate_page_links($cur_page, $num_pages) {
    $page_links = '';

    // odno nik do poprzedniej strony (-1)
    if ($cur_page > 1) {
         $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page - 1) . '"><-</a> ';
    }

    $i = $cur_page - 4;
    $page = $i + 8;

    for ($i; $i <= $page; $i++) {

         if ($i > 0 && $i <= $num_pages) {
              
              //jezeli jestesmy na danej stronie to nie wyswietlamy jej jako link    
              if ($cur_page == $i  && $i != 0) {
                   $page_links .= '' . $i;
              }
              else {

                   //wyswietlamy odno nik do 1 strony
                   if ($i == ($cur_page - 4) && ($cur_page - 5) != 0) { 
                        $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=1">1</a> '; 
                   }
              
                   //wyswietlamy "kropki", jako odnosnik do poprzedniego bloku stron
                   if ($i == ($cur_page - 4) && (($cur_page - 6)) > 0) { 
                        $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page - 5) . '">...</a> '; 
                   } 
              
                   //wyswietlamy liki do bie  cych stron
                   $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '"> ' . $i . '</a> ';
         
                   //wyswietlamy "kropki", jako odnosnik do nastepnego bloku stron
                   if ($i == $page && (($cur_page + 4) - ($num_pages)) < -1) { 
                        $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page + 5) . '">...</a>'; 
                   } 
              
                   //wyswietlamy odnosnik do ostatniej strony
                   if ($i == $page && ($cur_page + 4) != $num_pages) { 
                        $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $num_pages . '">' . $num_pages . '</a> '; 
                   }
              }
         }
    }

    //odnosnik do nastepnej strony (+1)
    if ($cur_page < $num_pages) {
         $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page + 1) . '">-></a>';
    }

    return $page_links;
} 
if ($num_pages > 1) {
    echo generate_page_links($cur_page, $num_pages);
}
}else
    echo $txtBladZapytania;


?>

</div><font></h7>
<div class="container"><br>
<p><h4 style="text-align:center"><a href="wyloguj.php"><font color="#123A61">Wyloguj</font></a></h4></p>

<?php
    include "inc/stopka.php";
?>