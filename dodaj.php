<?php
    session_start();

    if(isset($_POST['email']))
    {
        // udana walidacja? zalozenie: tak
        $sukces=true;
       
      
        // sprawdz dlugosz loginu
         if(strlen($PESEL)!=11)
        {
            $sukces=false;
            $_SESSION['e_login']="PESEL powinien mieć 11 cyfr";
        }
        // dyskwalifikowanie znaków nie-alfanumerycznych
        if(ctype_alnum($PESEL)==false)
        {
            $sukces=false;
            $_SESSION['e_login']="PESEL nie może mieć niealfanumerycznych znaków";
        }

        // SPRADZ EMAIL
        $email = $_POST['email'];
        $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB, FILTER_SANITIZE_EMAIL)==false) || ($emailB!=$email))
        {
            $sukces=false;
            $_SESSION['e_email']="Podaj poprawny email";
        }

        //SPRAWDZ HASŁO
        $haslo = $_POST['haslo'];
        if(strlen($haslo)<2)
        {
            $sukces=false;
            $_SESSION['e_haslo']="Haslo musi mieć minimum 2 znaki";
        }

        //hashowanie hasła
        //$haslo_hash = password_hash($haslo, PASSWORD_BCRYPT); //password_hash()
        $haslo_hash = md5($haslo);
        //echo $haslo_hash; exit(); // do korekcji starych hasel

        //czy zaakceptowano checkbox
        if(!isset($_POST['regulamin']))
        {
            $sukces=false;
            $_SESSION['e_regulamin']="Musisz zaakceptować regulamin";
        }

        //zalacz dane połączenia
        require_once "polacz.php";
       

        mysqli_report(MYSQLI_REPORT_STRICT); // wyrzuca wyjątki zamiast ostrzeżen
        try 
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            } else {
                // czy email juz istnieje
                $rezultat = $polaczenie->query("SELECT idU FROM Uzytkownicy WHERE email='$email'");
                if(!$rezultat) throw new Exception($polaczenie->error);

                $ile_maili = $rezultat->num_rows;
                if($ile_maili>0){
                    $sukces=false;
                    $_SESSION['e_email']="Istnieje juz konto na ten email";
                }
                // czy login istnieje?
                $rezultat = $polaczenie->query("SELECT idU FROM Uzytkownicy WHERE PESEL='$PESEL'");
                if(!$rezultat) throw new Exception($polaczenie->error);

                $ile_loginow = $rezultat->num_rows;
                if($ile_loginow>0){
                    $sukces=false;
                    $_SESSION['e_login']="Istnieje juz konto na ten PESEL";
                }

                if($sukces==true){
                    //udało się dodać
                    if($polaczenie->query("INSERT INTO Uzytkownicy VALUES (NULL, '$email','$haslo_hash', '$PESEL')")){
                        $_SESSION['udanarejestracja']=true;
                        header('Location: sukces.php');
                    } else{
                        throw new Exception($polaczenie->error);
                    }
                    
                }

                $polaczenie->close();
            }
        } 
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera. Zapraszamy kiedy indziej.</span>';
        //echo '<br />Informacja dla cymbała, który to pisał: '.$e;
        }

    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    
    <title>Rejestracja PHP</title>

    <style>
    .error{
        color:red;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    </style>


</head>

<body>

<br /><br />

    <form method="post">
    

        PESEL: <br /><input type="text" name="PESEL" /><br />
        <?php // obsluga bledu loginu
            if(isset($_SESSION['e_login'])){
                echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                unset($_SESSION['e_login']);
            }
        ?>
        E-mail: <br /><input type="text" name="email" /><br />
       
        <?php // obsluga bledu maila
            if(isset($_SESSION['e_email'])){
                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                unset($_SESSION['e_email']);
            }
        ?>
       
        Hasło: <br /><input type="password" name="haslo" /><br /><br />
        <?php // obsluga bledu maila
            if(isset($_SESSION['e_haslo'])){
                echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                unset($_SESSION['e_haslo']);
            }
        ?>


        <label>
        <input type="checkbox" name="regulamin"/>Zapoznałem się z regulaminem.
        </label> 

        
        <?php // obsluga bledu maila
            if(isset($_SESSION['e_regulamin'])){
                echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                unset($_SESSION['e_regulamin']);
            }
        ?>

        <br /><br />     
        
        <input type="submit" value="dodaj"/>
    
    </form>


</body>
</html>