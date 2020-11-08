<form action="szukajRekord2.php" method="post">

<?php echo "Filtruj po nazwie "; ?>
<input type="text" id = "Nazwa" placeholder = "Wpisz nazwę leku" name="NazwaHandlowa">
<input type="submit" name="Szukaj"></br>
<?php echo "Filtruj po postaci leku "; ?>
<input type="text" id = "Nazwa" placeholder = "Wpisz postać leku" name="Postac">
<input type="submit" name="Szukaj"></br>
<?php echo "Filtruj po kodzie kreskowym "; ?>
<input type="text" id = "Nazwa" placeholder = "Wpisz kod kreskowy leku" name="KodKreskowy">
<input type="submit" name="Szukaj"></br>
</form>