<?php

$UPRselect = "SELECT * FROM uprawnienia ORDER BY kod";
$UPRselect1 = "SELECT * FROM uprawnienia WHERE id = %d ORDER BY kod";

$UPRinsert = "INSERT INTO uprawnienia (kod, aktor) VALUES (?, ?)";
$UPRupdate = "UPDATE uprawnienia SET kod = ?, aktor = ? WHERE id = ?";
$UPRdelete = "DELETE FROM uprawnienia WHERE id = ?";

//slownik lekow
$SLEKselect = "SELECT id, NazwaHandlowa, Postac, KodKreskowy FROM `ListaLekow`";
$LlEKwybor = "SELECT id, NazwaHandlowa, Postac, KodKreskowy FROM `ListaLekow` ";
$LlEKwybor .="WHERE NazwaHandlowa LIKE '%%%s%%' AND KodKreskowy LIKE '%%%s%%' ";
$LlEKwybor .="AND Postac LIKE '%%%s%%' ";
$LlEKwybor .="ORDER BY NazwaHandlowa LIMIT 50 OFFSET 0";
$SLEKUpdate = "UPDATE `ListaLekow` SET NazwaHandlowa = ?, Postac = ?, KodKreskowy = ? WHERE id = ?";

//apteczka - id, nazwa, postac, EAN, ilość, ważność
$ApteczkaSelect = "SELECT id_leku, NazwaHandlowa, Postac, KodKreskowy, Waznosc, Ilosc, Cena FROM `apteczka`";
$ApteczkaSelect1 = "SELECT id_leku, Waznosc, Ilosc, Cena FROM apteczka WHERE id_leku = %d";

$ApteczkaDodajZListy = "INSERT INTO `apteczka` (NazwaHandlowa, Postac, KodKreskowy) SELECT NazwaHandlowa, Postac, KodKreskowy FROM `ListaLekow` WHERE id=%d";
$ApteczkaDodajReszte = "INSERT INTO apteczka (NazwaHandlowa, Postac, KodKreskowy) VALUES (?, ?, ?)";
$ApteczkaUsun = "DELETE FROM apteczka WHERE id_leku = %d";

$APTselect1 = "SELECT * FROM apteczka WHERE id_leku = %d";
$ApteczkaUpdate = "UPDATE apteczka SET Waznosc = ?, Ilosc = ?, Cena = ? WHERE id_leku = ?";

$SzukajRekord = "SELECT id, NazwaHandlowa, Postac, KodKreskowy FROM `ListaLekow` WHERE NazwaHandlowa = %s";






//dodanie do historii
$ApteczkaDoHistorii = "INSERT INTO `historia` (NazwaHandlowa, Ilosc, Waznosc) SELECT NazwaHandlowa, Ilosc, Waznosc FROM `apteczka` WHERE id_leku=%d";
$HistoriaSelect = "SELECT id, NazwaHandlowa, Ilosc, Waznosc FROM `historia` LIMIT 50 OFFSET 0";
$ApteczkaDoUtylizacji = "INSERT INTO `zutylizowane` (NazwaHandlowa, Ilosc, Waznosc) SELECT NazwaHandlowa, Ilosc, Waznosc FROM `apteczka` WHERE id_leku=%d";
$UtylizacjaSelect = "SELECT id, NazwaHandlowa, Ilosc, Waznosc FROM `zutylizowane` LIMIT 50 OFFSET 0";

//APTECZKA 2
$ApteczkaSelect2 = "SELECT id_leku, NazwaHandlowa, Postac, KodKreskowy, Waznosc, Ilosc, Cena FROM `apteczka2` LIMIT 50 OFFSET 0";
$ApteczkaSelect12 = "SELECT id_leku, Waznosc, Ilosc, Cena FROM apteczka2 WHERE id_leku = %d";

$ApteczkaDodajZListy2 = "INSERT INTO `apteczka2` (NazwaHandlowa, Postac, KodKreskowy) SELECT NazwaHandlowa, Postac, KodKreskowy FROM `ListaLekow` WHERE id=%d";
$ApteczkaDodajReszte2 = "INSERT INTO apteczka2 (NazwaHandlowa, Postac, KodKreskowy) VALUES (?, ?, ?)";
$ApteczkaUsun2 = "DELETE FROM apteczka2 WHERE id_leku = %d";

$APTselect12 = "SELECT * FROM apteczka2 WHERE id_leku = %d";
$ApteczkaUpdate2 = "UPDATE apteczka2 SET Waznosc = ?, Ilosc = ?, Cena = ? WHERE id_leku = ?";

//dodanie do historii
$ApteczkaDoHistorii2 = "INSERT INTO `historia2` (NazwaHandlowa, Ilosc, Waznosc) SELECT NazwaHandlowa, Ilosc, Waznosc FROM `apteczka2` WHERE id_leku=%d";
$HistoriaSelect2 = "SELECT id, NazwaHandlowa, Ilosc, Waznosc FROM `historia2` LIMIT 50 OFFSET 0";

$ApteczkaDoUtylizacji2 = "INSERT INTO `zutylizowane2` (NazwaHandlowa, Postac, Waznosc) SELECT NazwaHandlowa, Postac, Waznosc FROM `apteczka2` WHERE id_leku=%d";
$UtylizacjaSelect2 = "SELECT id, NazwaHandlowa, Postac, Waznosc FROM `zutylizowane2` LIMIT 50 OFFSET 0";

?>