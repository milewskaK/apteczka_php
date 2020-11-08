<div class="container">
   <div class="dropdown"><div style="text-align: center">
        <button class="btn btn-info dropdown-toggle" type="button" id="menu1Lista"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $mn1Uprawnienie ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="menu1Lista">
            <a class="dropdown-item" href="gra2.php?operacja=101"><?php echo $mn1_1UprawWysw ?></a>
            <a class="dropdown-item" href="gra2.php?operacja=102"><?php echo $mn1_2UprawEdit ?></a>
            <a class="dropdown-item" href="gra2.php?operacja=103"><?php echo $mn1_3UprawDodaj ?></a>
            <a class="dropdown-item" href="gra2.php?operacja=104"><?php echo $mn1_4UprawUsun ?></a>
        </div>

        <div class="btn-group">
        <button class="btn btn-info dropdown-toggle" type="button" id="menu2Lista"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Słownik  Leków 
        </button>
        <div class="dropdown-menu" aria-labelledby="menu2Lista">
            <a class="dropdown-item" href="stronicowanie2.php"><?php echo "Wyświetl" ?></a>
        </div>
        
        <div class="btn-group">
        <button class="btn btn-info dropdown-toggle" type="button" id="menu3Lista"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Apteczka
        </button>
        <div class="dropdown-menu" aria-labelledby="menu3Lista">
            <a class="dropdown-item" href="gra2.php?operacja=301"><?php echo "Twoja Apteczka"?></a>
            <a class="dropdown-item" href="stronicowanieDodaniaDoApteczki2.php"><?php echo "Dodaj lek do apteczki" ?></a>
            <a class="dropdown-item" href="gra2.php?operacja=501"><?php echo "Historia leku" ?></a>
        </div>

    </div>
</div>


