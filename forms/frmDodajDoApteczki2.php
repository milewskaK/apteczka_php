<form action="updateapteczka2.php" method="post">

<?php echo $lblIdLeku; ?>
<input type="text" name="id_leku" value="<?php echo $wiersz['id_leku'];?>" readonly><br>
<?php echo $lblWaznoscDodaj; ?>
<input type="date" name="Waznosc" value="<?php echo $wiersz['Waznosc']; ?>" required><br>
<?php echo $lblIloscDodaj; ?>
<input type="number" name="Ilosc" value="<?php echo $wiersz['Ilosc']; ?>" required><br>
<?php echo "Wprowadź cenę leku za sztukę"; ?>
<input type="number" step="0.10" name="Cena" value="<?php echo $wiersz['Cena']; ?>" required><br>
<input type="submit" value="Zapisz"/>
</form>
